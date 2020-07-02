<template>

    <main>
        <!-- Carousel -->
        <div class="carousel carousel-slider espace-top">
            <div class="carousel-fixed-item center">
                <a onclick="previous()" class="waves-effect waves-light white-text left chevron-middle"><i class="material-icons white-text big-size">chevron_left</i></a>
                <a onclick="next()" class="waves-effect waves-light white-text right chevron-middle"><i class="material-icons white-text big-size">chevron_right</i></a>
            </div>
            <a  class="carousel-item active" >
                 <img  src="https://lorempixel.com/500/500/nature/1">
                  <!-- :src="'img/'+slider.image" -->
            </a>
              <a  class="carousel-item active" >
                 <img  src="https://lorempixel.com/500/500/nature/1">
                  <!-- :src="'img/'+slider.image" -->
            </a>
        </div>


        <!-- Card Services -->
        <h3 class="color-main center">¡Nuestros Servicios!</h3>

        <div class="row" id="services-main">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/1">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/2">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/3">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/4">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/5">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://lorempixel.com/500/500/nature/6">
                        <span class="card-title">Servicio</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>

    export default {
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