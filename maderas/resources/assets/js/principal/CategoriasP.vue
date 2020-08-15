<template>
    <main class="main-index">
        <div class="row">
            <div class="col m3 s12">
                <ul class="collection">
                    <li class="collection-item">
                        <h6>Categorías</h6>
                        <a v-for="category in arrayCategorias" :key="category.PK_products_categories" value="">{{category.name}}</a>
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
            <h3 class="color-main center" >¡Nuestras categorías!</h3>
            <div class="display-categorias">
                <div class="card-categories" v-for="cate in CategoriasProducto" :key="cate.PK_categories">
                    <div class="contend-card-categories">
                        <img class="card-image-categories" :src="'img/'+cate.image">
                        <span class="card-title">{{cate.name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';
export default {
    data() {
        return {
            CategoriasProducto:[],
            arrayCategorias:[],
        }
    },
    methods:{
        listarCategoriasProducto(id_subcategorias){
            let m=this;
            axios.get('/categoriasProductos/'+id_subcategorias).then(function (response){
                m.arrayCategoriasProducto = response.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
        listarCat(){
            let m=this;
            axios.get('/categoriaProductoV').then(function (response){
                m.arrayCategorias = response.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },

    },
    mounted() {
        this.listarCategoriasProducto();
        this.listarCat();
    }
}
</script>