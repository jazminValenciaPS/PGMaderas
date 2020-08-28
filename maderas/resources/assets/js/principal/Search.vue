<template>
    <section class="main-input">
        <div class="main-input-container">
            <label style="cursor: pointer;" for="search" :title="'Buscar' +busqueda" @click="buscar()" class="label-icon"><i class="material-icons color-main">search</i></label>
            <input v-model="busqueda" id="search" type="search" v-on:keyup.enter="buscar()" style="height: 40px;margin: 0; border-bottom: 1px solid #616161;"  required placeholder="Buscar" class=" letraTN">
            <i class="material-icons" @click="busqueda = ''" href="">close</i>
        </div> 
    </section>   
</template>
<script>
import Swal from 'sweetalert2';

export default {
    data(){
        return{
            busqueda:''
        }
    }, 
    methods:{
        buscar(){
            let m=this;
            window.location = "/Productos?search="+m.busqueda;
        },
    },
}
</script>
