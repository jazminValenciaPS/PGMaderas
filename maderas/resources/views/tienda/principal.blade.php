<!DOCTYPE html>
<html>
  <head>
    <title>PG Maderas</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- General CSS -->
    <link rel="stylesheet" href='css/general.css' >

    <link href="https://unpkg.com/vueperslides/dist/vueperslides.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/44742972_183514302527228_7107553413201657856_n.jpg" type="image/x-icon">
    <!--Let browser know website is optimized for mobile-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8"/>
  </head>

  <body>
    <div id="app">
   
    @include('plantilla.navEcommerce')

      <!-- Contenido principal -->
      @yield('ecommerce')

      <!-- Termina contenido principal -->

      <!-- Footer -->
      @include('plantilla.footerPrincipal')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
    <script src="./js/plantilla.js"></script>
    <script src="./js/app.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vueperslides"></script>

    <script>
    
  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
 

  

        $(document).ready(function(){
          $(".wish-icon i").click(function(){
            $(this).toggleClass("fa-heart fa-heart-o");
          });
        });	

      document.addEventListener('DOMContentLoaded', () => {
        M.Sidenav.init(document.querySelectorAll('.sidenav'), {});
        M.AutoInit();


        var options = {
            indicators: true,
            fullWidth: true,
            indicators: true
        };
        var elem = document.querySelector('.carousel');
        var instances = M.Carousel.init(elem, options);

        previous = () => {
            M.Carousel.getInstance(elem).prev();
        }
        next = () => {
            M.Carousel.getInstance(elem).next();
        }
      });

 

    </script>
  </body>
</html>
