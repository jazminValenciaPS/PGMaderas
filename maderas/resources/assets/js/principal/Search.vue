<template>
    <section class="main-input">
        <div class="main-input-container">
            <i class="material-icons color-main">search</i>
            <!-- <form action="{{ route('search') }}" method="GET" > -->
            <input v-model="busqueda" id="input-search-nav" type="search" required placeholder="Buscar" class=" letraTN">
            <a class="main-icon" href=""></a>
            <!-- </form> -->
        </div> 
    </section>   
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            busqueda:'',
       
        }
    }, 
    methods:{
        buscar(page,buscar,criterio){
            let m=this;
            var url='/buscar?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
    
            console.log("si se pudo");
            })
            .catch(function(error){
                console.log(error);
            });
        },
    },
   
  
}
</script>
