
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');


/**
 * Define localstorage to store data
 */
 import localforage from 'localforage'

 localforage.config({
 	driver: localforage.LOCALSTORAGE,
 	storeName: 'spa'
 })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 window.Vue = require('vue');
 VueScrollTo = require('vue-scrollto');
 Vue.use(VueScrollTo)
 
 import router from './router'
 import store from './vuex/'

 store.dispatch('auth/setToken').then(() => {
 	store.dispatch('auth/fetchUser').catch(() => {
 		store.dispatch('auth/clearAuth')
 		router.replace({ name: 'login' })
 	})
 }).catch( () => {
 	store.dispatch('auth/clearAuth')
 })

 import * as components from './components'
 
 const app = new Vue({
 	el: '#app',
 	store: store,
 	router: router
 });
