<template>
    <main class="main-index">
        <section class="container-contacto">
            <h6 class="title-contacto ">Contáctanos</h6>
            <section class="map-contaider">
                <iframe class="map" :src=urlrsc frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </section>
            <section class="container-text">
                <article>
                    <p class="title-contactos">MATRIZ CULIACAN :</p>
                    <p class="text-contactos">Heroico Colegio Militar # 3100 Col. 21 de Marzo C.P 80280, Culiacán Sinaloa tel. 7490021</p>
                    <div class="col s12">
                        <button class="btn bg-main waves-effect waves-light" style="z-index:0" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4699506639154!2d-107.3698098849335!3d24.77935648409222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd7240c5d8d75%3A0x9c2c1c4bc41afaed!2sHeroico%20Colegio%20Militar%203100%2C%2021%20de%20Marzo%2C%2080280%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721558618!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                    </div>
                </article>
                <article>
                    <p class="title-contactos">SUCURSAL ZAPATA:</p>
                    <p class="text-contactos">
                        Blvd. Emiliano Zapata #1860-a Col. Centro C.P 8000, Culiacán Sinaloa tel. 7662020
                    </p>
                    <div class="col s12">
                        <button class="btn bg-main waves-effect waves-light" style="z-index:0" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.0650527304224!2d-107.41557908493323!3d24.793225884085654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd0947b0eeb13%3A0x22883c47a5c130ef!2sBlvd.%20Emiliano%20Zapata%201860%2C%20Centro%20Sinaloa%2C%2080000%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721635010!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                    </div>
                </article>
                <article>
                    <p class="title-contactos">SUCURSAL MONTERREY:</p>
                    <p class="text-contactos">
                        Av. Félix U. Gomez #4204 Col. Valle del Nogalar, San Nicolas de los Garza Nuevo León C.P 66080 tel. 8147373452
                    </p>
                    <div class="col s12">
                        <button class="btn bg-main waves-effect waves-light" style="z-index:0" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.8605609793085!2d-100.28303578491536!3d25.70904038366066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662953da32b2263%3A0x3b547b55e4da1b1c!2sAv.%20F%C3%A9lix%20U.%20G%C3%B3mez%204204%2C%20Sin%20Nombre%20de%20Col%2035%2C%20San%20Nicol%C3%A1s%20de%20los%20Garza%2C%20N.L.!5e0!3m2!1ses-419!2smx!4v1593721683501!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                    </div>
                </article>
            </section>
            <br>
            <section class="container-form">
                <div>
                    <form id="form" method="post" action="/contact" @submit="checkForm">
                        <p v-if="errorform.length">
                            <ul>
                                <li v-for="error in errorform" :key="error.id">{{error}}</li>
                            </ul>
                        </p>
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="row">
                            <h4 class="center ">¿En qué podemos ayudarle?</h4>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="last_name" name="nombre" v-model="nombre" type="text" required="required" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">phone</i>
                                <input id="last_name" name=telefono v-model="telefono" type="tel" required="required"  class="validate">
                                <label for="Telefono" >Telefono</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" v-model="email" type="email" required="required" class="validate">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="icon_prefix2" name="mensaje" v-model="mensaje" required="required" class="materialize-textarea"></textarea>
                                <label for="Mensaje" >Mensaje</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 from-button">
                                <button class="btn bg-main waves-effect waves-light" type="submit" name="action" >Enviar Mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </section>
        <br>
        <br>
    </main>
</template>
<script>
    import Swal from 'sweetalert2';  

    $(document).on('submit', '[id^=form]', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        Swal.fire({
            icon: 'success',
            title: '¡Gracias por escribirnos!',
            text: 'En breve nos contactaremos contigo',
        }).then(function () {
            $('#form').submit();
        });
        return false;
    });
    export default {
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nombre: "",
                telefono: '',
                email:'',
                mensaje:'',
                errorform: 0,
                errorMostrarMsjform: [],
                urlrsc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4699506639154!2d-107.3698098849335!3d24.77935648409222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd7240c5d8d75%3A0x9c2c1c4bc41afaed!2sHeroico%20Colegio%20Militar%203100%2C%2021%20de%20Marzo%2C%2080280%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721558618!5m2!1ses-419!2smx"
            }
        },
        methods:{
            url(url){
                this.urlrsc = url;
            },
            checkForm: function (e) {
                if (this.nombre && this.mensaje) {
                    return true;
                }

                this.errorform = [];

                if (!this.nombre) {
                    this.errorform.push('El nombre es obligatorio.');
                }
                if (!this.mensaje) {
                    this.errorform.push('El mensaje es obligatoria.');
                }
                if (!this.email) {
                    this.errorform.push('El E-mail es obligatoria.');
                }

                e.preventDefault();
            }
        },
        mounted() {
            console.log("Component mounted");
        }
     }
 </script>