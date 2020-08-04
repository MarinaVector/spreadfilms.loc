/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );

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
Vue.component('tutorials-admin-list', require('./components/modules/tutorials/admin/TutorialsAdminList').default);


/**
 * Paragraphs windows
 */

Vue.component('normal-text', require('./components/modules/tutorials/admin/paragraphs/NormalText').default);
Vue.component('text-img', require('./components/modules/tutorials/admin/paragraphs/TextImg').default);
Vue.component('slider-add', require('./components/modules/tutorials/admin/paragraphs/SliderAdd').default);
Vue.component('background-video', require('./components/modules/tutorials/admin/paragraphs/BackgroundVideo').default);
Vue.component('simple-head', require('./components/modules/tutorials/admin/paragraphs/SimpleHead').default);
Vue.component('quote-component', require('./components/modules/tutorials/admin/paragraphs/Quote').default);
Vue.component('imghead-text', require('./components/modules/tutorials/admin/paragraphs/ImgHeadText').default);
Vue.component('lghead-text', require('./components/modules/tutorials/admin/paragraphs/LgHeadText').default);
Vue.component('logo-text', require('./components/modules/tutorials/admin/paragraphs/TextLogo').default);
Vue.component('imghigh-text', require('./components/modules/tutorials/admin/paragraphs/TextImgHigh').default);
Vue.component('contact-img', require('./components/modules/tutorials/admin/paragraphs/Contact').default);
Vue.component('questions-answers', require('./components/modules/tutorials/admin/paragraphs/QuestionsAnswers').default);
Vue.component('video-text', require('./components/modules/tutorials/admin/paragraphs/VideoText').default);
Vue.component('img-textcenter', require('./components/modules/tutorials/admin/paragraphs/ImgTextCenter').default);
Vue.component('footer-component', require('./components/modules/tutorials/admin/paragraphs/FooterComponent').default);

/**
 * Small elements
 */

Vue.component('question-dropdown', require('./components/modules/tutorials/admin/paragraphs/small-elements/QuestionDropdown').default);
Vue.component('dropdown-button', require('./components/modules/tutorials/admin/paragraphs/small-elements/DropdownButton').default);
Vue.component('collapse-dropdown', require('./components/modules/tutorials/admin/paragraphs/small-elements/Collapse').default);
Vue.component('text-tip', require('./components/modules/tutorials/admin/paragraphs/small-elements/TextTip').default);
Vue.component('slider-btn', require('./components/modules/tutorials/admin/paragraphs/small-elements/SliderBtn').default);
/**
 * Modals windows
 */
Vue.component('simple-video-modal', require('./components/modules/tutorials/admin/paragraphs/modal-windows/Video/VideoSimpleModal').default);
Vue.component('img-simple', require('./components/modules/tutorials/admin/paragraphs/modal-windows/Image/ImageSimpleModal').default);

Vue.component('tutorials-topics', require('./components/modules/tutorials/admin/paragraphs/page-builder-parts/TutorialsTopics').default);
Vue.component('tutorials-categories', require('./components/modules/tutorials/admin/paragraphs/page-builder-parts/TutorialsCategories').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

});

