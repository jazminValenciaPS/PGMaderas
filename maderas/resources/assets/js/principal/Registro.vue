<template>
    <main class="main-index">
        <br>
        <h4 class="mt-0 color-main">Registro de Usuario</h4>
        <!-- Container -->
        <div class="row">
            <!-- Sign In -->
            <div class="col m6 s12 p-0">
                <p>¿No tienes cuenta?<br>Crea una cuenta facilmente obteniendo estos beneficios especiales:</p>
                <p>
                    Realiza tus comrpas en línea
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Revisa el estatus de tus órdenes
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Consulta tu historial de compras
                    <i class="material-icons left color-main">check</i>
                </p>
                <p>
                    Vuelve a comprar tus órdenes anteriores
                    <i class="material-icons left color-main">check</i>
                </p> 
                <p>
                    Recibe promociones y boletines especializados
                    <i class="material-icons left color-main">check</i>
                </p>
                    
            </div>

            <!-- Sign Up -->


            <div class="col m6 s12 p-0">
                <div class="input-field col m12 s12 mb-0">
                    <input id="firstname" v-model="first_name" type="text" required>
                    <label for="firstname">Nombre(s)</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="lastname" type="text" v-model="last_name" required>
                    <label for="lastname">Apellido(s)</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input type="text" class="datepicker" v-model="birth_date" placeholder="Fecha de nacimiento" >
                    <div class="input-field col s6">                          
                        <select name="LeaveType" class="browser-default" v-model="gender">
                            <option value="0" disabled selected>Selecciona el genero</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select> 
                    </div>
                    <div class="input-field col m6 s12 mb-0">
                        <input id="suburb" type="text" v-model="suburb" required>
                        <label for="suburb">Colonia</label>
                    </div>   
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="state" type="text" v-model="state" required>
                    <label for="state">Estado</label>
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="city" type="text" v-model="city" required>
                    <label for="city">Ciudad</label>
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="cp" type="text" v-model="postal_code" required>
                    <label for="cp">Código Postal</label>
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="street" type="text" v-model="street" required>
                    <label for="street">Calle</label>
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="ext_number" type="text" v-model="outdoorNumber" required>
                    <label for="ext_number">Nº Exterior</label>
                </div>
                <div class="input-field col m6 s12 mb-0">
                    <input id="rfc" type="text" required>
                    <label for="rfc">RFC</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <textarea id="references" class="materialize-textarea" v-model="reference"></textarea>
                    <label for="references">Referencias</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="phone" type="text" v-model="phone" required>
                    <label for="phone">Teléfono/Celular</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="email" type="text" v-model="email" required>
                    <label for="email">Correo</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="email_repeat" type="text" v-model="emailRepeat" required>
                    <label for="email_repeat">Repetir Correo</label>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="pasword" type="password" v-model="password" required>
                    <label for="pasword">Contraseña</label>
                </div>
                <div v-show="errorCliente" class="form-group row div-error">
                    <div class="text-center text-error">
                        <div v-for="error in errorMostrarMsjCliente" :key="error" v-text="error">
                        </div>
                    </div>
                </div>
                <div class="input-field col m12 s12 mb-0">
                    <input id="pasword_repeat" type="password" v-model="passwordRepeat" required>
                    <label for="pasword_repeat">Repetir Contraseña</label>
                </div>
                <div class="col m12 s12">
                    <button type="submit" @click="registroUsuario()" class="btn bg-main mt-2 mb-2">Registrarme</button>
                    <a class="btn green lighten-2 mt-2 mb-2" href="/iniciar-sesion">Cancelar</a>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
 export default {
    data(){
        return{
          id:'',
          first_name:'',
          last_name:'',
          outdoorNumber:'',
          gender:'',
          passwordRepeat:'',
          password:'',
          emailRepeat:'',
          email:'',
          phone:'',
          birth_date:'',
          city:'',
          state:'',
          suburb:'',
          street:'',
          postal_code:'',
          reference:'',
          errorCliente : 0,
          errorMostrarMsjCliente : [],
        }
    },
    methods:{
        registroUsuario(){
            let me = this;
            let formData = new FormData();
            let url = '/user/registrarC';
            
            if (this.validarCliente()){
                return;
            }
            
            formData.append('first_name', me.first_name); 
            formData.append('last_name', me.last_name);   
            formData.append('phone', me.phone);    
            formData.append('birth_date', me.birth_date);            
            formData.append('gender', me.gender);
            formData.append('city', me.city); 
            formData.append('suburb', me.suburb);       

            formData.append('state', me.state);     
            formData.append('street', me.street);            
            formData.append('postal_code', me.postal_code);            
            formData.append('outdoorNumber', me.outdoorNumber);
            formData.append('reference', me.reference);
            formData.append('email', me.email);
            formData.append('password', me.password);
            // formData.append('RFC', me.RFC);
            
            // Registramos la informacion
            axios.post(url, formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    
                }
            })
            .then(function (response) {
              location.href ="\iniciar-sesion";
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        validarCliente(){
            this.errorCliente = 0;
            this.errorMostrarMsjCliente = [];
            if (this.email != this.emailRepeat) this.errorMostrarMsjCliente.push("Los correos tienen que ser iguales");
            if (this.password != this.passwordRepeat) this.errorMostrarMsjCliente.push("La contraseña tiene que ser la misma");
            if(isNaN(this.phone))this.errorMostrarMsjCliente.push("El teléfono debe ser numérico.");
            if (this.errorMostrarMsjCliente.length) this.errorCliente = 1;
            return this.errorCliente;
        }

    },
    mounted() {
        this.gender=0;
    }
 }
</script>

