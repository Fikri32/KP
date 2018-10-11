
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import Router from './routes.js'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//admin 
Vue.component('project-admin', require('./components/project.vue'));
Vue.component('user', require('./components/user.vue'));
Vue.component('setting-project',require('./components/project_adActions.vue'));

//emp spa
Vue.component('pspa-app', require('./components/project-spa.vue'));

const app = new Vue({
    el: '#app',
    router:Router
});
