<template>

    <main>
        <!-- <div class="row"> -->
        <!-- carrusel con vue -->
            <vueper-slides autoplay>
                <vueper-slide  v-for="slider in arraySliders"  :key="slider.PK_slider" :image="'img/'+slider.image" />
            </vueper-slides>

        <!-- Card Services -->
        <h3 class="color-main center">¡Nuestros Servicios!</h3>

        <div class="row" id="services-main">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

             <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSyDCoenYIZUQudpbqVCy2M8SUi3eSXf17RDw&usqp=CAU">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

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
            }
            },
            methods:{
              listarSliders(){
                let m=this;


                axios.get('/slider').then(function (response){
                    m.arraySliders = response.data;
                  
                 })
                 .catch(function(error){
                    console.log(error);
                 });

             },
            },
        mounted() {
            this.listarSliders();
        }
     }


 </script>