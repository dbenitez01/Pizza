
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


Vue.component('cart-items', {
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
      <h3>\${{ price }} </h3>
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
              price: this.price,
              size: this.size,
              quantity: this.quantity,
              table: this.table};
    }
  },
  methods: {
    onSubmit() {
      axios.post('/orders', this.getItem)
        .then(this.onSuccess)
        .catch(error => this.errors = error.response.data);

    },

    onSuccess(response) {
      alert(response.data.cart);
      app.$emit('applied');
      // location.reload();
    }
  }
});


app = new Vue({
    el: '#app',
    data: {
      errors: new Errors(),
    },
});
