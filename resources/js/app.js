/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('vue-multiselect/dist/vue-multiselect.min.css');
import VModal from 'vue-js-modal';
import Turbolinks from 'turbolinks';
import TurbolinksAdapter from 'vue-turbolinks';
import Vue from "vue";
import VueQrcode from '@chenfengyuan/vue-qrcode';
import VueQrcodeReader from "vue-qrcode-reader";
import VueQRCodeComponent from 'vue-qrcode-component';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';



Turbolinks.start();

window.Vue = require('vue');
Vue.use(VModal);
Vue.use(VueQrcodeReader);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('menu-container', require('./Modules/Menu/MenuContainer.vue').default);
Vue.component('menu-group', require('./Modules/Menu/MenuGroup.vue').default);
Vue.component('menu-add-form', require('./Modules/Menu/MenuAddForm.vue').default);
Vue.component('resto-group', require('./Modules/Restos/RestoGroup.vue').default);
Vue.component('card-compo', require('./components/Card1.vue').default);
Vue.component('order-group', require('./Modules/Orders/OrderGroup.vue').default);
Vue.component('manage-orders', require('./Modules/Orders/ManageOrders.vue').default);
Vue.component('order-qr', require('./Modules/QrCode/OrderQr.vue').default);
Vue.component(VueQrcode.name, VueQrcode);
Vue.component('loading-overlay', Loading);
Vue.component('generate-qr', require('./Modules/QrCode/GenerateQr.vue').default);
//Vue.component('ord', require('./Modules/QrCode/SuccessOrFailmessage.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.eventBus = new Vue({});
document.addEventListener('turbolinks:load', () => {
    var element = document.getElementById("app1");
    if (element != null) {
        const app = new Vue({
            el: element
        });
    }
});