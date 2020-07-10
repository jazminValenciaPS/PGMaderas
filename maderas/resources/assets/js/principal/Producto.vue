<template>
      <main>
        <div class="row">
            <!-- Container -->
            <div v-for="producto in arrayProducto" :key="producto.PK_products">
                <!-- Filters -->
                <div class="col m6 s12">
                    <img class="materialboxed" width="100%" :src="'img/'+producto.image">
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
                        <select class="col m3 s5 browser-default" v-model="contenido" >
                            <option value="" disabled selected>Disponibilidad del producto</option>
                            <option v-for="items in producto.avaible" :key="items.index">{{ items }}</option>
                        </select> 
                        <a class="col m8 s6 btn bg-main ml-1" href="#" @click="addToCard(idproduct)" v-show="producto.avaible > 0">Agregar a Carrito<i class="material-icons left m-0">add_shopping_cart</i></a>
                    </div>
                </div>
            </div>
        </div>

    </main>
</template>
<script>
export default {
     props:{
            productoid: Number
        },
        data(){
        return{
            arrayProducto: [],
            idproduct:'',
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
        addToCard(idproduct){
            let m=this;

            let formData = new FormData();
            formData.append('PK_products',m.idproduct);
            formData.append('avaible', m.contenido);

            axios.post('/producto/disponibilidad',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            
            })
            .catch(function(error){
                console.log(error);
            });
        }
    },
     async mounted() {
            let m=this;
            const queryString = window.location.search;      
            const urlParams = new URLSearchParams(queryString);        
            const product = urlParams.get('id');      
            let id = (product !== null && product !== '' && product !== undefined)? product : "";
            m.listarProducto(id);
        }
}
</script>