<template>
    <main>
        
        <!-- carrusel con vue -->
        <vueper-slides autoplay class="sliders-inicio">
            <vueper-slide  v-for="slider in arraySliders"  :key="slider.PK_slider" alt='imagenes de carrusel de PG Maderas' :image="'img/'+slider.image" />
        </vueper-slides>
        <div class="row center">
            <ul class="col l12 numeros center-align" >
                <li>Puedes contactarnos en:</li>
                <li><i class="Medium material-icons">call</i>Matriz Culiacán 7490021</li>
                <li><i class="Medium material-icons">call</i>Sucursal Zapata 7662020</li>
                <li><i class="Medium material-icons">call</i>Sucursal Monterrey 8147373452</li>
            </ul>
        </div>
        <!-- Card Services -->
        <h3 class="color-main center" >¡Nuestros Servicios!</h3>
        <div class="row" id="services-main">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enbisagrado' src="img/servicio1.jpg">
                        <span class="card-title">Enbisagrado</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4" >
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enchapado de cantos' src="img/servicio2.jpg">
                        <span class="card-title">Enchapado de cantos</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de tableros' src="img/servicio3.jpg">
                        <span class="card-title">Corte de tableros</span>
                    </div>
                </div>
            </div>

             <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de cubiertas'  src="img/servicio4.jpg">
                        <span class="card-title">Corte de cubiertas</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de maderas' src="img/servicio5.jpg">
                        <span class="card-title">Corte de maderas</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Cepillado de madera' src="img/servicio5.jpg">
                        <span class="card-title">Cepillado de madera</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row color-cintilla">
            <div class="col l4 s4">
                <div class="row ceter">
                    <div class="col l12 s12 center">
                         <h4 class="cintilla-text">
                            ENTREGAS
                         </h4>
                    </div>
                    <br>
                    <div class="col l12 center">
                        <img src="img/enviado.png"  class="iconos">
                    </div>
                </div>
                <p class="cintilla-text center">
                    Comercializamos y ditribuimos oportunamente nuestros productos. Tenemos la opción de entregarle en nuestras instalaciones o directamente en su domicilio.
                </p>
            </div>
             <div class="col l4 s4">
                <div class="row ceter">
                    <div class="col l12 center">
                         <h4 class="cintilla-text">
                            ASESORIA
                        </h4>
                    </div>
                <br>

                    <div class="col l12 center">
                        <img  src="img/asignacion.png"  class="iconos">
                    </div>
                </div>
                <p class="cintilla-text center">
                    Contamos con un grupo de vendedores expertos en los productos maderables, dispuestos a asesorarlo en todo momento para que usted cuente con la mejor información para su proceso.
                </p>
            </div>
             <div class="col l4 s4">
                  <div class="row ceter">
                    <div class="col l12 center">
                         <h4 class="cintilla-text">
                            CALIDAD
                        </h4>
                    </div>
                <br>

                    <div class="col l12 center">
                        <img  src="img/escudo.png"  class="iconos">
                    </div>
                </div>
                <p class="cintilla-text center">
                    En PG Maderas, contamos con el producto que usted necesita, para la realización de su proyecto, con la mejor calidad y al mejor precio.
                </p>
            </div>
        </div>
        
        <h3 class="color-main center">¡Conoce nuestros productos!</h3>
         <section class="section-contianer-new-produc">
            <div class="row container-card" v-for="product in arrayProductos"  :key="product.PK_products">
                <div class="col s12 m12 l12" >
                    <div class="card">
                        <div class="card-image">
                            <img alt='imagen de productos PG Maderas' :src="'img/'+product.image">
                        </div>
                        <div class="card-content" style="height: 150px;">
                            <span  class="card-title">{{product.name}}</span>
                            <p>{{product.description}}</p>
                            <p>$ {{product.price}}</p>
                        </div>
                        <div class="card-action">
                            <a style="color:#419142 !important" :href="'/Ver-Producto?id='+product.PK_products">Ir a producto </a>
                        </div>
                    </div>
                </div>
            </div>
         </section>
       
        <div class="center">
            <h3 class="proveedores">NUESTROS PROVEEDORES</h3>
        </div>
        <div class="container-prob-inicio">
            <vueper-slides autoplay  class="no-shadow" :visible-slides="3" :breakpoints="{ 800: { visibleSlides: 1, slideMultiple: 2 } }" :slide-ratio="1 / 4" :dragging-distance="70">
                <vueper-slide v-for="(slide, i) in slides" :key="i" alt='imagenes de proveedores de PG Maderas' :image="slide.image"/>
            </vueper-slides>
        </div>         
    </main> 
</template>

<script>

    import { VueperSlides, VueperSlide } from 'vueperslides';
    import 'vueperslides/dist/vueperslides.css';

    export default {
        components: { VueperSlides, VueperSlide },
        data(){
            return{
                img: '',
                file:'',
                arraySliders:[],
                arrayProductos:[],
                slides:[{
                        image: 'img/Reahu.png'
                    },
                    {
                        image: 'img/Dekken.png'
                    },
                    {
                        image: 'img/Fincsa.png'
                    },
                    {
                        image: 'img/Blum.png'
                    },
                    {
                        image: 'img/Cerrajes.png'
                    },
                    {
                        image: 'img/Fandeli.png'
                    },
                    {
                        image: 'img/Kele.png'
                    },
                    {
                        image: 'img/Canplast.png'
                    },
                    {
                        image: 'img/Spax.png'
                    },
                    {
                        image: 'img/Valresa.png'
                    },
                    {
                        image: 'img/surtimex.png'
                    },
                ],
            }
        },
        computed: {
            atEndOfList() {
            return this.currentOffset <= (this.paginationFactor * -1) * (this.items.length - this.windowSize);
            }
        },
        methods:{
            listarSliders(){
                let m=this;

                axios.get('/slider/carrusel').then(function (response){
                    m.arraySliders = response.data;
                })
                .catch(function(error){
                    console.log(error);
                });

            },
            nuevosProductos(){
                let m=this;

                axios.get('/productosNuevos').then(function (response){
                    m.arrayProductos = response.data;
                
                })
                .catch(function(error){
                    console.log(error);
               });
            },
        },
        mounted() {
            this.listarSliders();
            this.nuevosProductos();
        }
     }
 </script>