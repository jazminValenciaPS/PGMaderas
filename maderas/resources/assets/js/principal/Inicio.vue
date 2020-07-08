<template>

    <main>
        <div class="row">

        <!-- Carousel -->
        <!-- <div class="carousel carousel-slider espace-top">
            <div class="carousel-fixed-item center">
                <a onclick="previous()" class="waves-effect waves-light white-text left chevron-middle"><i class="material-icons white-text big-size">chevron_left</i></a>
                <a onclick="next()" class="waves-effect waves-light white-text right chevron-middle"><i class="material-icons white-text big-size">chevron_right</i></a>
            </div>
            v-for="slider in arraySliders" :key="slider.PK_slider"
            <a v-for="slider in arraySliders" :key="slider.PK_slider" class="carousel-item active" >
                <img class="" :src="'./public/img/'+ slider.image">
                 <img  :src="'img/'+slider.image">
                  :src="'img/'+slider.image"
            </a>
              <a  class="carousel-item active" >
                 <img  src="https://www.blogbankia.es/recursos/img/blog/20190611/julio-2019/cuanto-cobra-un-astronauta-mini-783x412.jpg">
                  :src="'img/'+slider.image"
            </a>
        </div> -->
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