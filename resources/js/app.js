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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('layouts-panel', require('./components/modules/tutorials/admin/LayoutsPanel.vue').default);
Vue.component('tutorial-page-builder', require('./components/modules/tutorials/admin/PageBuilder.vue').default);
Vue.component('save-cancel-block', require('./components/modules/tutorials/admin/SaveCancelBlock.vue').default);
Vue.component('signs-statistics', require('./components/modules/tutorials/admin/SignsStatistics').default);
Vue.component('tutorials-statistics', require('./components/modules/tutorials/admin/TutorialsStatistics').default);
Vue.component('normal-text', require('./components/modules/tutorials/admin/paragraphs/NormalText').default);
Vue.component('build-component', require('./components/modules/tutorials/admin/paragraphs/TextBild').default);
Vue.component('slider-add', require('./components/modules/tutorials/admin/paragraphs/SliderAdd').default);
Vue.component('background-video', require('./components/modules/tutorials/admin/paragraphs/BackgroundVideo').default);
Vue.component('question-dropdown', require('./components/modules/tutorials/admin/paragraphs/small-elements/QuestionDropdown').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});

