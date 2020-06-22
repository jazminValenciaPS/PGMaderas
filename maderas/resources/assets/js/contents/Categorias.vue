<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Categorias</h5>
            </div>
            <div class="right form ">
                <button type="summit"  data-target="modal1" class="modal-trigger" @click="abrirModal('categorias','registrar')">
                    Agregar Categorias
                </button>
            </div>
        </div>

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
                        <!-- input para el nombre del producto --> 
                        <input id="nombre" type="text" v-model="name" placeholder="Nombre Categoria"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- input para la descripción del producto-->
                        <input id="descripcion" type="text" v-model="description" placeholder="Descripcion" class="validate">
                        <!-- <label  for="descripcion"></label> -->
                        <br> 
                        <!-- input para la imagen del producto --> 
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
                    <div v-show="errorCategoria" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjCategoria" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    <div class="button-container form formmodal-footer">
                        <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevaCategoria()">Guardar</button>
                        <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarCategoria(PK_categories)">Actualizar</button>
                        <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  
        <!-- modal inicio -->

         <!-- tabla inicio -->
         <div class="col s12 m12 gl6"> 
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="hide-on-small-only">Descripcion</th>
                        <th class="hide-on-small-only">Imagen</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                    </tr>
                </thead>
                <tbody  v-for="categoria in arrayCategoria" :key="categoria.PK_categories">
                    <tr>
                        <td v-text="categoria.name"></td> 
                        <td class="hide-on-small-only"  v-text="categoria.description"></td>
                        <td class="hide-on-small-only" ><img :src="'img/'+categoria.image" class="square"></td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('categorias','actualizar',categoria,categoria.PK_categories)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="categoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarCategoria(categoria.PK_categories)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarCategoria(categoria.PK_categories)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
             </table>
        </div>
        <!-- tabla final -->
    </main>
</template>
<script>
// import categorias from './Categorias.vue'
import Swal from 'sweetalert2';

export default {
    data() {
        return {
            PK_categories: 0,
            name: '',
            description:'', 
            image:'',
            status : true,
            arrayCategoria:[],
            modal : 0,
            tituloModal : 'Registrar Categorias' ,
            cambio : 0,
            tipoAccion: 0,
            errorCategoria : 0,
            errorMostrarMsjCategoria : []
        }
    },
    methods:{
        listarCategoria(){
            let m=this;
            axios.get('/categoria').then(function (response){
                m.arrayCategoria = response.data;
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
        abrirModal(modelo,accion, data = [],PK_categories){
            let m=this;
            switch(modelo){
                case "categorias":{
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
        nuevaCategoria(){
            if (this.validarCategoria()){
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
                this.cerrarModal();
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
            this.modal = 0;
            this.tituloModal = '';
            this.name = '';
            this.description = '';
            this.image = '';
            this.tipoAccion = 0;
            this.errorCategoria = 0;
            this.errorMostrarMsjCategoria = [];
        },
        actualizarCategoria(PK_categories){

                let me = this;
                console.log("estoy entrando a categoria actualizar",me.name);

                console.log("descripcion",me.description);

                let formData = new FormData();
                formData.append('PK_categories',PK_categories);
                formData.append('name', me.name);
                formData.append('description',me.description);
                formData.append('file', me.file);

                //Registramos la informacion
                axios.post('/categoria/actualizar',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.listarCategoria();
                    me.cerrarModal();
                    me.limpiar();                    
                })
                .catch(function (error) {
                    console.log(error);
                });      
        },
        desactivarCategoria(PK_categories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de desactivar esta Categoria?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
                if (result.value) {

                    console.log('id de categoria es:', PK_categories);
                    axios.put('/categoria/desactivar',{
                        'PK_categories': PK_categories
                    }).then(function (response) {
                        me.listarCategoria();
                        Swal.fire(
                            'Desactivado!',
                            'La categoria ha sido desactivado con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if(
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ){
                        me.listarCategoria();
                    }
            })
        },
        activarCategoria(PK_categories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de activar esta Categoria?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                axios.put('/categoria/activar',{
                    'PK_categories': PK_categories
                }).then(function (response) {
                    me.listarCategoria();
                    Swal.fire(
                        'activado!',
                        'La categoria ha sido activado con éxito.',
                        'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });
            
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                        me.listarCategoria();                    
            }
            }) 
                
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