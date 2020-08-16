<template>
    <select class="select-tienda-index" v-model="idBranch">
        <option value="" disabled >Seleccione su tienda</option>
        <option v-for="sucursal in arraySucursales" :key="sucursal.PK_PG_branches">{{sucursal.state}}</option>
    </select> 
</template>
<script>
export default {
    data(){
        return{
            arraySucursales:[],
            idBranch:0,
        }
    },
    methods:{
        listarSucursales(){
            let url = '/branches'
            let m=this;
            axios.get(url).then(function (response){
                m.arraySucursales= response.data;
            })
            .catch(function(error){
                console.log(error);
            });
        }
    },
    mounted(){
        this.listarSucursales();
    }
}
</script>