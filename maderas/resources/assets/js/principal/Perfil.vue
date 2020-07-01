<template>
       <main>
           <nav class="espace-top white">
            <div class="nav-wrapper">
              <div class="col s12">
                <a href="#!" class="breadcrumb">Inicio</a>
                <a href="#!" class="breadcrumb">Mi Cuenta</a>
              </div>
            </div>
          </nav>
        <h4 class="mt-0 color-main center">Mi Cuenta</h4>
        
        <!-- Container -->
        <div class="row">
                <!-- Navigation -->
                <div class="col m3 s12">
                    <ul class="collection">
                        <li class="collection-item">
                            <h6>Datos Personales</h6>
                            <a href="#!">Información Personal</a>
                            <a href="#!">Mis Tarjetas</a>
                            <a href="#!">Cambiar Contraseña</a>
                        </li>
                        <li class="collection-item">
                            <h6><a href="#!">Mis Pedidos</a></h6>
                        </li>
                    </ul>
                </div>

                <!-- Información personal -->
                <div class="col m9 s12">
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Nombre(s):</span>
                        <span class="col m10 s8">Melissa</span>
                    </div>
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Apellido(s):</span>
                        <span class="col m10 80">León</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Nacimiento:</span>
                        <span class="col m8 s8">12/12/9999</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Sexo:</span>
                        <span class="col m8 s8">Femenino</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Estado:</span>
                        <span class="col m8 s8">Sinaloa</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Ciudad:</span>
                        <span class="col m8 s8">Culiacán</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Código Postal:</span>
                        <span class="col m8 s8">80000</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Calle:</span>
                        <span class="col m8 s8">Av. Alvaro Obregón</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Nº Exterior:</span>
                        <span class="col m8 s8">000</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Nº Interior:</span>
                        <span class="col m8 s8">000</span>
                    </div>
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Referencias:</span>
                        <span class="col m10 s8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos amet impedit quaerat fugit similique rerum sunt, vitae praesentium, porro eum facere ullam est veniam molestiae dolores molestias quod libero quas?</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">RFC:</span>
                        <span class="col m8 s8">HASI698ASDLN1</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Teléfono:</span>
                        <span class="col m8 s8">6677123456</span>
                    </div>
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Correo:</span>
                        <span class="col m10 s8">correo@email.com</span>
                    </div>
                </div>

                <!-- Información personal editable -->               
                 <div class="col m9 s12" v-if="informacion==2">
                    <div class="input-field col m12 s12 mb-0">
                        <input id="firstname" type="text" required>
                        <label for="firstname">Nombre(s)</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                        <input id="lastname" type="text" required>
                        <label for="lastname">Apellido(s)</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                        <input type="text" class="datepicker col m6 s12" placeholder="Nacimiento">
                        <form action="#" class="col m6 s12">
                            <p>
                            <label class="col m6 s6">
                            <input class="with-gap" name="group1" type="radio"  />
                            <span class="pl-3">Femenino</span>
                            </label>
                           </p>
                            <p>
                            <label class="col m6 s6">
                                <input class="with-gap" name="group1" type="radio"  />
                                <span class="pl-3">Masculino</span>
                                </label>
                            </p>
                        </form>
                    </div>
                    <div class="input-field col m6 s12 mb-0">
                        <input id="state" type="text" required>
                       <label for="state">Estado</label>
                    </div>
                    <div class="input-field col m6 s12 mb-0">
                        <input id="city" type="text" required>
                        <label for="city">Ciudad</label>
                     </div>
                     <div class="input-field col m6 s12 mb-0">
                        <input id="cp" type="text" required>
                        <label for="cp">Código Postal</label>
                    </div>
                    <div class="input-field col m6 s12 mb-0">
                        <input id="street" type="text" required>
                        <label for="street">Calle</label>
                    </div>
                    <div class="input-field col m6 s12 mb-0">
                        <input id="ext_number" type="text" required>
                        <label for="ext_number">Nº Exterior</label>
                     </div>
                     <div class="input-field col m6 s12 mb-0">
                        <input id="int_number" type="text" required>
                        <label for="int_number">Nº Interior</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                         <textarea id="references" class="materialize-textarea"></textarea>
                         <label for="references">Referencias</label>
                    </div>
                     <div class="input-field col m12 s12 mb-0">
                        <input id="rfc" type="text" required>
                        <label for="rfc">RFC</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                        <input id="phone" type="text" required>
                        <label for="phone">Teléfono/Celular</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                        <input id="email" type="text" required>
                        <label for="email">Correo</label>
                    </div>
                    <div class="input-field col m12 s12 mb-0">
                        <input id="email_repeat" type="text" required>
                        <label for="email_repeat">Repetir Correo</label>
                    </div>
                    <div class="col m12 s12">
                        <a class="btn bg-main mt-2 mb-2" href="#">Guardar</a>
                        <a class="btn green lighten-2 mt-2 mb-2" href="#">Cancelar</a>
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
            PK_categories: 0,
            name: '',
            description:'', 
            informacion:1,
            status : true,
            arrayDatos:[],
  

        }
    },
    methods:{
        listarCategoria(page,buscar,criterio){
            let m=this;
            var url='/categoria?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;

            axios.get(url).then(function (response){
                var respuesta= response.data;
                m.pagination= respuesta.pagination;
                m.arrayCategoria = respuesta.categorias.data;
                // m.status = respuesta.categorias.status.data;

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
        mostrarDatos(){

        }

  
   
       
    },
    mounted() {
        this.mostrarDatos()
    }
}
</script>