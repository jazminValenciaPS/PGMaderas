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
        <h4 class="mt-0 color-main center" v-if="informacion==1">Mi Cuenta</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==2">Editar perfil</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==3">Tarjetas</h4>
        <h4 class="mt-0 color-main center" v-if="informacion==4">Pedidos</h4>


        
        <!-- Container -->
        <div class="row">
                <!-- Navigation -->
                <div class="col m3 s12">
                    <ul class="collection">
                        <li class="collection-item">
                            <h6>Datos Personales</h6>
                            <a @click="editarDatos()">Información Personal</a>
                            <a @click="listarTarjetas()" >Mis Tarjetas</a>
                            <a  >Cambiar Contraseña</a>
                        </li>
                        <li class="collection-item">
                            <h6><a @click="listarPedidos()" >Mis Pedidos</a></h6>
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
                        <span class="col m4 s4 bold">Sexo:</span>
                        <span class="col m8 s8">{{cliente.gender}}</span>
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
                        <span class="col m8 s8">000</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Nº Interior:</span>
                        <span class="col m8 s8">000</span>
                    </div>
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Referencias:</span>
                        <span class="col m10 s8">{{cliente.reference}}
                            </span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">RFC:</span>
                        <span class="col m8 s8">HASI698ASDLN1</span>
                    </div>
                    <div class="col m6 s12 py-1">
                        <span class="col m4 s4 bold">Teléfono:</span>
                        <span class="col m8 s8">{{cliente.phone}}</span>
                    </div>
                    <div class="col m12 s12 py-1">
                        <span class="col m2 s4 bold">Correo:</span>
                        <span class="col m10 s8">{{cliente.email}}</span>
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
                        <a class="btn green lighten-2 mt-2 mb-2" href="#" @click="informacion=1">Cancelar</a>
                    </div>
                </div>

                <!-- Debit/Credit Cards -->
                <div class="col m9 s12" v-if="informacion==3">
                    <div class="text-right mb-2">
                        <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
                    </div>
                    <ul class="collection">
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
                    </ul>
                </div>

                 <!-- Orders Details -->
                <div class="col m9 s12" v-if="informacion==4">
                    <table>
                        <tbody>
                            <tr class="border">
                                <td>#123456789</td>
                                <td>12/12/9999</td>
                                <td>En Transito</td>
                                <td>$798</td>
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
                            <tr class="border">
                                <td>#987654321</td>
                                <td>12/12/9999</td>
                                <td>En Transito</td>
                                <td>$798</td>
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
        listarDatos(){
            let m=this;
            var id = 3;
            var url='/user/cliented/'+id;

            axios.get(url).then(function (response){
                 m.arrayDatos= response.data;
               
            })
            .catch(function(error){
                console.log(error);
            });
        },
        editarDatos(){
            let m=this;
             m.informacion= 2;
        },
        listarTarjetas(){
            let m=this;
             m.informacion= 3;

        },
        listarPedidos(){
            let m=this;
             m.informacion= 4;

        },
    },
    mounted() {
        this.listarDatos()
    }
}
</script>