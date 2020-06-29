<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Empleados</h5>
            </div>
            <div class="right form ">
                <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('empleados','registrar')">
                    Agregar empleados
                </button>
            </div>

            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg " role="document">
                    <div class = "container">
                        <br>
                        <div class="center">
                            <h3 v-text="tituloModal"></h3>
                        </div>
                        <div class="form-group row">
                            <input id="first_name" type="text" v-model="first_name" placeholder="Nombre"  class="validate" >  
                            <input id="last_name" type="text" v-model="last_name" placeholder="Apellidos " class="validate">
                            <input id="phone" type="text" v-model="phone" placeholder="Telefono" class="validate">
                            <input type="date" class="datepicker" v-model="birth_date" placeholder="Fecha de nacimiento" >
                            <select name="LeaveType" class="browser-default" v-model="gender">
                                <option value="" disabled selected>Selecciona el genero</option>
                                <option value="0">Masculino</option>
                                <option value="1">Femenino</option>
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
                            <button class="button-type" type="button" v-if="tipoAccion==2" @click="actualizarEmpleado(id)">Actualizar</button>
                            <button class="button-type" type="button" @click="cerrarModal()">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>  

            <table class="tabla centered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="hide-on-small-only">E-mail</th>
                        <th class="hide-on-small-only">Puesto</th>
                        <th class="hide-on-small-only">Fecha de registro</th>
                        <th class="hide-on-small-only">Status</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody  v-for="user in arryUser" :key="user.id">
                    <tr>
                        <td v-text="user.first_name+space+ user.last_name "></td> 
                        <td class="hide-on-small-only"  v-text="user.email"></td>
                        <td class="hide-on-small-only"  v-text="user.gender"></td>
                        <td class="hide-on-small-only"  v-text="user.join_ate"></td>
                        <td class="hide-on-small-only"  v-if="user.status == 1">Activado</td>
                        <td class="hide-on-small-only"  v-if="user.status == 0">Desactivado</td>
                        <td>
                            <i class="material-icons color-text " @click="abrirModal('empleados','actualizar',user,user.id)">create</i>
                        </td>
                        <td>
                            <i class="material-icons color-text " @click="eliminarEmpleado(user.id)">delete</i>

                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';
var currYear = (new Date()).getFullYear();

$('.datepicker').datepicker({
  selectMonths: true,
  selectYears: 15
});


export default {
    data() {
        return {
            arryUser:[],
            id: 0,
            space:" ",
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
            id_person:0,
            PK_persons:0,
            email_verified_at:'',
            password:'',
            join_ate:'',
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
                m.arryUser = response.data;
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
                case "empleados":{
                    switch(accion){
                        case 'registrar':{
                            m.modal = 1;
                            m.first_name = '';
                            m.last_name = '';
                            m.phone = '';
                            m.birth_date = '';
                            m.gender= 'Selecciona el genero';
                            m.street = '';
                            m.postal_code = '';
                            m.suburb = '';
                            m.reference = '',
                            m.state = '';
                            m.roles_name = 'Seleccione el rol';
                            m.tipoAccion = 1;
                            m.tituloModal = 'Registrar empleado';
                            break;

                        }
                        case 'actualizar':{
                            m.modal = 2;
                            m.id = data['id'];
                            m.PK_persons=data['PK_persons'];
                            m.tipoAccion = 2;
                            m.tituloModal = 'Actualizar empleado';
                            m.first_name=data['first_name'];
                            m.last_name=data['last_name'];
                            m.phone=data['phone'];
                            m.birth_date=data['birth_date'];
                            m.gender=data['gender'];
                            m.email=data['email'];
                            m.id_person='';
                            m.id_role=0;
                            m.city=data['city'];
                            m.postal_code=data['postal_code'];
                            m.reference=data['reference'];
                            m.street=data['street']; 
                        }
                    }
                }
            }
        },
        nuevoEmpleado(){ 
             if (this.validarEmpleado()){
                return;
            }
            let me = this;
            let formData = new FormData();
        
            formData.append('first_name', me.first_name); 
            formData.append('last_name', me.last_name);   
            formData.append('phone', me.phone);    
            formData.append('birth_date', me.birth_date);            
            formData.append('gender', me.gender);
            formData.append('city', me.city);       
            formData.append('state', me.state);     
            formData.append('street', me.street);            
            formData.append('postal_code', me.postal_code);            
            formData.append('suburb', me.suburb);
            formData.append('reference', me.reference);
            formData.append('id_role', me.id_role);
            formData.append('email', me.email);
            formData.append('email_verified_at', me.email_verified_at);
            formData.append('password', me.password);
            
            // Registramos la informacion
            let url = '/user/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
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
        validarEmpleado(){
            
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.Empleado = '';
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
       } ,
        actualizarEmpleado(id){
            if (this.validarEmpleado()){
                return;
            }
                let me = this;
            let formData = new FormData();
        
            formData.append('first_name', me.first_name); 
            formData.append('id', id); 
            formData.append('PK_persons', me.PK_persons); 

            formData.append('last_name', me.last_name);   
            formData.append('phone', me.phone);    
            formData.append('birth_date', me.birth_date);            
            formData.append('gender', me.gender);
            formData.append('city', me.city);            
            formData.append('street', me.street);            
            formData.append('postal_code', me.postal_code);            
            formData.append('suburb', me.suburb);
            formData.append('reference', me.reference);
            formData.append('id_role', me.id_role);
            formData.append('email', me.email);
            formData.append('email_verified_at', me.email_verified_at);
            formData.append('password', me.password);
            

                //Registramos la informacion
                axios.post('/user/actualizar',formData,{
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
        eliminarEmpleado(id_user){
          let me = this;

            Swal.fire({
            title: '¿Está seguro de eliminar este empleado?',
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
                axios.put('/user/desactivar',{
                    'id': id_user
                }).then(function (response) {
                    me.listarEmpleado();
                    Swal.fire(
                        'Eliminado!',
                        'El empleado ha sido eliminado con éxito.',
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
    },mounted() {
        this.listarEmpleado();
        this.verSelects();
    },
    computed: {
      firstDayOfAWeek: {
        get () {
          return this.$material.locale.firstDayOfAWeek
        },
        set (val) {
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