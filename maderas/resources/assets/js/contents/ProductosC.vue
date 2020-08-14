<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class="title">
                <h5>Productos</h5>
            </div>
           
            <!-- MODAL INICIO -->
            <div class="modal fade " tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                            <input id="SKU" type="text" v-model="SKU" placeholder="Número único del producto(SKU)"  class="validate" >
                            <!-- input para el nombre del producto --> 
                            <input id="nombre" type="text" v-model="name" placeholder="Nombre del producto"  class="validate" >
                            <!-- <label  for="nombre">Nombre</label> -->
                            <br>  
                            <select name="LeaveType" class="browser-default" v-model="id_products_categories">
                                <option value="" disabled selected >Selecciona la categoría de producto</option>
                                <option v-for="cate in arrayCategoriaProducto" :value="cate.PK_products_categories"  :key="cate.PK_products_categories" >{{ cate.name }}</option>
                            </select>
                            <input id="descripcion" type="text" v-model="description" placeholder="Descripción" class="validate">
                            <br> 
                            <div class="col s10 center">
                                <div class="file-field input-field">
                                    <div class="btn button-image">
                                        <span>Imagen</span>
                                        <input id="file" ref="filea"  type="file" data-vv-scope="new"  v-on:change="seleccionarImagen(1)" class="productoAlta">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div> 
                            <!-- input para precio -->
                              <div class="row">
                                <div class="col s12">
                                $
                                <div class="input-field inline">
                                    <input id="avaible" v-model="price" type="text" placeholder="precio del producto" class="validate">
                                </div>
                                </div>
                            </div>
                            <!-- $ <input id="avaible" type="text"  v-model="price"   class="validate" > -->
                  
                            <select name="LeaveType" class="browser-default" v-model="avaible">
                                <option value="" disabled selected>Disponibilidad del producto</option>
                                <option v-for="items in contenido" :key="items.index">{{ items }}</option>
                            </select> 
                        </div> 
                        <div v-show="errorProducto" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorMostrarMsjProducto" :key="error" v-text="error">
                                </div>
                            </div>
                        </div>
                        <div class="button-container form formmodal-footer">
                            <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevoProducto()">Guardar</button>
                            <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarProducto(PK_products)">Actualizar</button>
                            <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>  
            <!-- MODAL FIN -->
            <div class="col s12 m12 gl6"> 
                <div class="row">
                    <br>
                    <div class="form-group center">
                        <div class="col l12 buscarC">
                            <div class="input-field col s2">
                                <select name="LeaveType" class="browser-default" v-model="criterio">
                                    <option value="" disabled selected>Selecciona con que buscar</option>
                                    <option value="name">Nombre</option>
                                    <option value="SKU">SKU</option>
                                </select>  
                             </div>
                            <div class="input-field col s4">

                                <input type="text" v-model="buscar" @keyup.enter="listarProductos(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                             </div>
                            <div class="input-field col s3">
                               
                                <button type="submit" @click="listarProductos(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                             <div class=" form input-field col s3">
                                <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('producto','registrar')">
                                    Agregar Productos
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    <br>

                <table class=" tabla centered highlight">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th class="hide-on-small-only">Categoria</th>
                            <th class="hide-on-small-only">Descripcion</th>
                            <th class="hide-on-small-only">Imagen</th>
                            <th class="hide-on-small-only">Precio</th>
                            <th class="hide-on-small-only">Status</th>
                            <th>Editar</th>
                            <th>Desactivar/Activar</th>
                        </tr>
                    </thead>
                    <tbody  v-for="producto in arrayProductos" :key="producto.PK_products">
                        <tr>
                            <td v-text="producto.SKU"></td> 
                            <td v-text="producto.name"></td> 
                            <td class="hide-on-small-only"  v-text="producto.productscategories"></td>
                            <td class="hide-on-small-only"  v-text="producto.description"></td>
                            <td class="hide-on-small-only"><img :src="'img/'+producto.image" class="tImagen square"></td>
                            <td class="hide-on-small-only"  v-text="producto.price"></td>
                            <td class="hide-on-small-only"  v-if="producto.status == 1">Activado</td>
                            <td class="hide-on-small-only"  v-if="producto.status == 0">Desactivado</td>
                            <td>
                                <i class="material-icons color-text " @click="abrirModal('producto','actualizar',producto,producto.PK_products)">create</i>
                            </td>
                            <td class="desactivarActivar">
                                <a href="#!" class="secondary-content" v-if="producto.status == 1">
                                    <i class="switch">
                                        <label><input type="checkbox" checked="checked" name="status" v-model="producto.status" @click="desactivarProducto(producto.PK_products)"><span class="lever"></span></label>
                                    </i>
                                </a>
                                <a href="#!" class="secondary-content" v-if="producto.status == 0">
                                    <i class="switch">
                                        <label><input type="checkbox"  name="status" v-model="producto.status" @click="activarProducto(producto.PK_products)"><span class="lever"></span></label>
                                    </i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="pagination">
                    <li  v-if="pagination.current_page > 1">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)"><i class="material-icons">chevron_left</i></a>
                        <!-- <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)" ></a> -->
                    </li>
                    <li  v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                        <a  href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a  href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)" ><i class="material-icons">chevron_right</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';
export default {
    data(){
        return{
            PK_products:'',
            id_products_categories: '',
            SKU:'',
            name: '',
            subcategoria: '',
            description: '',
            image: '',
            price: '',
            status: true,
            avaible:'',
            contenido: 1000,
            arrayProductos: [],
            arrayCategoriaProducto: [],
            tituloModal : 'Registrar Productos' ,
            modal: 0,
            SKU: '',
            tipoAccion: 0,
            errorProducto : 0,
            errorMostrarMsjProducto : [],
             pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
            offset : 3,
            criterio : 'SKU',
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
        listarProductos(page,buscar,criterio){
            let m=this;
            var url='/producto?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayProductos = respuesta.producto.data;
            
            })
            .catch(function(error){
                console.log(error);
            });
        },
        cambiarPagina(page,buscar,criterio){
           let me = this;
            //Actualiza la página actual
            me.pagination.current_page = page;
            //Envia la petición para visualizar la data de esa página
            me.listarProductos(page,buscar,criterio);
        },
        abrirModal(modelo,accion, data = [],PK_products){
            let m=this;
            switch(modelo){
                case "producto":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            m.description = '';
                            m.price = '',
                            m.image= 'Selecciona imagen';
                            m.avaible = '';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar producto';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_products = data['PK_products'];
                            m.tipoAccion = 2;
                            m.image=data['image'];
                            m.name=data['name'];
                            m.SKU=data['SKU'];
                            m.avaible =data['avaible'];
                            m.description=data['description'];
                            m.price = data['price']
                            m.id_products_categories= data['PK_products_categories'];
                            m.tituloModal = 'Actualizar producto';
                        }
                    }
                }
            }
        },
        nuevoProducto(){
            if (this.validarProducto()){
                return;
            }
            let me = this;
 
            let formData = new FormData();

            formData.append('file', me.file);
            formData.append('name', me.name);
            formData.append('id_products_categories', me.id_products_categories);
            formData.append('description', me.description);
            formData.append('price', me.price);
            formData.append('SKU', me.SKU);
            formData.append('avaible', me.avaible);
            
            // Registramos la informacion
            let url = '/producto/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
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
        },
        actualizarProducto(PK_products){
            if (this.validarProducto()){
                return;
            }
                let me = this;

                let formData = new FormData();
                formData.append('PK_products',PK_products);
                formData.append('file', me.file);
                formData.append('name', me.name);
                formData.append('id_products_categories', me.id_products_categories);
                formData.append('description', me.description);
                formData.append('price', me.price);
                formData.append('SKU', me.SKU);
                formData.append('avaible', me.avaible);

                //Registramos la informacion
                axios.post('/producto/actualizar',formData,{
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
        },
        seleccionarImagen(img){
            if (img == 1) {            
                this.file = this.$refs.filea.files[0];
                readURL(document.getElementsByClassName("productoAlta")[0], 1);
            }
            else {
                this.file = this.$refs.filec.files[0];
                readURL(document.getElementsByClassName("productoEdit")[0], 2);
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
        verSelects(){
            let me=this;
            me.listado=2;
            //Obtener los datos del ingreso de sub categorias
            var url= '/categoriaProductoV';
            axios.get(url).then(function (response) {
                var arrayCategoriaProducto= response.data;
                me.arrayCategoriaProducto = arrayCategoriaProducto.map(object => ({PK_products_categories: object.PK_products_categories, name: object.name})); 
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.name = '';
            this.description = '';
            this.image = '';
            this.SKU='';
            this.id_products_categories = '';
            this.tipoAccion = 0;
            this.errorProducto = 0;
            this.errorMostrarMsjProducto = [];
        },
        validarProducto(){
            this.errorProducto = 0;
            this.errorMostrarMsjProducto = [];

                if (!this.file ) this.errorMostrarMsjProducto.push("Se tiene que ingresar una imagen.");
                if (!this.name) this.errorMostrarMsjProducto.push("El nombre de la subcategoría no puede estar vacío.");
                if (!this.description) this.errorMostrarMsjProducto.push("La descripción de la subcategoría no puede estar vacío.");
                if (!this.price) this.errorMostrarMsjProducto.push("Se tiene que ingresar precio.");
                if (!this.SKU) this.errorMostrarMsjProducto.push("El SKU no puede estar vacío.");
                if (!this.avaible) this.errorMostrarMsjProducto.push("Seleccione la disponibilidad del producto.");
                if (!this.id_products_categories) this.errorMostrarMsjProducto.push("Seleccione una categoria de producto");
                if(isNaN(this.price))this.errorMostrarMsjProducto.push("El precio del producto debe ser numérico.");


                if (this.errorMostrarMsjProducto.length) this.errorProducto = 1;
                return this.errorProducto;
        },
        activarProducto(PK_products){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de activar este producto?',
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
                axios.put('/producto/activar',{
                    'PK_products': PK_products
                }).then(function (response) {
                    me.listarProductos(1,'','name');
                    Swal.fire(
                        'activado!',
                        'El Producto ha sido activado con éxito.',
                        'success'
                    )
                }).catch(function (error) {
                    console.log(error);
                });
            
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                        me.listarProductos(1,'','name');                    
            }
            }) 
                
        },
        desactivarProducto(PK_products){
            let me = this;

            Swal.fire({
            title: '¿Está seguro de desactivar este producto?',
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
                    axios.put('/producto/desactivar',{
                        'PK_products': PK_products
                    }).then(function (response) {
                        me.listarProductos(1,'','name');
                        Swal.fire(
                            'Desactivado!',
                            'El producto ha sido desactivado con éxito.',
                            'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if(
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ){
                        me.listarProductos(1,'','name');
                    }
            })
        },
    },
    mounted() {
        this.listarProductos(1,this.buscar,this.criterio);
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

