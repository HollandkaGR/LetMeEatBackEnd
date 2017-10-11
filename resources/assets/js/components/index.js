 import Vue from 'vue'

 import * as prods from '../app/products/components'

 export const App = Vue.component('app', require('./App.vue'))
 export const Navigation = Vue.component('navigation', require('./Navigation.vue'))
 export const Products = prods