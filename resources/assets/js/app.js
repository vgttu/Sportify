
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Load Google Maps library as a component.
 * Using Vue package for easy maps management.
 */

import * as VueGoogleMaps from 'vue2-google-maps';
import VueEvents from 'vue-events';

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyA0LgipRdxsqMdlsRzKK1kWXesn37rMk8c'
    }
});

Vue.use(VueEvents);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app-header', require('./components/Header.vue'));
Vue.component('map-view', require('./components/Map.vue'));

const app = new Vue({
    el: '#app'
});
