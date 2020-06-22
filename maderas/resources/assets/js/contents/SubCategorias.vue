<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>SubCategorias</h5>
            </div>
            <div class="right form ">
                <button type="summit"  data-target="modal1" class="modal-trigger" @click="abrirModal('subcategorias','registrar')">
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
                         <td class="hide-on-small-only"  v-text="subcategoria.description"></td>
                          <td class="hide-on-small-only"  v-text="subcategoria.image"></td>
                        <td class="hide-on-small-only"  v-if="subcategoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="subcategoria.status == 0">Desactivado</td>
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
        verSelects(){
                let me=this;
                me.listado=2;
                //Obtener los datos del ingreso de sub categorias
                var url= '/categoria';
                axios.get(url).then(function (response) {
                    var arrayCategoria= response.data;
                    me.arrayCategoria = arrayCategoria.map(object => ({idSubCategorias: object.idSubCategorias, NombreSub: object.NombreSub})); 
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.name = '';
            this.id_category = "";
            this.description = '';
            this.image = '';
            this.tipoAccion = 0;
            this.errorCategoria = 0;
            this.errorMostrarMsjCategoria = [];
        },
        seleccionarImagen(img){
            if (img == 1) {            
                this.file = this.$refs.filea.files[0];
                readURL(document.getElementsByClassName("categoriaAlta")[0], 1);
            }
            else {
                this.file = this.$refs.filec.files[0];
                readURL(document.getElementsByClassName("categoriaEdit")[0], 2);
            }
            this.cambio = 1;

            function readURL(input, img) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        if (img == 1) {
                            readURL('.imgAlta').attr('src', e.target.result);
                        }
                        else {
                            readURL('.imgCambio').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        },
        abrirModal(modelo,accion, data = [],PK_categories){
            let m=this;
            switch(modelo){
                case "subcategorias":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            m.descripcion = '';
                            m.image= 'Selecciona imagen';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar producto';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_categories = data['PK_categories'];
                            m.tipoAccion = 2;
                            m.imagen=data['image'];
                            m.name=data['name'];
                            m.description=data['description'];
                            m.tituloModal = 'Actualizar producto';
                        }
                    }
                }
            }
        },
    },
    mounted() {
        this.listarSubcategoria();
    }
}
</script>
<style>
    .modal-content{
        width: 100% !important;
        position: absolute !important;
        height: 600px;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        z-index: 100;
    }
    .centrado{
        height:560px;
        margin-left: 20%;
        margin-right: 30%;
    }
    .espacioButton{
        margin-left: 10px !important;
    }
</style>