require('./bootstrap');
import VueRouter from 'vue-router';
import categorias from '../assets/js/contents/Categorias.vue';
import subcategorias from '../assets/js/contents/SubCategorias.vue';
import productos from '../assets/js/contents/Productos.vue';
import sliders from '../assets/js/contents/Sliders.vue';
import empleados from '../assets/js/contents/Empleados.vue';
import clientes from '../assets/js/contents/Clientes.vue';
import envios from '../assets/js/contents/Envios.vue';
import contraseñas from '../assets/js/contents/CambioContraseña.vue';

window.Vue = require('vue');

Vue.component('categoria', categorias);
Vue.component('subcategoria', subcategorias);
Vue.component('producto', productos);
Vue.component('slider', sliders);
Vue.component('empleado', empleados);
Vue.component('cliente', clientes);
Vue.component('envio', envios);
Vue.component('contraseña', contraseñas);

const app = new Vue({
    el: '#app',
    data: {
        menu: 0
      },
});
