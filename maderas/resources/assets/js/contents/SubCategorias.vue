<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>SubCategorias</h5>
            </div>
            <div class="right form ">
                <button type="summit">
                    Agregar SubCategorias
                </button>
            </div>
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="hide-on-small-only">Categoria</th>
                        <th class="hide-on-small-only">Descripcion</th>
                        <th class="hide-on-small-only">Imagen</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                    </tr>
                </thead>
                    <tbody  v-for="subcategoria in arraySubcategoria" :key="subcategoria.idSubcategoria">
                    <tr>
                        <td v-text="subcategoria.name"></td> 
                        <td class="hide-on-small-only"  v-text="subcategoria.categoria"></td>
                        <td class="hide-on-small-only"  v-if="subcategoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="categosubcategoriaria.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('Categoria','actualizar',categoria,categoria.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="subcategoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="subcategoria.status" @click="desactivarCategoria(subcategoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="subcategoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="subcategoria.status" @click="activarCategoria(subcategoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
        </div>
    </main>
</template>
<script lang="ts">
// import Vue from 'vue'

export default {
    data() {
        return {
            PK_subcategories: 0,
            id_category: 0,
            name: '',
            description:'', 
            image:'',
            status : true,
            arrayCategoria:[],
            arraySubcategoria: [],
            modal : 0,
            tituloModal : 'Registrar Categorias' ,
            cambio : 0,
            tipoAccion: 0,
            errorSubcategoria : 0,
            errorMostrarMsjSubcategoria : []
        }
    },
    methods:{
        listarSubcategoria(){
            let m=this;
            axios.get('/subcategoria').then(function (response){
                m.arraySubcategoria = response.data;
                m.status = response.status.data;
                if(status == true){
                    status = 1
                }else{
                    status = 0
                }
            })
            .catch(function(error){
                console.log(error);
            });
        },
    },
    mounted() {
        this.listarSubcategoria();
    }
}
</script>