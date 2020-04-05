/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify';
// import { Bar } from 'vue-chartjs';
import CoreuiVue from '@coreui/vue';
import CoreuiVueCharts from '@coreui/vue-chartjs'
Vue.use(CoreuiVueCharts);
Vue.use(CoreuiVue);
// Vue.use(Vuetify);
// Vue.use(Bar);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('graph-component', require('./components/GraphComponent.vue').default);
Vue.component('gap_table-component', require('./components/GapTableCompnent.vue').default);
Vue.component('total_distance-component', require('./components/TotalDistanceComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
});
