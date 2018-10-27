
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

window.swal = require('sweetalert2');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//funct components
Vue.component('side-menu',require('./components/sidemenu.vue'));
Vue.component('foot-vues',require('./components/footer.vue'));

//admin 
Vue.component('project-admin', require('./components/project.vue'));
Vue.component('user', require('./components/user.vue'));
Vue.component('setting-project',require('./components/project_adActions.vue'));
Vue.component('setting-declar',require('./components/setting.vue'));
Vue.component('setting-struct',require('./components/setting_struct.vue'));

//employe
Vue.component('project-staff', require('./components/project_staff.vue'));
Vue.component('project-manager',require('./components/project_manager.vue'))

const app = new Vue({
    el: '#app'
});
