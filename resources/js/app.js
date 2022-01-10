/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

export const bus = new Vue();

import { library } from '@fortawesome/fontawesome-svg-core'
import { faEdit, faTrashAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import Vue from 'vue';

import Notifications from 'vue-notification';

library.add(faEdit, faTrashAlt)

Vue.use(Notifications)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-list-component', require('./components/user/UserListComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
