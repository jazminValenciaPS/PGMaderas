<template>
    <main class="main-index">
        <div class="row">
            <!-- Container -->
            <div v-for="producto in arrayProducto" :key="producto.PK_products">
                <!-- Filters -->
                <div class="col m6 s12">
                    <img class="materialboxed" width="100%" :alt="producto.name" :src="'img/'+producto.image">
                </div>
                <!-- Products -->
                <div  class="col m6 s12">
                    <div class="col m12 s12" >
                        <h4>{{producto.name}}</h4>
                        <p>SKU: {{producto.SKU}}</p>
                        <h5>${{producto.price}}</h5>
                        <p>{{producto.description}}</p>
                        <h6 class="mt-2"><span class="color-main">{{producto.avaible}}</span> Disponibles para compra en línea</h6>
                    </div>
                    <div class="col m8 s12 row mt-2" >
                        <select class="col m3 s5 browser-default" v-model="producto.cantidad" >
                            <option value="" disabled selected >Disponibilidad del producto</option>
                            <option v-for="items in producto.avaible" :key="items.index">{{ items }}</option>
                        </select> 
                         <a class="col m8 s6 btn bg-main ml-1" @click="actualizarCantidad(producto)" v-show="producto.avaible > 0">Agregar al carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';
export default {
     props:{
            productoid: Number
        },
        data(){
        return{
            arrayProducto: [],
            idproduct:'',
            carrito:[],
            cantidad:1,
            precioFinal: 0,
            contenido: 0,
        
        }
    },
    methods:{
        listarProducto(PK_products){
             let m=this;
             axios.get('/productoM/'+PK_products).then(function (response){
                m.arrayProducto = response.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
       actualizarCantidad(producto){
            let cantidad = this.cantidad;
            let precioFinal = this.precioFinal;

            let coincidencia = this.carrito.find((productoLS) => productoLS.PK_products === producto.PK_products);
            if(coincidencia){
                let productosLS = this.carrito;
                //Obtenemos el arreglo de productos
                
                // Comparar el id del producto borrado con LS
                productosLS.forEach(function(productoLS, index){
                    if(productoLS.PK_products === producto.PK_products){
                        productosLS.splice(index, 1);
                    }
                });
                //Añadimos el arreglo actual al LS
                localStorage.setItem('carrito', JSON.stringify(productosLS));

                this.carrito.push(producto);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
                 Swal.fire({
                    icon: 'success',
                    type: 'info',
                    title: 'Cantidad de productos seleccionada modificada!',
                    text: 'El producto se agrego al carrito',
                    showConfirmButton: false,
                    timer: 1000
                });

            }
            else{
                Swal.fire({
                    icon: 'success',
                    type: 'info',
                    title: 'Agregado al carrito!',
                    text: 'El producto se agrego al carrito',
                    showConfirmButton: false,
                    timer: 1000
                });
                
                producto.cantidad = cantidad;
                producto.precioFinal = precioFinal;

                this.carrito.push(producto);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
                return;
            }   
        },
    
    },
     async mounted() {
            let m=this;
            const queryString = window.location.search;      
            const urlParams = new URLSearchParams(queryString);        
            const product = urlParams.get('id');      
            let id = (product !== null && product !== '' && product !== undefined)? product : "";
            m.listarProducto(id);

            
            let carrito = JSON.parse(localStorage.getItem('carrito'));
            if (Array.isArray(carrito)){
                m.carrito = carrito;
            }

            console.log(this.carrito, "carrito");

        }
}
</script>