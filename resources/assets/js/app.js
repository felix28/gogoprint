
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
//window.$      = window.jQuery = require('jquery');
window.Vue    = require('vue');
window.axios  = require('axios');
window.moment = require('moment-business-days');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('product-app', require('./components/ProductApp.vue'));

const app = new Vue({
    el: '#app'
});

Vue.filter('toCurrency', function (value) {
    if (typeof value !== "number") {
        return value;
    }
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'THB',
        minimumFractionDigits: 2
    });
    return formatter.format(value);
});

// Defines delivery days from 1 (Monday) to 6 (Saturday) as business days. Note that Sunday is day 0.
moment.updateLocale('us', {
   workingWeekdays: [1, 2, 3, 4, 5, 6]
});