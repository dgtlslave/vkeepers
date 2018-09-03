
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import Echo from 'laravel-echo';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('register', require('./components/Register'));
Vue.component('dashboard', require('./components/Dashboard'));
Vue.component('login', require('./components/Login'));
Vue.component('profile', require('./components/Profile'));
Vue.component('options', require('./components/Options'));
// Vue.component('option_unit', require('./components/Options'));
Vue.component('unit', require('./components/Option_unit_brand'));
Vue.component('subbrand', require('./components/Option_unit_subbrand'));
Vue.component('box', require('./components/Option_unit_box'));
Vue.component('region', require('./components/Option_unit_region'));
Vue.component('state', require('./components/Option_unit_state'));
Vue.component('city', require('./components/Option_unit_city'));
Vue.component('workbench', require('./components/Workbench'));
Vue.component('boxline', require('./components/Line'));
Vue.component('visit-view', require('./components/View'));
Vue.component('profile-view', require('./components/Profile_view'));

const app = new Vue({
    el: '#app'
});