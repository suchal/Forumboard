
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
import Icon from 'vue-awesome/src/components/Icon.vue';
Vue.component('icon', Icon);
import 'vue-awesome/src/icons/';

Vue.component('notifications', require('./components/notifications.vue'));

const app = new Vue({
    el: 'body',
});
