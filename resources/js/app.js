/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import "./plugins/toasted";
import './plugins/dialog';
import './plugins/numeric'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('postulantes', require('./components/PostulantComponent.vue').default);
Vue.component('participantes', require('./components/ParticipantComponent.vue').default);
Vue.component('notas', require('./components/NotasComponent.vue').default);
Vue.component('admins', require('./components/AdminsEventComponent.vue').default);
Vue.component('table-notas', require('./components/_partials/TableNotas.vue').default);
Vue.component('students', require('./components/ShowStudent').default);
Vue.component('event-visible', require('./components/_partials/BtnVisibleEvent').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    //render: h => h(App),
});
