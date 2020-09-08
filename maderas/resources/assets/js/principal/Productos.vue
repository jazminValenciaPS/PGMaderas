
<template>
     <main  class="main-index">
        <div class="row">
            <!-- Filters -->
            <div class="col m3 s12">
                <ul class="collection">
                    <li class="collection-item">
                       <h6>Categorías</h6>
                        <a v-for="cate in arrayCategorias" :key="cate.PK_categories" value="" @click="productosCate(1,buscar,criterio,cate.PK_products_categories)"  href="#">{{cate.name}}</a>
                    </li>
                    <li class="collection-item">
                        <h6>Filtro de búsqueda:</h6>
                        <h6>Precio</h6>
                        <a  @click="listarProductos(1,buscar,criterio)">Menos de $99</a>
                        <a @click="listarProductos(1,buscar,criterio)" href="#!">Entre $100 y $299</a>
                        <a href="#!" >Entre $300 y $500</a>
                    </li>
                </ul>
            </div>

            <!-- Products -->
            <div  id="listaproductos" >
                <div class="col m9 s12" id="Productos">
                    <div style="z-index:0" v-for="producto in arrayProductos" :key="producto.PK_products" class="card sticky-action col m4 s12 contorno" >
                        <div class="card-image waves-effect waves-block waves-light tamaImagen " >
                            <a :href="'/Ver-Producto?id='+producto.PK_products"> <img :src="'img/'+producto.image" :alt="producto.name" class="pImagen" > </a>
                        </div>
                        <div class="card-content tamaLetras ">
                            <br>
                            <span class="card-title grey-text text-darken-4">{{producto.name}}</span>
                            <p>SKU: {{producto.SKU}}</p>
                            <p v-show="producto.avaible == 0">Disponibilidad: No disponible</p> 
                            <p v-show="producto.avaible > 0">Disponibilidad: {{producto.avaible}}</p> 
                            <h6>${{producto.price}}</h6>
                        </div>
                        <div class="card-action">
                            <a class="btn bg-main agregar-carrito hide-on-small-only" v-on:click="cantidad = 1"  v-show="producto.avaible > 0" @click="agregarCarrito(producto)" >Agregar a Carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                        </div> 
                    </div>
                </div>
                <br>
                <hr class="col l12">
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
            branch: 0,
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
            buscar:'',
            idSubcat:'',
            buscarLike:''

        }
    }, 
    methods:{
        listarProductos(page,buscar,criterio){
            let m=this;

            if(m.idSubcat=='' && m.buscarLike != ''){
            var url='/productoL?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio +'&buscarLike='+m.buscarLike + '&id_branch=' + m.branch;
            }if(m.idSubcat!='' && m.buscarLike == '')
            { 
            var url='/productoL?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio +'&id='+m.idSubcat + '&id_branch=' + m.branch;
            }
           axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayProductos = respuesta.producto.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
        async selectBranch() {
            let me = this;
            if (typeof(Storage) !== "undefined") {
                if (localStorage.getItem("branch") === null)
                    localStorage.setItem("branch", JSON.stringify(1));

                const url = "/user/info";
                await axios.get(url).then((result) => {
                    console.log("selectBranch");
                    console.log(result.data[0]);
                    if ([undefined, null, 0, ""].includes(result.data[0])) {
                        const LS = JSON.parse(localStorage.getItem("branch"));
                        me.branch = LS;
                        me.listarProductos(1,this.buscar,this.criterio);

                        console.log("idBranch en selectBranch recién asignado");

                        console.log(me.branch);
                    }
                    else {  
                        me.branch = result.data[0].id_branch;
                         me.listarProductos(1,this.buscar,this.criterio);

                    }
                })
                .catch((err) => {
                    console.log(err);
                });
            }
            else {
                console.log("Sorry, your browser does not support Web Storage...");
            }
        },
        listarCat(id){
            let m=this;
            axios.get('/categoriaProductoL?id=' + id).then(function (response){
                
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
        productosCate(page,buscar,criterio,id){
            let m=this;
            var url='/productoCategoria?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio +'&id='+id;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayProductos = respuesta.producto.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
        agregarCarrito(producto){
            let carritoAgregar = this.carrito;
            let cantidad = this.cantidad;
            let precioFinal = this.precioFinal;

            let coincidencia = this.carrito.find((productoLS) => productoLS.PK_products === producto.PK_products);
            Swal.fire({
            icon:'question',
            title:'Agregar al carrito',
            text: 'Cuantos productos desea agregar?',
            input: 'range',
            showCancelButton: true,
            cancelButtonText:'Cancelar',
            confirmButtonColor: '#424191',
            cancelButtonColor: '#c13737',
            confirmButtonText: 'Agregar',
            inputAttributes: {
                min: 1,
                max: producto.avaible,
            },
            inputValue: 1,
            }).then(function(result) {
                if (result.value) {
                    Swal.fire(
                    'Agregado!',
                    'El producto a sido agregado.',
                    'Guardado'
                    )
                    if(coincidencia){
                        const amount = result.value;
                        // carritoAgregar.cantidad = carritoAgregar.cantidad + amount; 
                        coincidencia.cantidad = amount;
                        console.log(carritoAgregar,'carritoAgregar');
                        console.log(producto,'producto');
                        localStorage.setItem('carrito', JSON.stringify(carritoAgregar));
                    }else{
                        const amount = result.value;
                        producto.cantidad = amount;
                        producto.precioFinal = precioFinal;
                        carritoAgregar.push(producto);
                        localStorage.setItem('carrito', JSON.stringify(carritoAgregar));
                    }
                    
                }
            })
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
    beforeMount(){
        let m= this;
        m.selectBranch();
    },
    mounted() {
        let m=this;
        const queryString = window.location.search;      
        const urlParams = new URLSearchParams(queryString);       
        const product = urlParams.get('id');
        const like = urlParams.get('buscar');

        let buscar = (like !== null && like !== '' && like !== undefined)? like : "";

        m.buscarLike = buscar;





        let id = (product !== null && product !== '' && product !== undefined)? product : "";
        m.idSubcat= id;
        m.listarCat(id);
        this.crearCarrito();
        // this.listarCat();
    }

}
</script>