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
                <li><i class="Medium material-icons">call</i>Heroico Colegio Militar 7490021</li>
                <li><i class="Medium material-icons">call</i>Sucursal Zapata 7662020</li>
                <li><i class="Medium material-icons">call</i>Sucursal Monterrey 8147373452</li>
            </ul>
        </div>

        <!-- Categorias -->
        <ul class="container-categorias-icons">
            <li class="categorias-icons" >
                <img src="img/woodPanel.png" alt="">
                <h6>TABLEROS</h6>
                <a>Pino</a>
                <a>Parota</a>
                <a>Cedro</a>
                <a>Tzalam</a>
            </li>
            <li class="categorias-icons" >
                <img src="img/woodIcon.png" alt="">
                <h6>MADERA</h6>
                <a>Cimbras</a>
                <a> MDF</a>
                <a>Aglomerados</a>
                <a>Enchapados</a>
            </li>
            <li class="categorias-icons" >
                <img src="img/herrajes.png" alt="">
                <h6>HERRAJES</h6>
                <a>Correderas</a>
                <a>Jaladeras</a>
                <a>Perfiles</a>
                <a>Bisagras</a>
            </li>
            <li class="categorias-icons" >
                <img src="img/Cubierta80x80.png" alt="">
                <h6>CUBIERTAS</h6>
                <a>Cubierta aglomerado</a>
                <a>Resina</a>
                <a>Cuarzos</a>
                <a>Granito</a>
                
            </li>
            <li class="categorias-icons" >
                <img src="img/LaminadosPlasticos80x80.png" alt="">
                <h6>LAMINADOS</h6>
                <a>Naturales</a>
                <a>Formaica</a>
                <a>Cromacore</a>
                <a></a>
            </li>
            <li class="categorias-icons" >
                 <img src="img/paint2.png" style="opacity: 0.7;" alt="">
                <h6>PINTURA</h6>
                <a>Pinturas</a>
                <a>Pegamento</a>
                <a>Lijas</a>
                <a>Resanes</a>
            </li>
        </ul>

        <!-- Card Services -->
        <h3 class="color-main center title-index" >¡Nuestros Servicios!</h3>
        <div class="row" id="services-main">
            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enbisagrado' src="img/servicio1.jpg">
                        <span class="card-title servicios-card">Enbisagrado</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4" >
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Enchapado de cantos' src="img/servicio2.jpg">
                        <span class="card-title servicios-card">Enchapado de cantos</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de tableros' src="img/servicio3.jpg">
                        <span class="card-title servicios-card">Corte de tableros</span>
                    </div>
                </div>
            </div>

             <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de cubiertas'  src="img/servicio4.jpg">
                        <span class="card-title servicios-card">Corte de cubiertas</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Corte de maderas' src="img/servicio5.jpg">
                        <span class="card-title servicios-card">Corte de maderas</span>
                    </div>
                </div>
            </div>

            <div class="col s6 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img alt='imagen de Servicio de Cepillado de madera' src="img/servicio6.jpg">
                        <span class="card-title servicios-card">Cepillado de madera</span>
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
                    <li href="/descargar/file" class="black-text descargar"><a href="/descargar/file"> <i class="material-icons black-text">get_app</i></a></li>
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
        
       
        <!-- Productos destacados -->
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
        
        <!-- Proyecto en modulos -->
        <div class="row">
            <div class="contenedorImg col l12 m12 s12">
                <img src="img/proyectoModulos.png" alt="tu proyecto en modulos de PG">
                <ul class="texto-optimizador col l4">
                    <li class="white-text">Tu Proyecto en modulos(PDF)</li>
                    <li href="/descargar/modulos" class="black-text descargar"><a href="/descargar/modulos"> <i class="material-icons black-text">get_app</i></a></li>
                </ul>
            </div>
        </div>

        <!-- Experiencia -->
        <section class="section-coments">
            <div>
                <h3 class="text-title-init center title-index">Conoce la experiencia de nuestros clientes</h3>
            </div> 
            <div class="main-container-coments">
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes comentarios-clientes-tanaño">
                        <p>
                            "Encontré lo que buscaba muy buena atención y tienen mucha variedad de madera y triplay"
                        </p>
                    </div>
                    <p class="bold">Morales Medina</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes comentarios-clientes-tanaño">
                        <p>"Muy buen servicio. Excelente calidad en maderas"</p>
                    </div>
                    <p class="bold">Dalia Morales</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes comentarios-clientes-tanaño">
                        <p>"Super grande la variedad que manejan"</p>
                    </div>    
                    <p class="bold">AR ETIQUETADO</p>
                </div>
                <div class="cotainer-coments" >
                    <div class="contenerdor-comentarios-clientes content-big">
                        <p>"Excelente calidad y variedad en materiales, atención personalizada, servicio de primera en cortes y enchapados."</p>
                    </div>
                    <p class="bold">DECO STUDIO</p>
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
       

       <!-- Proveedores -->
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
     mounted(){
        this.listarSliders();
        this.nuevosProductos();
    }
}
 </script>  
