<template>
    <main>
        
        <!-- carrusel con vue -->
        <vueper-slides autoplay class="sliders-inicio">
            <vueper-slide  v-for="slider in arraySliders"  :key="slider.PK_slider" :image="'img/'+slider.image" />
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
                        <img src="img/servicio1.jpg">
                        <span class="card-title">Enbisagrado</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4" >
                <div class="card">
                    <div class="card-image">
                        <img src="img/servicio2.jpg">
                        <span class="card-title">Enchapado de cantos</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="img/servicio3.jpg">
                        <span class="card-title">Corte de tableros</span>
                    </div>
                </div>
            </div>

             <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="img/servicio4.jpg">
                        <span class="card-title">Corte de cubiertas</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="img/servicio5.jpg">
                        <span class="card-title">Corte de maderas</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="img/servicio5.jpg">
                        <span class="card-title">Cepillado de madera</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nuevos productos -->
        <br>

        <h3 class="color-main center linea" ><span>Nuevos Productos!!</span></h3>
        <br>
        <div class="row producN" style="background-color: #ececea;margin-bottom: 0px;">
            <div class="col l10 s10">
                <vueper-slides
                class="no-shadow"
                :visible-slides="3"
                slide-multiple
                :gap="3"
                :slide-ratio="1 / 4"
                :dragging-distance="200"
                :breakpoints="{ 800: { visibleSlides: 2, slideMultiple: 2 } }">
                <vueper-slide v-for="product in arrayProductos"  :key="product.PK_products" :image="'img/'+product.image"  />
               </vueper-slides>
            </div>
            
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