<template>
    <main>
        <div class="row" >
            <div class="col m3 s3 "  v-for="(cat, index) in categorias" :key="index">
                <h6 class="title">{{cat.categoria}}</h6>
                <a style="color: gray" v-for="(subcat, otroindex) in cat.subcategories" :key="otroindex" :href="'/Ver-Categoria-Producto?id='+subcat.idSubcategories"> {{subcat.subcategoria }}</a>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    data(){
        return{
            categorias:[],
        }
    },
    methods: {
        listarMenu(){
        let url = '/submenu'
        let m=this;
        axios.get(url).then(function (response){
                m.categorias= response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        },
    },
    mounted(){
        this.listarMenu();
    }
}
</script>