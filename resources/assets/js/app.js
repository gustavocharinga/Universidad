
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VuePagination from 'vuejs-paginator-axios/dist/vuejs-paginator-axios';
import axios from 'axios';
//Vue.use(VuePagination);
window.Vue = require('vue');
//Vue.use('VuePagination');
window.VuePagination = VuePagination;
window.axios = axios;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('sliders-imagen', require('./components/Sliders.vue'));
Vue.component('inicio', require('./components/Inicio.vue'));
Vue.component('courses', require('./components/Courses.vue'));
Vue.component('register-course', require('./components/RegisterCourse.vue'));

Vue.component('pre-course', require('./components/PrelacionCourse.vue'));

//Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
const app = new Vue({
    el: '#app'
});
