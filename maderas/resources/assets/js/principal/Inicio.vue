<template>
    <main>
        
        <!-- carrusel con vue -->
        <vueper-slides autoplay class="sliders-inicio">
            <vueper-slide  v-for="slider in arraySliders"  :key="slider.PK_slider" alt='imagenes de carrusel de PG Maderas' :image="'img/'+slider.image" />
        </vueper-slides>
        <!-- Contactanos -->
        <div class="row center">
            <ul class="col l12 numeros center-align" >
                <li>Puedes contactarnos en:</li>
                <li><i class="Medium material-icons">call</i>Lorem ipsum dolor sit 777777</li>
                <li><i class="Medium material-icons">call</i>Sucursal Zapata 7662020</li>
                <li><i class="Medium material-icons">call</i>Sucursal Monterrey 8147373452</li>
            </ul>
        </div>

        <!-- Categorias -->
        <ul class="container-categorias-icons">
            <li class="categorias-icons">
                <img src="img/woodPanel.png" alt="">
                <h6>TABLEROS</h6>
                <a  :href="'/productos-Categorias?buscar='+Pino">Pino</a>
                <a :href="'/productos-Categorias?buscar='+Parota">Parota</a>
                <a :href="'/productos-Categorias?buscar='+Cedro" >Cedro</a>
                <a :href="'/productos-Categorias?buscar='+Tzalam">Tzalam</a>
            </li>
            <li class="categorias-icons">
                <img src="img/woodIcon.png" alt="">
                <h6>MADERA</h6>
                <a :href="'/productos-Categorias?buscar='+Cimbras">Cimbras</a>
                <a :href="'/productos-Categorias?buscar='+MDF">MDF</a>
                <a :href="'/productos-Categorias?buscar='+Aglomerados">Aglomerados</a>
                <a :href="'/productos-Categorias?buscar='+Enchapados">Enchapados</a>
            </li>
            <li class="categorias-icons">
                <img src="img/herrajes.png" alt="">
                <H6>HERRAJES</H6>
                <a :href="'/productos-Categorias?buscar='+Correderas">Correderas</a>
                <a :href="'/productos-Categorias?buscar='+Jaladeras">Jaladeras</a>
                <a :href="'/productos-Categorias?buscar='+Perfiles">Perfiles</a>
                <a :href="'/productos-Categorias?buscar='+Bisagras">Bisagras</a>
            </li>
            <li class="categorias-icons">
                <img src="img/Cubierta80x80.png" alt="">
                <h6>CUBIERTAS</h6>
                <a :href="'/productos-Categorias?buscar='+CubiertaAglomerado">Cubierta aglomerado</a>
                <a :href="'/productos-Categorias?buscar='+Resina">Resina</a>
                <a :href="'/productos-Categorias?buscar='+Cuarzos">Cuarzos</a>
                <a :href="'/productos-Categorias?buscar='+Granito">Granito</a>
                
            </li>
            <li class="categorias-icons" style="align-content: baseline;">
                <img src="img/LaminadosPlasticos80x80.png" alt="">
                <H6>LAMINADOS</H6>
                <a :href="'/productos-Categorias?buscar='+Naturales">Naturales</a>
                <a :href="'/productos-Categorias?buscar='+Formaica">Formaica</a>
                <a :href="'/productos-Categorias?buscar='+Cromacore">Cromacore</a>
                <a href=""></a>
            </li>
            <li class="categorias-icons">
                 <img src="img/paint2.png" alt="">
                <h6>PINTURA</h6>
                <a :href="'/productos-Categorias?buscar='+Pinturas">Pinturas</a>
                <a :href="'/productos-Categorias?buscar='+Pegamento">Pegamento</a>
                <a :href="'/productos-Categorias?buscar='+Lijas">Lijas</a>
                <a :href="'/productos-Categorias?buscar='+Resanes">Resanes</a>
            </li>
        </ul>

        <!-- Card Services -->
        <h3 class="color-main center title-index" >¡Nuestros Servicios!</h3>
        <div class="row" id="services-main">
            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enbisagrado' src="img/servicio1.jpg">
                        <span class="card-title">Enbisagrado</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4" >
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enchapado de cantos' src="img/servicio2.jpg">
                        <span class="card-title">Enchapado de cantos</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de tableros' src="img/servicio3.jpg">
                        <span class="card-title">Corte de tableros</span>
                    </div>
                </div>
            </div>

             <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de cubiertas'  src="img/servicio4.jpg">
                        <span class="card-title">Corte de cubiertas</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de maderas' src="img/servicio5.jpg">
                        <span class="card-title">Corte de maderas</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Cepillado de madera' src="img/servicio6.jpg">
                        <span class="card-title">Cepillado de madera</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optimizador -->
       <div class="row">
           <div class="contenedorImg col l12 m12 s12">
               <img src="img/optimizador.png" alt="Optimizador online de PG">
                <ul class="texto-optimizador col l4">
                    <li class="white-text">OPTIMIZADOR ONLINE PG (xlsx)</li>
                    <li href="/descargar/file" class="black-text"> <i class="material-icons black-text">get_app</i> Descargar</li>
                </ul>
           </div>
       </div>

        <!-- Cintilla -->
        <div class="row color-cintilla">
            <div class="col l4 s4">
                <div class="row ceter">
                    <div class="col l12 s12 m12 center">
                         <h4 class="cintilla-text">
                            ENTREGAS
                         </h4>
                    </div>
                    <br>
                    <div class="col l12 m12 s12 center">
                        <img src="img/camion.png"  class="iconos">
                    </div>
                </div>
                <p class="white-text center">
                    Comercializamos y ditribuimos oportunamente nuestros productos. Tenemos la opción de entregarle en nuestras instalaciones o directamente en su domicilio.
                </p>
            </div>
             <div class="col l4 s4">
                <div class="row ceter">
                    <div class="col l12 m12 s12 center">
                         <h4 class="cintilla-text">
                            ASESORÍA
                        </h4>
                    </div>
                <br>

                    <div class="col l12 m12 s12 center">
                        <img  src="img/consejo.png"  class="iconos">
                    </div>
                </div>
                <p class="white-text center">
                    Contamos con un grupo de vendedores expertos en los productos maderables, dispuestos a asesorarlo en todo momento para que usted cuente con la mejor información para su proceso.
                </p>
            </div>
             <div class="col l4 s4">
                  <div class="row ceter">
                    <div class="col l12 m12 s12 center">
                         <h4 class="cintilla-text">
                            CALIDAD
                        </h4>
                    </div>
                <br>

                    <div class="col l12 m12 s12 center">
                        <img  src="img/seguro.png"  class="iconos">
                    </div>
                </div>
                <p class="white-text center">
                    En PG Maderas, contamos con el producto que usted necesita, para la realización de su proyecto, con la mejor calidad y al mejor precio.
                </p>
            </div>
        </div>
        
        <h3 class="text-title-init center title-index">Lo más nuevo en el mercado</h3>
         <section class="section-contianer-new-produc">
            <div class="row container-card" v-for="product in arrayProductos"  :key="product.PK_products">
                <div class="col s12 m12 l12" >
                    <div class="card" >
                        <div class="card-image">
                            <img alt='imagen de productos PG Maderas' :src="'img/'+product.image">
                        </div>
                        <div class="card-content contend-products-home">
                            <span class="card-title">{{product.name}}</span>
                            <p class="text-product hide-on-small-only">{{product.description}}</p>
                            <p class="text-product">$ {{product.price}}</p>
                        </div>
                        <!-- <div class="card-action">
                            <a style="color:#419142 !important" :href="'/Ver-Producto?id='+product.PK_products">Ir a producto </a>
                        </div> -->
                    </div>
                </div>
            </div>
         </section>
        
        <section>
            <div>
                <h3 class="text-title-init center title-index">Conoce la experiencia de nuestros clientes</h3>
            </div> 
            <div class="main-container-coments">
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes">
                        <p>"Muy buen servicio. Excelente calidad en maderas"</p>
                    </div>
                    <p class="bold">Persona1</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes">
                        <p>"Muy buen servicio. Excelente calidad en maderas"</p>
                    </div>
                    <p class="bold">Dalia Morales</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes">
                        <p>"Super grande la variedad que manejan"</p>
                    </div>
                    <p class="bold">AR ETIQUETADO</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes content-big">
                        <p>"Encontré lo que buscaba muy buena atención y tienen mucha variedad de madera y triplay"</p>
                    </div>
                    <p class="bold">Morales Medina</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes content-big" style="padding: 0; margin: 0;">
                        <p>"El Concepto de la compañía me parece excelente, Me diseñaron mi cocina me hicieron todos los servicios de las tablas 
                            y al final me explicaron como armarlo, mi esposo armo toda la cina y el ahorro fue muy bueno"</p>
                    </div>
                    <p class="bold">Jazmin Parra</p>
                </div>
                <div class="cotainer-coments">
                    <div class="contenerdor-comentarios-clientes content-big">
                        <p>"Un lugar agradable, tienen muy buena atención y son muy profesionales"</p>
                    </div>
                    <p class="bold">Guadalupe Alcaraz</p>
                </div>
            </div>    
        </section>
       
        <div class="center">
            <h3 class="text-title-init title-index">Nuestros Proveedores</h3>
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
                Pino:"Pino",
                Parota:"Parota",
                Cedro:"Cedro",
                Tzalam:"Tzalam",
                Cimbras:"Cimbras",
                MDF:"MDF",
                Aglomerados:"Aglomerados",
                Enchapados:"Enchapados",
                Correderas:"Correderas",
                Jaladeras:"Jaladeras",
                Perfiles:"Perfiles",
                Bisagras:"Bisagras",
                CubiertaAglomerado:"Cubierta Aglomerado",
                Resina:"Resina",
                Cuarzos:"Cuarzos",
                Granito:"Granito",
                Naturales:"Naturales",
                Formaica:"Formaica",
                Cromacore:"Cromacore",
                Pinturas:"Pinturas",
                Pegamento:"Pegamento",
                Lijas:"Lijas",
                Resanes:"Resanes",
             
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
                });
            },
            verProductoLike(menu,id){
            let m=this;
            var objeto = {
                vMenu: menu,
                like: buscar
            }
            m.$emit("listar-productos",objeto);
        },
        },
    }
 </script>  