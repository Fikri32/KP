
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
Vue.component('side-menu',require('./components/admin/sidemenu.vue'));
Vue.component('foot-vues',require('./components/footer.vue'));
Vue.component('dashboard-admin',require('./components/admin/admin_dashboard.vue'));

//profile user page (Admi & employe)
Vue.component('prof-admin',require('./components/profile/admin_prof.vue'));

//admin 
Vue.component('project-admin',require('./components/admin/project.vue'));
Vue.component('user',require('./components/admin/user.vue'));
Vue.component('setting-project',require('./components/admin/project_adActions.vue'));
Vue.component('setting-declar',require('./components/admin/setting.vue'));
Vue.component('setting-struct',require('./components/admin/setting_struct.vue'));
Vue.component('invoice-vues',require('./components/admin/invoice.vue'));
Vue.component('payment',require('./components/admin/payments.vue'));
Vue.component('client-company',require('./components/admin/client.vue'));

//employe
Vue.component('project-staff', require('./components/project_staff.vue'));
Vue.component('project-manager',require('./components/project_manager.vue'));
Vue.component('project-sl',require('./components/stepsLeader.vue'));
Vue.component('staff-page',require('./components/staff.vue'));


const app = new Vue({
    el: '#app'
});
