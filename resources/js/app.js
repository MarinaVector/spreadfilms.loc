/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );

import PortalVue from 'portal-vue';

Vue.use(PortalVue);

import PrettyCheckbox from 'pretty-checkbox-vue';
Vue.use(PrettyCheckbox);

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import Vue from 'vue';

Vue.use(BootstrapVue, {store});

import Donut from 'vue-css-donut-chart';
import 'vue-css-donut-chart/dist/vcdonut.css';

Vue.use(Donut);

import VueYoutube from 'vue-youtube'

Vue.use(VueYoutube)

import VueTimepicker from 'vue2-timepicker';

import {store} from './store/store'
import FileManager from 'laravel-file-manager'
Vue.use(FileManager, {store});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('layouts-panel', require('./components/modules/tutorials/admin/LayoutsPanel.vue').default);
Vue.component('tutorial-page-builder', require('./components/modules/tutorials/admin/PageBuilder.vue').default);
Vue.component('save-cancel-block', require('./components/modules/tutorials/admin/SaveCancelBlock.vue').default);
Vue.component('signs-statistics', require('./components/modules/tutorials/admin/SignsStatistics').default);
Vue.component('tutorials-statistics', require('./components/modules/tutorials/admin/TutorialsStatistics').default);
Vue.component('tutorials-admin-list', require('./components/modules/tutorials/admin/TutorialsAdminList').default);
Vue.component('nested-draggable', require('./components/modules/tutorials/admin/NestedDraggable').default);
Vue.component('tutorials-settings', require('./components/modules/tutorials/admin/TutorialsSettings').default);

/**
 * Tutorials view
 */
Vue.component('nav-acc', require('./components/modules/tutorials/tutorials-view-page/NavAccordion').default);
Vue.component('chart-circle', require('./components/modules/tutorials/tutorials-view-page/ChartCircle').default);
Vue.component('nav-small', require('./components/modules/tutorials/tutorials-view-page/NavComponentSmall').default);
Vue.component('tutorial-list', require('./components/modules/tutorials/tutorials-view-page/TutorialsNameList').default);
Vue.component('view-nested-menu', require('./components/modules/tutorials/tutorials-view-page/ViewNestedMenu').default);
Vue.component('display-tutorial', require('./components/modules/tutorials/tutorials-view-page/DisplayTutorial').default);
Vue.component('display-tutorials-main-page', require('./components/modules/tutorials/tutorials-view-page/DisplayTutorialsMainPage').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store: store
});

