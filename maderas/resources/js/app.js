require('./bootstrap');

// consola
import VueRouter from 'vue-router';
import categorias from '../assets/js/contents/Categorias.vue';
import subcategorias from '../assets/js/contents/SubCategorias.vue';
import productos from '../assets/js/contents/Productos.vue';
import sliders from '../assets/js/contents/Sliders.vue';
import empleados from '../assets/js/contents/Empleados.vue';
import clientes from '../assets/js/contents/Clientes.vue';
import envios from '../assets/js/contents/Envios.vue';
import contraseñas from '../assets/js/contents/CambioContraseña.vue';

// ecommerce
import inicios from '../assets/js/principal/Inicio.vue';
import quien from '../assets/js/principal/QuienesSomos.vue';
import pedido from '../assets/js/principal/Pedidos.vue';
import cuentas from '../assets/js/principal/Cuenta.vue';
import producto from '../assets/js/principal/Productos.vue';
import perfil from '../assets/js/principal/Perfil.vue';





window.Vue = require('vue');

// consola
Vue.component('categoria', categorias);
Vue.component('subcategoria', subcategorias);
Vue.component('producto', productos);
Vue.component('slider', sliders);
Vue.component('empleado', empleados);
Vue.component('cliente', clientes);
Vue.component('envio', envios);
Vue.component('contraseña', contraseñas);

// ecommerce
Vue.component('inicio', inicios);
Vue.component('quienes',quien);
Vue.component('pedidos',pedido);
Vue.component('cuenta',cuentas);
Vue.component('productos',producto);
Vue.component('perfil',perfil);




const app = new Vue({
    el: '#app',
    data: {
        menu: 0
      },
});
