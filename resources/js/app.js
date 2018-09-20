
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue'
import Datatable from 'vue2-datatable-component'
Vue.use(Datatable);

require("mock-data");

Vue.component('grid-projetos', require('./components/projetos/grid-projetos.vue'));
Vue.component('grid-anotacoes', require('./components/anotacoes/grid-anotacoes.vue'));
Vue.component('app-select', require('./components/selects/app-select.vue'));

const app = new Vue({
    el: '#app'
});
