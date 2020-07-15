<template>
     <main>
        <div class="row">
            <!-- Filters -->
            <div class="col m3 s12">
                <ul class="collection">
                    <li class="collection-item">
                        <h6>Categorías</h6>
                        <a v-for="cate in arrayCategorias" :key="cate.PK_categories" value="">{{cate.name}}</a>
                    </li>
                    <li class="collection-item">
                        <h6>Filtro de búsqueda:</h6>
                        <h6>Precio</h6>
                        <a href="#!">Menos de $99</a>
                        <a href="#!">Entre $100 y $299</a>
                        <a href="#!" >Entre $300 y $500</a>
                    </li>
                </ul>
            </div>

            <!-- Products -->
            <div id="listaproductos">
                <div class="col m9 s12" id="Productos">
                    <div v-for="producto in arrayProductos" :key="producto.PK_products" class="card sticky-action col m4 s12" v-show="producto.avaible > 0">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a :href="'/Ver-Producto?id='+producto.PK_products"> <img :src="'img/'+producto.image" class="pImagen"> </a>
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4">{{producto.name}}</span>
                            <p>SKU: {{producto.SKU}}</p>
                            <h6>${{producto.price}}</h6>
                        </div>
                        <div class="card-action ">
                            <a class="btn bg-main agregar-carrito" v-on:click="cantidad += 1" @click="agregarCarrito(producto)" >Agregar a Carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            PK_products:'',
            arrayProductos: [],
            arrayCategorias:[],
            tipoAccion: 0,
            cantidad:0,
            listaproductos: [],
            carrito:[],
        }
    }, 
    methods:{
        listarProductos(){
            let m=this;
            var url='/productoL';

            axios.get(url).then(function (response){
                m.arrayProductos = response.data;

            })
            .catch(function(error){
                console.log(error);
            });
        },
        listarCategorias(){
            let m=this;
            var url='/categoriaV';

            axios.get(url).then(function (response){
                m.arrayCategorias = response.data;
            })
            .catch(function(error){
                console.log(error);
            });

        },
         VerProducto(menu,id){
                let m=this;
                var objeto = {
                    valorMenu: menu,
                    valorId: id
                }
                 m.$emit("mostrar-producto",objeto);
        },
        agregarCarrito(producto){
            // console.log(JSON.stringify(producto));
            let productosLS;
            productosLS = this.obtenerProductosLocalStorage();

            productosLS.forEach(function (productoLS){
                if(productoLS.PK_products === producto.PK_products){
                    productosLS = productoLS.PK_products;
                }
            });
        
            if(productosLS === producto.PK_products){
            Swal.fire({
                type: 'info',
                title: 'Ooops!',
                text: 'El producto ya está en el carrito',
                showConfirmButton: false,
                timer: 1000
            })
            }
            else {
                this.carrito.push(producto);
                localStorage.setItem('carrito', JSON.stringify(this.carrito));
            } 
        },
        obtenerProductosLocalStorage(){
            let productoLS;

            //Comprobar si hay algo en LS
            if(localStorage.getItem('carrito') === null){
                productoLS = [];
            }
            else {
                productoLS = JSON.parse(localStorage.getItem('carrito'));
            }
            return productoLS;
        }
    },
    mounted() {
        this.listarProductos();
        this.listarCategorias();
        this.carrito = JSON.parse(localStorage.getItem('carrito'));
        if (!Array.isArray(this.carrito)){
            this.carrito = [];
        }
        console.log(this.carrito, "carrito");
    }

}
</script>