require('./bootstrap');

// consola
import VueRouter from 'vue-router';
import categorias from '../assets/js/contents/Categorias.vue';
import subcategorias from '../assets/js/contents/SubCategorias.vue';
import productosc from '../assets/js/contents/ProductosC.vue';
import sliders from '../assets/js/contents/Sliders.vue';
import empleados from '../assets/js/contents/Empleados.vue';
import clientes from '../assets/js/contents/Clientes.vue';
import envios from '../assets/js/contents/Envios.vue';
import contraseñas from '../assets/js/contents/CambioContraseña.vue';
import categoriasprod from '../assets/js/contents/CategoriasP.vue';

// ecommerce
import inicios from '../assets/js/principal/Inicio.vue';
import nosotros from '../assets/js/principal/Nosotros.vue';
import pedido from '../assets/js/principal/Pedidos.vue';
import cuentas from '../assets/js/principal/Cuenta.vue';
import productost from '../assets/js/principal/Productos.vue';
import perfil from '../assets/js/principal/Perfil.vue';
import contacto from '../assets/js/principal/Contacto.vue';
import carrito from '../assets/js/principal/Carrito.vue';
import producto from '../assets/js/principal/Producto.vue';
import registro from '../assets/js/principal/Registro.vue';
import orden from '../assets/js/principal/Ordenar.vue';
import categoriasp from '../assets/js/principal/CategoriasP.vue';
import contra from '../assets/js/principal/Contra.vue';

import navmenus from '../assets/js/principal/Menu.vue';
import navUsers from '../assets/js/principal/User.vue';


window.Vue = require('vue');

// consola
Vue.component('categoria', categorias);
Vue.component('subcategoria', subcategorias);
Vue.component('productoc', productosc);
Vue.component('slider', sliders);
Vue.component('empleado', empleados);
Vue.component('cliente', clientes);
Vue.component('envio', envios);
Vue.component('contraseña', contraseñas);
Vue.component('categoriap', categoriasprod);

// ecommerce
Vue.component('inicio', inicios);
Vue.component('nosotros',nosotros);
Vue.component('pedidos',pedido);
Vue.component('cuenta',cuentas);
Vue.component('productost',productost);
Vue.component('perfil',perfil);
Vue.component('contacto',contacto);
Vue.component('carrito',carrito);
Vue.component('producto',producto);
Vue.component('registro',registro);
Vue.component('orden',orden);
Vue.component('categoriasp',categoriasp);
Vue.component('contra',contra);
Vue.component('navmenu',navmenus);
Vue.component('navuser',navUsers);

const app = new Vue({
  el: '#app',
  data :{
      menu: 0,
      idProducto: 0,
      idCateP:0
  },
  methods:{
    mostrarProducto(objeto){
       let m = this;
       m.menu = objeto.valorMenu;
       m.idProducto = objeto.valorId;
      },
      verCategoriaProducto(){
        let m = this;
        m.menu = objeto.valorMenu;
        m.idCateP = objeto.valorCateId;
      }
  }
});