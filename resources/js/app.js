/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import 'jquery-ui/ui/widgets/datepicker.js';



Vue.component('Calendar', require('./components/Calendar.vue').default);
Vue.component('Employes', require('./components/Employes.vue').default);



const app = new Vue({
    el: '#app',
});
