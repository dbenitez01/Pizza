
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

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

Vue.component('card', {
  props: ['title', 'body'],
  data() {
    return {
      isVisible: true
    }
  },
  template: `
  <div class="card" style="width: 18rem;" v-if="isVisible">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{ title }}</h5>
      <button @click="hideModal">x</button>
      <p class="card-text">{{ body }}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  `,
  methods: {
    hideModal() {
      this.isVisible = false;
    }
  }
});

app = new Vue({
    el: '#app',
    data: {
      message: 'Hello World',
      names: ['Joe', 'Mary', 'Jane'],
      tasks: [
        { description: 'Go to the store', completed: true},
        { description: 'Finish project', completed: true},
        { description: 'Eat', completed: false},
      ]
    },
    computed: {
      incompleteTasks() {
        return this.tasks.filter(task => !task.completed);
      }
    }
    // mounted() {
    //   alert('ready');
    // }
});
