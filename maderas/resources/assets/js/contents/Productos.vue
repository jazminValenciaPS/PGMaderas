<template>
    <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class="title">
                <h5>Productos</h5>
            </div>
            <div class="right form ">
                <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('productos','registrar')">
                    Agregar Productos
                </button>
            </div>
            <!-- MODAL INICIO -->
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
                            <input id="nombre" type="text" v-model="name" placeholder="Nombre Producto"  class="validate" >
                            <!-- <label  for="nombre">Nombre</label> -->
                            <br>  
                            <select name="LeaveType" class="browser-default" v-model="id_subcategory">
                                <option value="" disabled selected>Selecciona la Subcategoría</option>
                                <option v-for="sub in arraySubcategorias" :value="sub.PK_subcategories"  :key="sub.PK_subcategories">{{ sub.name }}</option>
                            </select> 
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
                            <!-- input para precio -->
                            <input id="nombre" type="text" v-model="name" placeholder="precio del producto"  class="validate" >
                            <select name="LeaveType" class="browser-default" v-model="id_subcategory">
                                <option value="" disabled selected>Disponibilidad del producto</option>
                                <option v-for="items in avaible">{{ items }}</option>
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
                            <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarCategoria(PK_categories)">Actualizar</button>
                            <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>  
            <!-- MODAL FIN -->
            <table class="tabla centered">
                <thead>
                    <tr>
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
                        <td v-text="producto.name"></td> 
                        <td class="hide-on-small-only"  v-text="producto.subcategoria"></td>
                        <td class="hide-on-small-only"  v-text="producto.description"></td>
                        <td class="hide-on-small-only"  v-text="producto.image"></td>
                        <td class="hide-on-small-only"  v-text="producto.price"></td>
                        <td class="hide-on-small-only"  v-if="producto.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="producto.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('Categoria','actualizar',producto,producto.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="producto.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="producto.status" @click="desactivarCategoria(producto.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="producto.status" @click="activarCategoria(producto.idCategoria)"><span class="lever"></span></label>
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
export default {
    data(){
        return{
            PK_products:'',
            id_subcategory: '',
            name: '',
            subcategoria: '',
            description: '',
            image: '',
            price: '',
            status: true,
            avaible: 1000,
            arrayProductos: [],
            arraySubcategorias: [],
            tituloModal : 'Registrar Productos' ,
            modal: 0,
            tipoAccion: 0,
            errorProducto : 0,
            errorMostrarMsjProducto : []
        }
    },
    methods:{
        listarProductos(){
            let m=this;
            axios.get('/producto').then(function (response){
                m.arrayProductos = response.data;
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
                case "productos":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            m.description = '';
                            m.price = 0,
                            m.image= 'Selecciona imagen';
                            m.avaible = '';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar Producto';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_products = data['PK_products'];
                            m.tipoAccion = 2;
                            m.imagen=data['image'];
                            m.name=data['name'];
                            m.avaible =data['avaible'];
                            m.description=data['description'];
                            m.price = data['price']
                            m.tituloModal = 'Actualizar Producto';
                        }
                    }
                }
            }
        },
        nuevoProducto(){
            if (this.validarCategoria()){
                return;
            }
            let me = this;
 
            let formData = new FormData();

            formData.append('file', me.file);
            formData.append('name', me.name);
            formData.append('id_subcategory', me.id_subcategory);
            formData.append('description', me.description);
            formData.append('price', me.price);
            formData.append('avaible', me.avaible);
            
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
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },

    },
    mounted() {
        this.listarProductos();
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

