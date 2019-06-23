import Vue from 'vue';
import store from './store/index.js';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// the grid component is comnted because is erroring npm run dev
// Vue.component('grid', require('./components/Grid.vue').default);
Vue.component('canvas-section', require('./components/Canvas.vue').default);
Vue.component('adding-fields', require('./components/AddingFields.vue').default);
Vue.component('tables', require('./components/Tables.vue').default);
Vue.component('tables2', require('./components/Tables2.vue').default);
Vue.component('vue-draggable-resizable', require('../../node_modules/vue-draggable-resizable').default);

//pos layout
Vue.component('category' , require('./components/Category.vue').default);
Vue.component('plate' , require('./components/Plate.vue').default);
Vue.component('point-of-sale' , require('./components/PointOfSale.vue').default);
Vue.component('bill-layout' , require('./components/BillLayout.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
