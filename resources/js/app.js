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
import translations from '../lang/vue-translations.json'
//php artisan lang:js resources/lang/vue-translations.json --json
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-component', require('./components/UserComponent.vue').default);
Vue.component('feeden-component', require('./components/en/FeedenComponent.vue').default);
Vue.component('form-component', require('./components/front/FormComponent.vue').default);
Vue.component('searchresult-component', require('./components/front/SearchresultComponent.vue').default);
Vue.component('category-component', require('./components/CategoryComponent.vue').default);



const CONFIG = {
    //API_URL: 'http://localhost/turkwizard/public/api/',
    //PATH: '/turkwizard/public',
    API_URL: 'http://turkwizard.com/public/api/',
    PATH: '/public',
    LANG:translations
}

export default CONFIG;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
