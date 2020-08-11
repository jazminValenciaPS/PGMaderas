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
            <div  id="listaproductos" >
                <div class="col m9 s12" id="Productos">
                    <div style="z-index:0" v-for="producto in arrayProductos" :key="producto.PK_products" class="card sticky-action col m4 s12 contorno" v-show="producto.avaible > 0">
                        <div class="card-image waves-effect waves-block waves-light tamaImagen " >
                            <a :href="'/Ver-Producto?id='+producto.PK_products"> <img :src="'img/'+producto.image" class="pImagen" > </a>
                        </div>
                        <div class="card-content tamaLetras ">
                            <br>
                            <span class="card-title grey-text text-darken-4">{{producto.name}}</span>
                            <p>SKU: {{producto.SKU}}</p>
                            <h6>${{producto.price}}</h6>
                        </div>
                        <div class="card-action">
                            <a class="btn bg-main agregar-carrito hide-on-small-only" v-on:click="cantidad = 1"  @click="agregarCarrito(producto)" >Agregar a Carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                        </div> 
                    </div>
                </div>
                <ul class="pagination center">
                    <li  v-if="pagination.current_page > 1">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"><i class="material-icons">chevron_left</i></a>
                    </li>
                    <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a  href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)" ><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
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
            precioFinal:0,
            pagination : 
            {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset : 3,
            criterio : 'SKU',
            buscar:''
        }
    }, 
    methods:{
        listarProductos(page,buscar,criterio){
            let m=this;
            var url='/productoL?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayProductos = respuesta.producto.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
        listarCat(id){
            let m=this;
            axios.get('/categoriaProductoL?id='+id).then(function (response){
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
            let cantidad = this.cantidad;
            let precioFinal = this.precioFinal;

            let coincidencia = this.carrito.find((productoLS) => productoLS.PK_products === producto.PK_products);
            if(coincidencia){
                Swal.fire({
                    type: 'info',
                    title: 'Ooops!',
                    text: 'El producto ya está en el carrito',
                    showConfirmButton: false,
                    timer: 1000
                });
                return;
            }
            producto.cantidad = cantidad;
            producto.precioFinal = precioFinal;

            this.carrito.push(producto);
            localStorage.setItem('carrito', JSON.stringify(this.carrito));
        },
        crearCarrito(){
            this.carrito = JSON.parse(localStorage.getItem('carrito'));

            if (!Array.isArray(this.carrito)){
                this.carrito = [];
            }

        },
        cambiarPagina(page,buscar,criterio){
           let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarProductos(page,buscar,criterio);
        },
    },
    computed:{
         isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
    },
    mounted() {
        let m=this;
        const queryString = window.location.search;      
        const urlParams = new URLSearchParams(queryString);        
        const product = urlParams.get('id');
        console.log("hola");

        console.log(product);
        let id = (product !== null && product !== '' && product !== undefined)? product : "";
         m.listarCat(id);
        this.listarProductos(1,this.buscar,this.criterio);
        this.crearCarrito();
        // this.listarCat();
    }

}
</script>