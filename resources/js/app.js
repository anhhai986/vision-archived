/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('jQuery-QueryBuilder');

window.Vue = require('vue');
window.axios = require('axios');

require('./axios');

import BootstrapVue from 'bootstrap-vue'
import Clipboard from 'v-clipboard'
import Grid from 'simple-xgrid'
import Locale from './vue-i18n-locales.generated';
import Skeleton from 'tb-skeleton'
import VueInternationalization from 'vue-i18n';

const lang = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    messages: Locale
});

Vue.use(BootstrapVue)
Vue.use(Clipboard)
Vue.use(Grid)
Vue.use(Skeleton)
Vue.use(VueInternationalization)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$Application = Application;
Vue.prototype.$axios = window.axios;

const app = new Vue({
    el: '#app',
    i18n,
});

jQuery(function () {
    jQuery('[data-toggle="tooltip"]').tooltip()
})
