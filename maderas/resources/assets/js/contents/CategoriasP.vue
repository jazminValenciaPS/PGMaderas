<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Categorías de productos</h5>
            </div>
            <div class="right form ">
                <button type="summit"  data-target="modal1" class="modal-trigger" @click="abrirModal('categoriasP','registrar')">
                    Agregar Categorias para productos
                </button>
            </div>
        <!-- modal inicio -->

        <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg " role="document">
                <div class = "container">
                    <br>
                    <div class="center">
                        <h3 v-text="tituloModal"></h3>
                    </div>
                    <div class="col s12 center">
                        <img v-if="tipoAccion==2" :src="'img/'+image"  class="tImagen imagenEdit" alt="">
                    </div>
                    <div class="form-group row">
                        <input id="nombre" type="text" v-model="name" placeholder="Nombre Categoria"  class="validate" >
                        <br>
                        <!-- <div class="col s10 center">
                            <div class="file-field input-field">
                                <div class="btn button-image">
                                    <span>Imagen</span>
                                    <input id="file" ref="filea"  type="file" data-vv-scope="new"  v-on:change="seleccionarImagen(1)" class="categoriaAlta">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>  -->
                        <select name="LeaveType" class="browser-default" v-model="id_subcategories">
                            <option value="" disabled selected>Selecciona la subcategoria</option>
                            <option v-for="subcate in arraySubcategoria" :value="subcate.PK_subcategories"  :key="subcate.PK_subcategories">{{ subcate.name }}</option>
                        </select> 
                    </div> 
                    <div v-show="errorCategoriaP" class="form-group row div-error">
                        <div class="text-center text-error">
                            <div v-for="error in errorMostrarMsjCategoriaP" :key="error" v-text="error">
                            </div>
                        </div>
                    </div>
                    <div class="button-container form formmodal-footer">
                        <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevaCategoria()">Guardar</button>
                        <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarCategoria(PK_products_categories)">Actualizar</button>
                        <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>  

         <!-- tabla inicio -->
        <div class="col s12 m12 gl6"> 
            <div class="row ">
                <div class="form-group center">
                    <div class="col s6">
                        <div class="input-group">
                            <select name="LeaveType" class="browser-default" v-model="criterio">
                                <option value="" disabled selected>Selecciona con que buscar</option>
                                <option value="name">Nombre</option>
                            </select> 
                            <input type="text" v-model="buscar" @keyup.enter="listarCategoria(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                            <button type="submit" @click="listarCategoria(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
             
            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <!-- <th class="hide-on-small-only">Imagen</th> -->
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                    </tr>
                </thead>
                <tbody  v-for="categoria in arrayCategoriaP" :key="categoria.PK_products_categories">
                    <tr>
                        <td v-text="categoria.name"></td> 
                        <!-- <td class="hide-on-small-only" ><img :src="'img/'+categoria.image" class="tImagen square"></td> -->
                        <td class="hide-on-small-only"  v-if="categoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('categoriasP','actualizar',categoria,categoria.PK_products_categories)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="categoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarCategoria(categoria.PK_products_categories)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarCategoria(categoria.PK_products_categories)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
             </table>
             <!-- tabla final -->
           
            <ul class="pagination">
                <li  v-if="pagination.current_page > 1">
                    <a href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"><i class="material-icons">chevron_left</i></a>
                </li>
                <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                    <a href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)" ><i class="material-icons">chevron_right</i></a>
                </li>
            </ul>
        </div>
        </div>
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
            id_subcategories: 0,
            PK_products_categories: 0,
            name: '',
            categoria: '',
            image:'',
            file:'',
            status : true,
            arrayCategoriaP:[],
            arraySubcategoria:[],
            arrayIdSubcategoria:[],
            modal : 0,
            tituloModal : '' ,
            cambio : 0,
            tipoAccion: 0,
            errorCategoriaP : 0,
            errorMostrarMsjCategoriaP: [],
            pagination : {
                'total' : 0,
                'current_page' : 0,
                'per_page' : 0,
                'last_page' : 0,
                'from' : 0,
                'to' : 0,
            },
            offset : 3,
            criterio : 'name',
            buscar:''
        }
    },
    computed:{
         isActived: function(){
                return this.pagination.current_page;
            },
            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            }
    },
    methods:{
        listarCategoria(page,buscar,criterio){
            let m=this;
            var url = '/categoriaProducto?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayCategoriaP = respuesta.categoriasProduc.data;

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
        abrirModal(modelo,accion, data = [],PK_products_categories){
            let m=this;
            switch(modelo){
                case "categoriasP":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            // m.image= 'Selecciona imagen';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar categoría producto';
                            break;
                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.id_subcategories=data['id_subcategories'];
                            m.PK_products_categories = data['PK_products_categories'];
                            m.tipoAccion = 2;
                            // m.image=data['image'];
                            m.name=data['name'];
                            m.tituloModal = 'Actualizar categoría producto';
                        }
                    }
                }
            }
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
        desactivarCategoria(PK_products_categories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de desactivar esta categoría?',
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

                    axios.put('/categoriaProducto/desactivar',{
                        'PK_products_categories': PK_products_categories
                    }).then(function (response) {
                        me.listarCategoria(1,'','name');
                        Swal.fire(
                            'Desactivado!',
                            'La categoría ha sido desactivada con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if(
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ){
                        me.listarCategoria(1,'','name');
                    }
            })
        },
        activarCategoria(PK_products_categories){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de activar esta categoría?',
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
                axios.put('/categoriaProducto/activar',{
                    'PK_products_categories': PK_products_categories
                }).then(function (response) {
                    me.listarCategoria(1,'','name');
                    Swal.fire(
                        'activado!',
                        'La categoria ha sido activada con éxito.',
                        'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });
            
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                        me.listarCategoria(1,'','name');                    
            }
            }) 
                
        },
        verSelects(){
            let me=this;
            me.listado=2;
            //Obtener los datos del ingreso de sub categorias
            var url= '/subcategoriaV';
            axios.get(url).then(function (response) {
                var arraySubcategoria= response.data;
                me.arraySubcategoria = arraySubcategoria.map(object => ({PK_subcategories: object.PK_subcategories, name: object.name})); 
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        nuevaCategoria(){
            if (this.validarCategoria()){
                return;
            }
            let me = this;
 
            let formData = new FormData();

            // formData.append('file', me.file);
            formData.append('id_subcategories', me.id_subcategories);
            formData.append('name', me.name);
            
            // Registramos la informacion
            let url = '/categoriaProducto/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            })
            .then(function (response) {
                me.listarCategoria(1,'','name');
                me.cerrarModal();
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.name = '';
            // this.image = '';
            this.tipoAccion = 0;
            this.errorCategoriaP = 0;
            this.errorMostrarMsjCategoriaP = [];
        },
        validarCategoria(){
            this.errorCategoriaP = 0;
            this.errorMostrarMsjCategoriaP = [];

            // if (!this.file ) this.errorMostrarMsjCategoriaP.push("Se tiene que ingresar una imagen.");
            if (!this.name) this.errorMostrarMsjCategoriaP.push("El nombre de la subcategoría no puede estar vacío.");
            if (!this.id_subcategories) this.errorMostrarMsjProducto.push("Seleccione una subcategoría");
            if (this.errorMostrarMsjCategoriaP.length) this.errorCategoriaP = 1;
            return this.errorCategoriaP;
        },
         cambiarPagina(page,buscar,criterio){
           let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarCategoria(page,buscar,criterio);
        },
        actualizarCategoria(PK_products_categories){
            let me = this;

            let formData =  new FormData();
            // formData.append('file', me.file);
            formData.append('PK_products_categories',PK_products_categories);
             formData.append('id_subcategories', me.id_subcategories);
            formData.append('name', me.name);

            //Registramos la informacion
            axios.post('/categoriaProducto/actualizar',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (response) {
                me.listarProductos(1,'','name');
                me.cerrarModal();
                me.limpiar();                    
            })
            .catch(function (error) {
                console.log(error);
            });      
        }
    },
    mounted() {
        this.listarCategoria(1,this.buscar,this.criterio);
        this.verSelects();
    }
}
</script>
<style>
   
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        z-index: 100;
    }
</style>