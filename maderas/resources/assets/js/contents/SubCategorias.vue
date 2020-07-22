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
        <!--Inicio del modal-->

            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div class="col s5 center">
                        <img v-if="tipoAccion==2" :src="'img/'+image"  class="imagenEdit" alt="">
                    </div>
                    <div class="form-group row">
                        <!-- input para el nombre de la subCategoria --> 
                        <input id="nombre" type="text" v-model="name" placeholder="Nombre de la subcategoría"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- input para la descripción de la subcategoria-->
                        <input id="descripcion" type="text" v-model="description" placeholder="Descripcion" class="validate">
                        <!-- <label  for="descripcion"></label> -->
                        <br> 
                        <!-- input para la imagen de la subcategoria --> 
                        <div class="col s10 center">
                            <div class="file-field input-field">
                                <div class="btn button-image">
                                    <span>Imagen</span>
                                    <input id="file" ref="filea"  type="file" data-vv-scope="new"  v-on:change="seleccionarImagen(1)" class="categoriaAlta">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div v-show="errorSubcategoria" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjSubcategoria" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    <div class="button-container form formmodal-footer">
                        <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevaSubcategoria()">Guardar</button>
                        <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarSubcategoria(id_Subcategoria)">Actualizar</button>
                        <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  

            <!-- Mostrar datos -->
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
<script>
// import categorias from './Categorias.vue'

export default {
    data() {
        return {
            PK_subcategories: 0,
            id_category: 0,
            name: '',
            description:'', 
            image:'',
            status : true,
            arraySubcategoria:[],
            modal : 0,
            tituloModal : '' ,
            cambio : 0,
            tipoAccion: 0,
            errorCategoria : 0,
            errorMostrarMsjCategoria : []
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
        abrirModal(modelo,accion, data = [],id){
            let m=this;
            switch(modelo){
                case "subcategoria":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            m.descripcion = '';
                            m.image= 'Selecciona imagen';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar subcategoría';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_categories = data['PK_subcategories'];
                            m.tipoAccion = 2;
                            m.imagen=data['image'];
                            m.name=data['name'];
                            m.description=data['description'];
                            m.tituloModal = 'Actualizar subcategoría';
                        }
                    }
                }
            }
        },
        nuevaSubcategoria(){
            if (this.validarSubcategoria()){
                return;
            }
            let me = this;

            let formData = new FormData();

            formData.append('file', me.file);
            formData.append('PK_categories', me.PK_categories);
            formData.append('name', me.name);
            formData.append('description', me.description);
            
            // Registramos la informacion
            let url = '/categoria/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
                this.listarCategoria();
                // me.cerrarModal();
                // me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
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
                            $('.imgAlta').attr('src', e.target.result);
                        }
                        else {
                            $('.imgCambio').attr('src', e.target.result);
                        }
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        },
        validarCategoria(){
            
        },
        cerrarModal(){

        },

    },
    mounted() {
        this.listarCategoria();
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


