<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Empleados</h5>
            </div>
            <div class="right form ">
                <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('empleados','registrar')">
                    Agregar Empleados
                </button>
            </div>

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
                            <input id="first_name" type="text" v-model="first_name" placeholder="Nombre"  class="validate" >  
                            <input id="last_name" type="text" v-model="last_name" placeholder="Apellidos " class="validate">
                            <input id="phone" type="text" v-model="city" placeholder="Telefono" class="validate">
                            <input type="date" class="datepicker" v-model="birth_date" placeholder="Fecha de nacimiento" >
                            <select name="LeaveType" class="browser-default" v-model="gender">
                                <option value="" disabled selected>Selecciona el genero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select> 
                            <input id="city" type="text" v-model="city" placeholder="Ciudad" class="validate">
                            <input id="state" type="text" v-model="state" placeholder="Estado" class="validate">
                            <input id="street" type="text" v-model="street" placeholder="Calle" class="validate">
                            <input id="postal_code" type="text" v-model="postal_code" placeholder="Codigo Postal" class="validate">
                            <input id="suburb" type="text" v-model="suburb" placeholder="Suburbios" class="validate">
                            <input id="reference" type="text" v-model="reference" placeholder="Referencia" class="validate">
                            <select name="LeaveType" class="browser-default" v-model="id_role">
                                <option value="" disabled selected>Selecciona el Rol del empleado</option>
                                <option v-for="role in arrayRole" :value="role.PK_roles"  :key="role.PK_roles">{{ role.name }}</option>
                            </select> 
                            <input id="email" type="text" v-model="email" placeholder="Email" class="validate">
                            <input id="email_verified_at" type="text" v-model="email_verified_at" placeholder="Verificacion de email" class="validate">
                            <input id="password" type="text" v-model="password" placeholder="Contraseña" class="validate">
                        </div> 
                        <div v-show="errorEmpleado" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorMostrarMsjEmpleado" :key="error" v-text="error">
                                </div>
                            </div>
                        </div>
                        <div class="button-container form formmodal-footer">
                            <button class="button-type" type="button" v-if="tipoAccion==1"  @click="nuevoEmpleado()">Guardar</button>
                            <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarEmpleado(PK_categories)">Actualizar</button>
                            <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>  

            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="hide-on-small-only">E-main</th>
                        <th class="hide-on-small-only">Puesto</th>
                        <th class="hide-on-small-only">Fecha de registro</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Desactivar/Activar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <!-- <tbody  v-for="categoria in arrayCategoria" :key="categoria.idCategoria">
                    <tr>
                        <td v-text="categoria.nombre"></td> 
                        <td class="hide-on-small-only"  v-text="categoria.nombreCaracteristica"></td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="categoria.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('empleados','actualizar',categoria,categoria.idCategoria)">create</i>
                        </td>
                        <td class="desactivarActivar">
                            <a href="#!" class="secondary-content" v-if="categoria.status == 1">
                                <i class="switch">
                                    <label><input type="checkbox" checked="checked" name="status" v-model="categoria.status" @click="desactivarEmpleado(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                            <a href="#!" class="secondary-content" v-if="categoria.status == 0">
                                <i class="switch">
                                    <label><input type="checkbox"  name="status" v-model="categoria.status" @click="activarEmpleado(categoria.idCategoria)"><span class="lever"></span></label>
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody> -->
            </table>
        </div>
    </main>
</template>
<script>
// import categorias from './Categorias.vue'
import Swal from 'sweetalert2';
var currYear = (new Date()).getFullYear();

$(document).ready(function() {
  $(".datepicker").datepicker({
    defaultDate: new Date(currYear-5,1,31),
    // setDefaultDate: new Date(2000,01,31),
    maxDate: new Date(currYear-5,12,31),
    yearRange: [1928, currYear-5],
    format: "yyyy/mm/dd"    
  });
});


export default {
    data() {
        return {
            id: 0,
            first_name: '',
            last_name:'',
            phone:'',
            birth_date:'',
            gender:'', 
            city:'',
            street:'',
            postal_code:'',
            suburb:'',
            reference:'',
            is_default:true,
            state:'',
            id_role:0,
            arrayRole:[],
            email:'',
            email_verified_at:'',
            password:'',
            status : true,
            modal : 0,
            tituloModal : 'Registrar Empleado',
            cambio : 0,
            tipoAccion: 0,
            errorEmpleado : 0,
            errorMostrarMsjEmpleado : []
        }
    },
    methods:{
        listarEmpleado(){
            let m=this;
            axios.get('/user').then(function (response){
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
                case "empleados":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.name = '';
                            m.descripcion = '';
                            m.image= 'Selecciona imagen';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar Empleado';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.PK_categories = data['PK_categories'];
                            m.tipoAccion = 2;
                            m.image=data['image'];
                            m.name=data['name'];
                            m.description=data['description'];
                            m.tituloModal = 'Actualizar Empleado';
                        }
                    }
                }
            }
        }, 
        nuevoEmpleado(){
            // if (this.validarCategoria()){
            //     return;
            // }
            let me = this;
 
            let formData = new FormData();

            formData.append('file', me.file);
            formData.append('PK_categories', me.PK_categories);
            formData.append('name', me.name);
            formData.append('description', me.description);
            
            // Registramos la informacion
            let url = '/user/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
                this.listarEmpleado();
                this.cerrarModal();
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        validarCategoria(){
            
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.first_name = '';
            this.last_name = '';
            this.phone = '';
            this.birth_date = '';
            this.gender = '';
            this.city = '';
            this.street = '';
            this.postal_code = '';
            this.suburb = '';
            this.reference = '';
            this.state = '';
            this.id_role = 0;
            this.email = '';
            this.email_verified_at = '';
            this.password = '';
            this.tipoAccion = 0;
            this.errorEmpleado = 0;
            this.errorMostrarMsjEmpleado = [];
        },
        actualizarEmpleado(PK_categories){
            if (this.validarCategoria()){
                return;
            }
                let me = this;
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
                    me.listarEmpleado();
                    me.cerrarModal();
                    me.limpiar();                    
                })
                .catch(function (error) {
                    console.log(error);
                });      
        },
        desactivarEmpleado(PK_categories){
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
                        me.listarEmpleado();
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
                        me.listarEmpleado();
                    }
            })
        },
        activarEmpleado(PK_categories){
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
                    me.listarEmpleado();
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
                        me.listarEmpleado();                    
            }
            }) 
                
        },
        verSelects(){
            let me=this;
            me.listado=2;
            //Obtener los datos del ingreso de sub categorias
            var url= '/rol';
            axios.get(url).then(function (response) {
                var arrayRole= response.data;
                me.arrayRole = arrayRole.map(object => ({PK_roles: object.PK_roles, name: object.roles_name})); 
            })
            .catch(function (error) {
                console.log(error);
            });
        },
    },
    mounted() {
        this.listarEmpleado();
        this.verSelects();
    },
    computed: {
      firstDayOfAWeek: {
        get () {
          return this.$material.locale.firstDayOfAWeek
        },
        set (val) {
          this.$material.locale.firstDayOfAWeek = val
        }
      },
      dateFormat: {
        get () {
          return this.$material.locale.dateFormat
        },
        set (val) {
          this.$material.locale.dateFormat = val
        }
      }
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