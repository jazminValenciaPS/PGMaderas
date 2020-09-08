<template>
    <main class="main-index">
        <nav class="espace-top white">
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="/" class="breadcrumb">Inicio</a>
                    <a href="#" class="breadcrumb">Mi Cuenta</a>
                </div>
            </div>
        </nav>
        <h4 class="mt-0 color-main center" v-if="informacion==1">Mi Cuenta</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==2">Editar perfil</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==3">Tarjetas</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==4">Pedidos</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==5">Cambio de contraseña</h4>  

        <!-- Container -->
        <div class="row">
            <!-- Navigation -->
            <div class="col m3 s12">
                <ul class="collection">
                    <li class="collection-item">
                        <h6>Configuración</h6>
                        <a  @click="listarDatos(email)">Datos personales</a>
                        <a @click="listarTarjetas()" >Mis Tarjetas</a>
                        <a  @click="informacion=5">Cambiar Contraseña</a>
                    </li>
                    <li class="collection-item">
                        <h6><a @click="listarPedidos()" >Mis Pedidos</a></h6>
                    </li>
                    <li class="collection-item">
                       <h6> <a href="#" @click.prevent="logout">Cerrar sesión</a></h6>
                    </li>
                </ul>
            </div>

            <!-- Información personal -->
            <div  v-for="cliente in arrayDatos" :key="cliente.PK_persons" v-if="informacion==1" class="col m9 s12" >
                <div class="col m12 s12 py-1">
                    <span class="col m2 s4 bold">Nombre(s):</span>
                    <span class="col m10 s8">{{cliente.first_name}}</span>
                </div>
                <div class="col m12 s12 py-1">
                    <span class="col m2 s4 bold">Apellido(s):</span>
                    <span class="col m10 80">{{cliente.last_name}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Nacimiento:</span>
                    <span class="col m8 s8">{{cliente.birth_date}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Género:</span>
                    <span class="col m8 s8" v-if="cliente.gender==1">Masculino</span>
                    <span class="col m8 s8" v-if="cliente.gender==2">Femenino</span>

                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Estado:</span>
                    <span class="col m8 s8">{{cliente.state}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Ciudad:</span>
                    <span class="col m8 s8">{{cliente.city}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Código Postal:</span>
                    <span class="col m8 s8">{{cliente.postal_code}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Calle:</span>
                    <span class="col m8 s8">{{cliente.street}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Nº Exterior:</span>
                    <span class="col m8 s8">{{cliente.outdoorNumber}}</span>
                </div>
            
                <div class="col m12 s12 py-1">
                    <span class="col m2 s4 bold">Referencias:</span>
                    <span class="col m10 s8">{{cliente.reference}}
                        </span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">RFC:</span>
                    <span class="col m8 s8">{{cliente.RFC}}</span>
                </div>
                <div class="col m6 s12 py-1">
                    <span class="col m4 s4 bold">Teléfono:</span>
                    <span class="col m8 s8">{{cliente.phone}}</span>
                </div>
                <div class="col m12 s12 py-1">
                    <span class="col m2 s4 bold">Correo:</span>
                    <span class="col m10 s8">{{cliente.email}}</span>
                </div>
                <div class="col m12 s12">
                    <a class="btn bg-main mt-2 mb-2" @click="editarDatos(cliente)" >Editar</a>
                </div>
            </div>

            <!-- Información personal editable -->               
            <div  class="col m9 s12" v-if="informacion==2">
                <div class="input-field col m6 s6 mb-0">
                    <input id="firstname" type="text" required v-model="first_name" autofocus>
                    <!-- <label for="firstname">Nombre(s)</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="lastname" type="text" required v-model="last_name" autofocus>
                    <!-- <label for="lastname">Apellido(s)</label> -->
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="fecha" type="date" class="datepicker col m6 s12" placeholder="Nacimiento" v-model="birth_date">
                    <div class="col m6 s12 py-1">
                        <select name="LeaveType" class="browser-default" v-model="gender">
                            <option value="0" disabled selected>Selecciona el genero</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select> 
                    </div>
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="state" type="text" required v-model="state" autofocus>
                    <!-- <label for="state">Estado</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="city" type="text" required v-model="city" autofocus>
                    <!-- <label for="city">Ciudad</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="cp" type="text" required v-model="postal_code" autofocus>
                    <!-- <label for="cp">Código Postal</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="street" type="text" required v-model="street" autofocus>
                    <!-- <label for="street">Calle</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="ext_number" type="text" required v-model="outdoorNumber" autofocus>
                    <!-- <label for="ext_number">Nº Exterior</label> -->
                </div>
                <div class="input-field col m6 s6 mb-0">
                    <input id="rfc" type="text" required v-model="RFC" autofocus placeholder="RFC">
                    <!-- <label for="rfc">RFC</label> -->
                </div>
                <div class="input-field col m12 s6 mb-0">
                    <textarea id="references" class="materialize-textarea" v-model="reference" autofocus></textarea>
                    <!-- <label for="references">Referencias</label> -->
                </div>
            
                <div class="input-field col m12 s6 mb-0">
                    <input id="phone" type="text" required v-model="phone" autofocus>
                    <!-- <label for="phone">Teléfono/Celular</label> -->
                </div>
                <div v-show="errorCliente" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjCliente" :key="error" v-text="error">
                        </div>
                    </div>
                </div>
                <div class="col m12 s12">
                    <a class="btn bg-main mt-2 mb-2" @click="actualizatDatos()">Guardar</a>
                    <a class="btn green lighten-2 mt-2 mb-2" href="#" @click="informacion=1">Cancelar</a>
                </div>
            </div>

            <!-- Debit/Credit Cards -->
            <div class="col m9 s12" v-if="informacion==3">
                <div class="text-right mb-2">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <!-- <ul class="collection">
                    <li class="collection-item">
                        <div>
                            XXXX-XXXX-XXXX-1234
                            <a href="#!" class="secondary-content"><i class="material-icons red-text shadow">delete</i></a>
                            <a href="#!" class="secondary-content"><i class="material-icons yellow-text shadow">edit</i></a>
                        </div>
                    </li>
                    <li class="collection-item">
                        <div>
                            XXXX-XXXX-XXXX-5678
                            <a href="#!" class="secondary-content"><i class="material-icons red-text shadow">delete</i></a>
                            <a href="#!" class="secondary-content"><i class="material-icons yellow-text shadow">edit</i></a>
                        </div>
                    </li>
                </ul> -->

                <h6 class="center">Aún no tienes tarjetas registradas :(</h6>
            </div>

            <!-- Orders Details -->
            <div class="col m9 s12" v-if="informacion==4">
                <table>
                    <tbody v-for="pedidos in arrayPedidos" :key="pedidos.id">
                        <tr class="border">
                            <td># {{pedidos.PK_orders}}</td>
                            <td>{{pedidos.date}}</td>
                            <td>{{pedidos.status_name}}</td>
                            <td>${{pedid}}</td>
                        </tr>
                        <tr class="border">
                            <td colspan="4">
                                <div class="col m12 s12 p-0">
                                    <span class="col m3 s3">Producto</span>
                                    <span class="col m3 s3">1</span>
                                    <span class="col m3 s3">$798</span>
                                    <span class="col m3 s3">$798</span>
                                    <span class="col m12 s12 mt-2 bold">Dirección de Entrega:</span>
                                    <p class="col m12 s12 mt-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatem consequuntur voluptatibus iure optio quisquam mollitia, ab illum tempora recusandae nobis sunt et inventore facilis omnis pariatur dolorem iusto fuga aliquam!</p>
                                    <div class="col m12 s12 right">
                                        <span class="col m3 s3 offset-m6 bold">Total:</span>
                                        <span class="col m3 s3">$798</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <h6 v-if="arrayPedidos == '' " class="center">Aún no tienes pedidos realizados :(</h6>
            </div>
            <!-- Cambiar contraseña -->                
            <div class="col m9 s12" v-if="informacion==5">
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input id="correo"  disabled type="text" v-model="email" class="validate" >
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input id="password" type="password" v-model="password" class="validate" >
                    <label  for="password">Contraseña</label>
                </div>
                <div class="input-field"> 
                    <i class="material-icons prefix">lock</i>
                    <input id="passwordConfirm" type="password" v-model="passwordConfirm" class="validate" >
                    <label  for="passwordConfirm">Confirmar contraseña</label>
                </div>

                <div v-show="errorContra" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjContra" :key="error" v-text="error">
                        </div>
                    </div>
                </div>
                <br>
                <div class="center">
                    <a class="waves-effect btn color" @click="limpiar()">Limpiar</a>
                    <a class="waves-effect btn color" @click="nuevaContra()">Actualizar</a>
                </div>
            </div>               
        </div>
    </main>
</template>
<script>
import Swal from 'sweetalert2';


export default {
    data() {
        return {
            PK_persons: '',
            name: '',
            description:'', 
            informacion:1,
            status : true,
            arrayDatos:[],
            first_name: '',
            last_name:'',
            phone:'',
            birth_date:'',
            gender:'', 
            id:'',
            PK_addresses:'',
            city:'',
            street:'',
            postal_code:'',
            suburb:'',
            reference:'',
            state:'',
            outdoorNumber:'',
            RFC:'',
            password:'',
            passwordConfirm:'',
            email:'',
            errorCliente : 0,
            errorMostrarMsjCliente : [],
            errorContra:0,
            errorMostrarMsjContra:[],
            datos:[],
            arrayPedidos:[],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

        }
    },
    methods:{
        listarDatos(correo){
            let m=this;
            var url='/user/cliented/'+correo;
            m.informacion= 1;
            
            axios.get(url).then(function (response){
                 m.arrayDatos= response.data;
               
            })
            .catch(function(error){
                console.log(error);
            });      
        },
        editarDatos(datos = []){
            let m=this;
            m.informacion= 2;
            m.PK_persons=datos["PK_persons"];
            m.PK_addresses=datos["PK_addresses"];
            m.last_name=datos["last_name"];
            m.first_name=datos["first_name"];
            m.phone=datos["phone"];
            m.birth_date=datos["birth_date"];
            m.gender=datos["gender"];
            m.city=datos["city"];
            m.id=datos["id"];
            m.RFC=datos["RFC"];
            m.street=datos["street"];
            m.postal_code=datos["postal_code"];
            m.suburb=datos["suburb"];
            m.reference=datos["reference"];
            m.state=datos["state"];
            m.outdoorNumber=datos["outdoorNumber"];
            m.email=datos["email"];
        },
        actualizatDatos()
        {
            let me = this;
            let formData = new FormData();
            
            if (this.validarDatos()){
                return;
            }

            if(me.RFC != ""){
                formData.append('RFC', me.RFC);            
            }

            formData.append('first_name', me.first_name); 
            formData.append('id',me.id); 
            formData.append('PK_persons', me.PK_persons); 
            formData.append('PK_addresses', me.PK_addresses); 
            formData.append('last_name', me.last_name);   
            formData.append('phone', me.phone);    
            formData.append('birth_date', me.birth_date);            
            formData.append('gender', me.gender);
            formData.append('city', me.city); 
            formData.append('state', me.state); 
            formData.append('outdoorNumber', me.outdoorNumber);             
            formData.append('street', me.street);            
            formData.append('postal_code', me.postal_code);            
            formData.append('suburb', me.suburb);
            formData.append('reference', me.reference);
            
                //Registramos la informacion
            axios.post('/cliente/actualizar',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (response) {
                me.listarDatos();
            })
            .catch(function (error) {
                console.log(error);
            });      
        },
        validarDatos(){
            this.errorCliente = 0;
            this.errorMostrarMsjCliente = [];

            if (!this.first_name) this.errorMostrarMsjCliente.push("El nombre no puede estar vacío.");
            if (!this.last_name) this.errorMostrarMsjCliente.push("El apellido no puede estar vacío.");
            if (!this.phone) this.errorMostrarMsjCliente.push("Se tiene que ingresar un número de teléfono.");
            if (!this.birth_date) this.errorMostrarMsjCliente.push("Seleccione la fecha de nacimiento.");
            if (!this.gender) this.errorMostrarMsjCliente.push("Seleccione el género .");
            if (!this.city) this.errorMostrarMsjCliente.push("Ingrese la ciudad.");
            if (!this.state) this.errorMostrarMsjCliente.push("Ingrese el estado.");
            if (!this.street) this.errorMostrarMsjCliente.push("Ingrese la calle.");
            if (!this.state) this.errorMostrarMsjCliente.push("Ingrese el estado.");
            if (!this.postal_code) this.errorMostrarMsjCliente.push("Ingrese el código postal.");
            if (!this.suburb) this.errorMostrarMsjCliente.push("Ingrese la colonia .");
            if(isNaN(this.phone))this.errorMostrarMsjCliente.push("El teléfono debe ser numérico.");


            if (this.errorMostrarMsjCliente.length) this.errorCliente = 1;
            return this.errorCliente;
        },
        validarContra(){
            this.errorContra=0;
            this.errorMostrarMsjContra =[];
            if (!this.password) this.errorMostrarMsjContra.push("La contraseña no puede estar vacía.");
            if(this.password.length < 5 ) this.errorMostrarMsjContra.push('La contraseña debe de tener más de 5 carácteres');
            if(this.password != this.passwordConfirm)  this.errorMostrarMsjContra.push('Las contraseñas no coinciden');
            if (this.errorMostrarMsjContra.length) this.errorContra = 1;

            return this.errorContra;
        },
        nuevaContra() {
            let me = this;
            if (this.validarContra()){
                return;
            }

            
            Swal.fire({
            title: '¿Está seguro de actualizar la contraseña?',
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

                    let formData = new FormData();
                    formData.append('email', me.email);
                    formData.append('password', me.password);

                    //Registramos la informacion
                    axios.post('/password/actualizar', formData, {
                        
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(function (response) {
                        Swal.fire(
                            'Actualizada!',
                            'La contraseña ha sido actualizada con éxito.',
                            'success'
                        )
                        me.listarDatos();
                        me.password='';
                        me.passwordConfirm='';
                        me.email='';
                    }).catch(function (error) {
                        console.log(error);
                    });                    
                } else if  (
                        // Read more about handling dismissals
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                    
                } 
            });
        },
        listarTarjetas(){
            let m=this;
            m.informacion= 3;

             var url='/user/cliented/'+correo;
            m.informacion= 1;
            
            axios.get(url).then(function (response){
                 m.arrayDatos= response.data;
               
            })
            .catch(function(error){
                console.log(error);
            });

        },
        listarPedidos(){
            let m=this;
             m.informacion= 4;

                axios.get('/order/user?correo='+m.correo).then(function (response){
                m.arrayPedidos = response.data;
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
        logout(){
               axios.post('salir').then(response => {
                  if (response.status === 302 || 401) {
                      localStorage.removeItem("email");
                      window.location.href = '/iniciar-sesion';
                  }
                  else {
                    // throw error and go to catch block
                  }
                }).catch(error => {

              });
            },
    },
    mounted() {
        var correo = localStorage.getItem("email");
        let me = this;
        me.email=correo;
        this.listarDatos(correo);
    }
}
</script>