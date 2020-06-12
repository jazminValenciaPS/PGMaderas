require('./bootstrap');
import VueRouter from 'vue-router';
import categorias from '../assets/js/contents/Categorias.vue';
import subcategorias from '../assets/js/contents/Categorias.vue';
import productos from '../assets/js/contents/Categorias.vue';


window.Vue = require('vue');

Vue.component('categoria', categorias);

const app = new Vue({
    el: '#app',
    data: {
        menu: 0
      },
});
