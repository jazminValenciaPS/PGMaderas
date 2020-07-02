<template>
    <main>
       
    <section class="container-contacto">
        <p class="title-contacto bold">Contactanos</p>
        <section class="map-contaider">
            <iframe class="map" :src=urlrsc frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <!-- <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57958.11007118638!2d-107.46681052089846!3d24.78237390000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5b12d7b2b6c4b8fb!2sValle%20Alto%20Verde!5e0!3m2!1ses-419!2smx!4v1593721215714!5m2!1ses-419!2smx" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.780280983883!2d-107.4578718849337!3d24.76872148409721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd049e19e85e9%3A0xc3202d93bdb524ad!2sMargarita%203440-3536%2C%20Terranova%2C%2080143%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721477085!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
        </section>
        <section class="container-text">
            <article>
                <p class="title-contactos">MATRIZ CULIACAN :</p>
                <p class="text-contactos">Heroico colegio militar 3100,80280, Culiacán de Rosales</p>
                <div class="col s12">
                   <button class="btn waves-effect waves-light" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4699506639154!2d-107.3698098849335!3d24.77935648409222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd7240c5d8d75%3A0x9c2c1c4bc41afaed!2sHeroico%20Colegio%20Militar%203100%2C%2021%20de%20Marzo%2C%2080280%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721558618!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                </div>
            </article>
            <article>
                <p class="title-contactos">SUCURSAL ZAPATA:</p>
                <p class="text-contactos">
                    Blvd. Emiliano Zapata 1860, Centro Sinaloa, 80000 Culiacán Rosales, Sin 
                </p>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.0650527304224!2d-107.41557908493323!3d24.793225884085654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd0947b0eeb13%3A0x22883c47a5c130ef!2sBlvd.%20Emiliano%20Zapata%201860%2C%20Centro%20Sinaloa%2C%2080000%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721635010!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                </div>
            </article>
             <article>
                <p class="title-contactos">SUCURSAL MONTERREY:</p>
                <p class="text-contactos">
                    Av. Félix U. Gómez # 4204, Col. Valle del Nogalar, San Nicolás de los Garza, Nuevo León 66080
                </p>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" v-on:click="url('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3594.8605609793085!2d-100.28303578491536!3d25.70904038366066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662953da32b2263%3A0x3b547b55e4da1b1c!2sAv.%20F%C3%A9lix%20U.%20G%C3%B3mez%204204%2C%20Sin%20Nombre%20de%20Col%2035%2C%20San%20Nicol%C3%A1s%20de%20los%20Garza%2C%20N.L.!5e0!3m2!1ses-419!2smx!4v1593721683501!5m2!1ses-419!2smx')" type="submit" name="action">Ver sucursal</button>
                </div>
            </article>
        </section>
        <section class="container-form">
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="last_name" type="text" class="validate">
                            <label for="Nombre">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">phone</i>
                            <input id="last_name" type="text" class="validate">
                            <label for="Telefono">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <input id="email" type="email" class="validate">
                            <label for="Mensaje">Mensaje</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 from-button">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar Mensaje
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
    </main>
</template>
<script>

    export default {
        data(){
            return{
               urlrsc:"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.4699506639154!2d-107.3698098849335!3d24.77935648409222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86bcd7240c5d8d75%3A0x9c2c1c4bc41afaed!2sHeroico%20Colegio%20Militar%203100%2C%2021%20de%20Marzo%2C%2080280%20Culiac%C3%A1n%20Rosales%2C%20Sin.!5e0!3m2!1ses-419!2smx!4v1593721558618!5m2!1ses-419!2smx"
            }
        },
        methods:{
            url(url){
                this.urlrsc = url;
            }
        },
        mounted() {

            console.log("Component mounted");
        }
     }
 </script>