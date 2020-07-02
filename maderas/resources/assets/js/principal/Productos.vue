<template>
     <main>

        <!-- Container -->
        <!-- Container -->
        <!-- Container -->
        <!-- Container -->
        <!-- Container -->
        <div class="row">
            <!-- Filters -->
            <div class="col m3 s12">
                <ul class="collection">
                    <li class="collection-item">
                        <h6>Categorías</h6>
                        <a href="#!">Madera</a>
                        <a href="#!">Tableros</a>
                        <a href="#!">Complementos</a>
                    </li>
                    <li class="collection-item">
                        <h6>Filtro de búsqueda:</h6>
                        <h6>Precio</h6>
                        <a href="#!">Menos de $99</a>
                        <a href="#!">Entre $100 y $299</a>
                        <a href="#!">Entre $300 y $500</a>
                    </li>
                </ul>
            </div>

            <!-- Products -->
            <div class="col m9 s12" id="Productos">

                <div v-for="producto in arrayProductos"  :key="producto.PK_products" class="card sticky-action col m4 s12">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img :src="'img/'+producto.image" class="pImagen">
                    </div>
                    <div class="card-content">
                        <span class="card-title grey-text text-darken-4">{{producto.name}}</span>
                        <p>SKU: {{producto.SKU}}</p>
                        <h6>${{producto.price}}</h6>
                    </div>
                    <div class="card-action">
                        <a class="btn bg-main" href="#">Agregar a Carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                    </div>
                </div>

            </div>
        </div>
        

    </main>
</template>
<script>
export default {
    data(){
        return{
            PK_products:'',
            arrayProductos: [],
            tipoAccion: 0,
        
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
    
      
    },
    mounted() {
        this.listarProductos();
    }
}
</script>