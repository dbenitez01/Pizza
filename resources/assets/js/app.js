
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

class Errors {

  constructor() {
    this.errors = {};
  }

  get(field) {
    if(this.errors[field]) {
      return this.errors[field][0];
    }
  }
  record(errors) {
    this.errors = errors;
  }
}

window.Vue = require('vue');


Vue.component('cart-items-num', {
  template: `
    <span>{{ cartItems }}</span>
  `,
  mounted: function () {
     this.$root.$on('applied', function() { // here you need to use the arrow function
       console.log(this);
       this.$children[0].cartItems = parseInt(this.$children[0].cartItems) + 1;
     })
   },
  data() {
    return {
      cartItems: this.number
    };
  },
  props: {
    number: { required: true }
  },
});

Vue.component('tabs', {
  template: `
  <div>
    <hr> <!-- subnav -->
      <ul class="nav nav-pills justify-content-center nav-fill">
        <li v-for="tab in tabs" class="nav-item" :class=" { 'is-Active': tab.isActive }">
          <h4><a :href="tab.href" @click="selectTab(tab)" class="nav-link">{{ tab.name }}</a></h4>
        </li>
      </ul>

    <hr> <!-- end subnav -->

    <div class="tabs-details">
      <slot></slot>
    </div>
  </div>
  `,
  data() {
    return {tabs: [] };
  },
  created() {
    this.tabs = this.$children;
  },
  methods: {
    selectTab(selectedTab) {
      this.tabs.forEach(tab => {
        tab.isActive = (tab.name == selectedTab.name)
      });
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    }
  }
});

Vue.component('tab', {
  template: `
    <div v-if="isActive"><slot></slot></div>
  `,
  props: {
    name: { required: true},
    selected: { default: false }
  },
  computed: {
    href() {
      return '#' + this.name.toLowerCase().replace(/ /g, "-");
    }
  },
  data() {
    return {
      isActive: false
    };
  },
  mounted() {
    this.isActive = this.selected;
  }
});

Vue.component('menu-item', {
  template: `
    <div class="col-md-6">
      <h1 class="d-inline">{{ name }}</h1>
      <i class="fa fa-info-circle float-right" data-toggle="tooltip" data-placement="bottom" :title="description"></i>
      <h3>\${{ getPrice }} </h3>
      <div class="form-group">
        <label for="size">Size</label>
        <select class="form-control" name="size" v-model="size">
          <option value="S">Small</option>
          <option value="M">Medium</option>
          <option value="L">Large</option>
        </select>
      </div>
      <div class="form-row">
        <div class="form-group col-md-2">
          <input type="number" name="quantity" value="1" class="form-control" min="1" max="10" v-model="quantity">
        </div>
        <div class="form-group col-md-10">
          <button type="button" name="button" class="btn btn-primary" @click.prevent="onSubmit"><i class="fa fa-plus"></i> Add to Order</button>
        </div>
      </div>
    </div>
  `,
  props: {
    name: { required: true },
    price: { required: true},
    description: {required: true},
    propid: { required: true},
    table: { required: true}
  },
  data() {
    return {
      size: 'S',
      quantity: 1,
      errors: {}
    }
  },
  computed: {
    getItem() {
      return { id: this.propid,
              name: this.name,
              description: this.description,
              price: this.price,
              size: this.size,
              quantity: this.quantity,
              table: this.table};
    },
    getPrice() {
      return (parseInt(this.quantity) * parseFloat(this.price)).toFixed(2);
    }
  },
  methods: {
    onSubmit() {
      axios.post('/orders', this.getItem)
        .then(this.onSuccess)
        .catch(error => this.errors = error.response.data);

    },

    onSuccess(response) {
      // alert(response.data.cart);
      app.$emit('applied');
      // location.reload();
    }
  }
});
Vue.component('cart-items',{
  template: `
  <div>
    <ul class="list-group">
      <slot></slot>
    </ul>

    <hr>

    <div class="d-flex justify-content-end">
      <div class="d-flex w-25 justify-content-between">
          <h4>Subtotal</h4>
          <h4>\${{ totalPrice }}</h4>
      </div>
    </div>
    <div class="d-flex justify-content-end">
      <div class="d-flex w-25 justify-content-between">
          <h4>Tax</h4>
          <h4>\${{ calctax }}</h4>
      </div>
    </div>
    <div class="d-flex justify-content-end">
      <div class="d-flex w-25 justify-content-between">
          <h2>Total</h2>
          <h2>\${{ total }}</h2>
      </div>
    </div>
    <a href="/cart/confirm" class="btn btn-primary float-right" @click.prevent="updatePHPCart">Order Now</a>
    </div>
  `,
  data() {
    return {cartitems: [],
    tax: 0.875,
    newcartitems: []};
  },
  computed: {
    totalPrice() {
      var total = 0;
      for (var i = 0; i < this.cartitems.length; i++) {
        total += parseFloat(this.cartitems[i].getPrice);
        console.log(total);
      }
      return total.toFixed(2);
    },
    calctax() {
      return (this.totalPrice - (this.totalPrice * this.tax)).toFixed(2);
    },
    total() {
      return (this.totalPrice / this.tax).toFixed(2);
    }
  },
  methods: {
    updateJSCart() {
      this.newcartitems = [];
      for (var i = 0; i < this.cartitems.length; i++) {
        console.log(this.cartitems[i].getItem);
        this.newcartitems.push(this.cartitems[i].getItem);
      }

      // console.log(this.newcartitems);
      return this.newcartitems;
      console.log('fixed!');
    },
    updatePHPCart() {
      axios.post('/cart/updatecart', this.updateJSCart())
        .then(window.location = "/cart/confirm")
        .catch(error => this.errors = error.response.data);
      console.log('updated');
    }
  },
  created() {
    this.cartitems = this.$children;

  },
  updated() {

  }
});
Vue.component('cart-item', {
    template: `
      <li class="list-group-item" v-if="visible">
        <div class="d-flex w-100 justify-content-between">
          <h2 class="mb-1">{{ getSize }} {{ name }}</h2>
          <h3>\${{ getPrice }}</h3>
        </div>
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ description }}</h5>
          <input type="number" name="quantity" v-model="quantity" class="form-control" min="1" max="10" style="width: 10%;">
        </div>
        <div class="d-flex float-right">
          <a href="#" @click="remove">Remove</a>
        </div>
      </li>
    `,
    data() {
      return {
        computedSize: '',
        visible: true
      };
    },
    props: {
      name: { required: true },
      description: { required: true },
      size: { required: true },
      price: { required: true },
      quantity: { required: true },
      table: { required: true }
    },
    computed: {
      getSize() {
        switch (this.size) {
          case 'S':
            this.computedSize = 'Small'
            break;
          case 'M':
            this.computedSize = 'Medium'
            break;
          default:
            this.computedSize = "Large"
        }
        return this.computedSize;
      },
      getItem() {
        return {
              name: this.name,
              description: this.description,
              price: this.price,
              size: this.size,
              quantity: this.quantity,
              table: this.table,
        };
      },
      getPrice() {
        return (parseInt(this.quantity) * parseFloat(this.price)).toFixed(2);
      }
    },
    methods: {
      remove() {
        axios.post('/cart/removeitem', this.getItem)
          .then(this.onDelete)
          .catch(error => this.errors = error.response.data);
      },
      onDelete(response){
        this.$destroy;
        this.price = 0;
        this.visible = false;

      }
    },
    beforeDestroy() {
      console.log('deleted');
      this.price = 0;
    }
});


app = new Vue({
    el: '#app',
    data: {
      errors: new Errors(),
    },
});
