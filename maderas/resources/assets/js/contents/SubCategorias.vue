<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Subcategorías</h5>
            </div>
            <div class="right form ">
                <button type="summit"  data-target="modal1" class="modal-trigger" @click="abrirModal('subcategorias','registrar')">
                    Agregar Subcategorías
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
                    <div class="col s12 center">
                        <img v-if="tipoAccion==2" :src="'img/'+image"  class="tImagen" alt="">
                    </div>
                    <div class="form-group row">
                        <!-- input para el nombre de la subCategoria --> 
                        <input id="name" type="text" v-model="name" placeholder="Nombre de la subcategoría"  class="validate" >
                        <!-- <label  for="nombre">Nombre</label> -->
                        <br>  
                        <!-- input para la descripción de la subcategoria-->
                        <input id="description" type="text" v-model="description" placeholder="Descripcion" class="validate">
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
                        <select name="LeaveType" class="browser-default" v-model="id_category">
                            <option value="" disabled selected>Selecciona la categoría</option>
                            <option v-for="cate in arrayCategoria" :value="cate.PK_categories"  :key="cate.PK_categories">{{ cate.name }}</option>
                        </select> 
                        <br>
                    </div> 
                    <div v-show="errorSubcategoria" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjSubcategoria" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    </div> 

                    <div class="button-container form formmodal-footer">
                        <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevaSubcategoria()">Guardar</button>
                        <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarSubcategoria(PK_subcategories)">Actualizar</button>
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
            <tbody  v-for="subcategoria in arraySubcategoria" :key="subcategoria.PK_subcategories">
            <tr>
                <td v-text="subcategoria.name"></td> 
                <td class="hide-on-small-only"  v-text="subcategoria.categoria"></td>
                    <td class="hide-on-small-only"  v-text="subcategoria.description"></td>
                    <td class="hide-on-small-only"><img :src="'img/'+subcategoria.image" class="tImagen square"></td>
                <td class="hide-on-small-only"  v-if="subcategoria.status == 1">Activado</td>
                <td class="hide-on-small-only"  v-if="subcategoria.status == 0">Desactivado</td>
                <td>
                    <i class="material-icons color-text " @click="abrirModal('subcategorias','actualizar',subcategoria,subcategoria.PK_subcategories)">create</i>
                </td>
                <td class="desactivarActivar">
                    <a href="#!" class="secondary-content" v-if="subcategoria.status == 1">
                        <i class="switch">
                            <label><input type="checkbox" checked="checked" name="status" v-model="subcategoria.status" @click="desactivarSubcategoria(subcategoria.PK_subcategories)"><span class="lever"></span></label>
                        </i>
                    </a>
                    <a href="#!" class="secondary-content" v-if="subcategoria.status == 0">
                        <i class="switch">
                            <label><input type="checkbox"  name="status" v-model="subcategoria.status" @click="activarSubcategoria(subcategoria.PK_subcategories)"><span class="lever"></span></label>
                        </i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </main>
</template>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});
import Swal from 'sweetalert2';

export default {
   data() {
        return {
            PK_subcategories: 0,
            id_category: 0,
            name: '',
            categoria: '',
            description:'', 
            image:'',
            file:'',
            status : true,
            arraySubcategoria:[],
            arrayCategoria:[],
            arrayIdCategoria:[],
            modal : 0,
            tituloModal : '' ,
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
        limpiar(){
         let me = this;
         me.name='';
         me.image = '';
         me.description='';
         me.categoria='';
         me.file='';
         me.tituloModal='';
         me.idTalla='';
         me.tipoAccion = 0;
         me.arraySubcategoria= [];
         me.arrayIdCategoria=[];
        },
        verSelects(){
                let me=this;
                me.listado=2;
                //Obtener los datos del ingreso de sub categorias
                var url= '/categoriaV';
                axios.get(url).then(function (response) {
                    var arrayCategoria= response.data;
                    me.arrayCategoria = arrayCategoria.map(object => ({PK_categories: object.PK_categories, name: object.name})); 
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
            this.file='';
            this.tipoAccion = 0;
            this.errorSubcategoria = 0;
            this.errorMostrarMsjSubcategoria = [];
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
        abrirModal(modelo,accion, data = [],PK_subcategories){
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
                            m.tituloModal = 'Registrar subcategoría';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_subcategories=data['PK_subcategories'];
                            m.id_category = data['id_category'];
                            m.tipoAccion = 2;
                            m.image=data['image'];
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
            formData.append('id_category', me.id_category);
            formData.append('name', me.name);
            formData.append('description', me.description);
            
            // Registramos la informacion
            let url = '/subcategoria/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
                me.listarSubcategoria();
                me.cerrarModal();
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        actualizarSubcategoria(PK_subcategories){
            if (this.validarSubcategoria()){
                return;
            }
                let me = this;

                let formData = new FormData();
                formData.append('PK_subcategories',PK_subcategories);
                formData.append('id_category', me.id_category);
                formData.append('name', me.name);
                formData.append('description',me.description);
                formData.append('file', me.file);

                //Registramos la informacion
                axios.post('/subcategoria/actualizar',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function (response) {
                    me.listarSubcategoria();
                    me.cerrarModal();
                    me.limpiar();                    
                })
                .catch(function (error) {
                    console.log(error);
                });      
        },
        desactivarSubcategoria(PK_subcategories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de desactivar esta subcategoría?',
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

                    axios.put('/subcategoria/desactivar',{
                        'PK_subcategories': PK_subcategories
                    }).then(function (response) {
                        me.listarSubcategoria();
                        Swal.fire(
                            'Desactivado!',
                            'La subcategoría ha sido desactivada con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if(
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ){
                        me.listarSubcategoria();
                    }
            })
        },
        activarSubcategoria(PK_subcategories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de activar esta subcategoría?',
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
                axios.put('/subcategoria/activar',{
                    'PK_subcategories': PK_subcategories
                }).then(function (response) {
                    me.listarSubcategoria();
                    Swal.fire(
                        'activado!',
                        'La subcategoría ha sido activada con éxito.',
                        'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });
            
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                        me.listarSubcategoria();                    
            }
            }) 
                
        },
        validarSubcategoria(){
            this.errorSubcategoria = 0;
            this.errorMostrarMsjSubcategoria = [];

                if (!this.file ) this.errorMostrarMsjSubcategoria.push("Se tiene que ingresar una imagen.");
                if (!this.name) this.errorMostrarMsjSubcategoria.push("El nombre de la subcategoría no puede estar vacío.");
                if (!this.description) this.errorMostrarMsjSubcategoria.push("La descripción de la subcategoría no puede estar vacío.");
                if (this.errorMostrarMsjSubcategoria.length) this.errorSubcategoria = 1;
                return this.errorSubcategoria;
        },
    },
    mounted() {
        this.listarSubcategoria();
        this.verSelects();
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
