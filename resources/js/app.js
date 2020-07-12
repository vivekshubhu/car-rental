/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('admin-lte');
window.Swal = require('sweetalert2');

window.Vue = require('vue');

const toast = { 
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
}

window.toast = toast;

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import select2 from 'select2'

// import 'tui-editor/dist/tui-editor.css';
// import 'tui-editor/dist/tui-editor-contents.css';
// import 'codemirror/lib/codemirror.css';
// import { Editor } from '@toast-ui/vue-editor'





const routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default },
    { path: '/manage_user', component: require('./components/ManageUser.vue').default },
    { 
      path: '/manage_posts', 
      component: require('./components/ManagePosts.vue').default ,
      children:[
        {
          path:'pages/:pageId',
          name:'MyComponent',
          component:require('./components/PageComponents.vue').default,
          props:true,
        },
        {
          path:'components/:componentName',
          component:require('./components/ComponentPosts.vue').default,
          props:true,
        },
        {
          path:':componentName/posts/:type',
          component:require('./components/postsForm.vue').default,
          props:true,
        }
      ]
    },
  ]
  
  // 3. Create the router instance and pass the `routes` option
  // You can pass in additional options here, but let's
  // keep it simple for now.
  const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// import Multiselect from 'vue-multiselect'
// Vue.component('multiselect', Multiselect)

import vSelect from 'vue-select';

Vue.component('v-select', vSelect);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('to-do', require('./components/ToDo.vue').default);
Vue.component('page', require('./components/Page.vue').default);
Vue.component('components', require('./components/Components.vue').default);
Vue.component('page-components', require('./components/PageComponents.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
