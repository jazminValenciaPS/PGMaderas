<template>
     <main class="row hero">
        <div class="col s12 m12 gl6">
            <div class=" title">
                <h5>Empleados</h5>
            </div>
           

            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg " role="document">
                    <div class = "container">
                        <br>
                        <div class="center">
                            <h3 v-text="tituloModal"></h3>
                        </div>
                        <div class="form-group row">
                            
                            <div class="input-field col s6">
                                <input id="first_name" type="text" v-model="first_name" placeholder="Nombre"  class="validate" >  
                            </div>

                            <div class="input-field col s6">
                              <input id="last_name" type="text" v-model="last_name" placeholder="Apellidos " class="validate">
                            </div>

                            <div class="input-field col s6">                           
                            <input id="phone" type="text" v-model="phone" placeholder="Telefono" class="validate">
                            </div>

                            <div class="input-field col s6">                           
                            <input id="email" type="text" v-model="email" placeholder="Email" class="validate">
                            </div>
                            
                            <div class="input-field col s6">                           
                                <input type="date" class="datepicker" v-model="birth_date" placeholder="Fecha de nacimiento" >
                            </div>
                                <div class="input-field col s6">                           
                                <input type="password" class="text" v-model="password" placeholder="Contraseña" >
                            </div>
                          
                            <div class="input-field col s6">                          
                                <select name="LeaveType" class="browser-default" v-model="gender">
                                    <option value="0" disabled selected>Selecciona el genero</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select> 
                            </div>

                            <div class="input-field col s6">                           
 
                            <select name="LeaveType" class="browser-default" v-model="id_role">
                                <option value="" disabled selected>Selecciona el Rol del empleado</option>
                                <option v-for="role in arrayRole" :value="role.PK_roles"  :key="role.PK_roles">{{ role.name }}</option>
                            </select> 
                            </div>

                            <!-- <div class="input-field col s6">                           
                            <input id="city" type="text" v-model="city" placeholder="Ciudad" class="validate">
                            </div>
                            <div class="input-field col s6">                           
                            
                            <input id="state" type="text" v-model="state" placeholder="Estado" class="validate">
                            </div>

                            <div class="input-field col s12">                                                      
                            <input id="street" type="text" v-model="street" placeholder="Calle" class="validate">
                            </div>

                            <div class="input-field col s6">                           
                           
                            <input id="postal_code" type="text" v-model="postal_code" placeholder="Codigo Postal" class="validate">
                            </div>
                            <div class="input-field col s6">                           
                           
                            <input id="suburb" type="text" v-model="suburb" placeholder="Suburbios" class="validate">
                            </div>
                            <div class="input-field col s12">                           
                            
                            <input id="reference" type="text" v-model="reference" placeholder="Referencia" class="validate">
                            </div>
                            -->

                         
                          

                        <div v-show="errorEmpleado" class="form-group row div-error">
                            <div class="text-center text-error">
                                <div v-for="error in errorMostrarMsjEmpleado" :key="error" v-text="error">
                                </div>
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


          <div class="row">
              <br>
                <div class="form-group center">
                    <div class="col l12 buscarC">
                            <div class="input-field col s2">

                            <select name="LeaveType" class="browser-default" v-model="criterio">
                                 <option value="" disabled selected>Selecciona con que buscar</option>
                                 <option value="email">Email</option>
                                 <!-- <option value="SKU">SKU</option> -->
                             </select>   
                        </div>
                            
                            <div class="input-field col s4">

                            <input type="text" v-model="buscar" @keyup.enter="listarEmpleado(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                        </div>
                           
                            <div class="input-field col s3">
                            
                            <button type="submit" @click="listarEmpleado(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                         <div class=" form input-field col s3">
                            <button type="summit" data-target="modal1" class="modal-trigger" @click="abrirModal('empleados','registrar')">
                                Agregar empleados
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <table class="tabla centered highlight">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th class="hide-on-small-only">Email</th>
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
                        <td class="hide-on-small-only"  v-text="user.roles_name"></td>
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
            PK_roles:0,
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
            errorMostrarMsjEmpleado : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
            offset : 3,
            criterio : 'email',
            buscar:''
        }
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
      },
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
        listarEmpleado(page,buscar,criterio){
            let m=this;
            var url='/user?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arryUser = respuesta.user.data;

                // m.status = response.status.data;
                // if(status == true){
                //     status = 1
                // }else{
                //     status = 0
                // }
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
            me.listarEmpleado(page,buscar,criterio);
        },
        limpiar(){
           let me = this;
            me.errors.clear('new');
            me.errors.clear('update');
            me.first_name = '';
            me.tipoAccion = 0;
            me.Cambio = 0;
            me.title='';
            me.last_name='';
            me.phone='';
            me.email='';
            me.gender='';
            me.description='';
            $("#file").val("");
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
                            m.gender= 2;
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
                            m.id_role=data['PK_roles'];

                            // m.state=data['state'];
                            // m.suburb=data['suburb'];
                            // m.city=data['city'];
                            // m.postal_code=data['postal_code'];
                            // m.reference=data['reference'];
                            // m.street=data['street']; 
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
            // formData.append('city', me.city);       
            // formData.append('state', me.state);     
            // formData.append('street', me.street);            
            // formData.append('postal_code', me.postal_code);            
            // formData.append('suburb', me.suburb);
            // formData.append('reference', me.reference);
            formData.append('id_role', me.id_role);
            formData.append('email', me.email);
            // formData.append('email_verified_at', me.email_verified_at);
            formData.append('password', me.password);
            
            // Registramos la informacion
            let url = '/user/registrar';
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
                me.listarEmpleado(1,'','name');
                me.cerrarModal();
                me.limpiar();
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        validarEmpleado(){
            this.errorEmpleado = 0;
            this.errorMostrarMsjEmpleado = [];

                if (!this.first_name) this.errorMostrarMsjEmpleado.push("El nombre del empleado no puede estar vacío.");
                if (!this.last_name) this.errorMostrarMsjEmpleado.push("El apellido del empleado no puede estar vacío.");
                if (!this.phone) this.errorMostrarMsjEmpleado.push("Se tiene que ingresar un número de teléfono.");
                if (!this.email) this.errorMostrarMsjEmpleado.push("Tiene que ingresar un correo.");
                if (!this.birth_date) this.errorMostrarMsjEmpleado.push("Seleccione la fecha de nacimiento.");
                if (!this.gender) this.errorMostrarMsjEmpleado.push("Seleccione el género del empleado.");
                if (!this.id_role) this.errorMostrarMsjEmpleado.push("Seleccione el rol del empleado.");
                // if (!this.city) this.errorMostrarMsjEmpleado.push("Ingrese la ciudad del empleado.");
                // if (!this.state) this.errorMostrarMsjEmpleado.push("Ingrese el estado del empleado.");
                // if (!this.street) this.errorMostrarMsjEmpleado.push("Ingrese la calle del empleado.");
                // if (!this.state) this.errorMostrarMsjEmpleado.push("Ingrese el estado del empleado.");
                // if (!this.postal_code) this.errorMostrarMsjEmpleado.push("Ingrese el código postal del empleado.");
                // if (!this.suburb) this.errorMostrarMsjEmpleado.push("Ingrese suburbios del empleado.");



                if(isNaN(this.phone))this.errorMostrarMsjEmpleado.push("El teléfono debe ser numérico.");


                if (this.errorMostrarMsjEmpleado.length) this.errorEmpleado = 1;
                return this.errorEmpleado;
        },
        cerrarModal(){
            this.modal = 0;
            this.tituloModal = '';
            this.Empleado = '';
            this.last_name = '';
            this.phone = '';
            this.birth_date = '';
            this.gender = 2;
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
                    me.listarEmpleado(1,'','name');
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
                    me.listarEmpleado(1,'','name');
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
                        me.listarEmpleado(1,'','name');                    
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
        this.listarEmpleado(1,this.buscar,this.criterio);
        this.verSelects();
    },
   
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