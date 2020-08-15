<!DOCTYPE html>
<html>
  <head>
    <title>PG Maderas</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- General CSS -->
    <link rel="stylesheet" href='css/general.css' >
    <link rel="stylesheet" href='css/plantilla.css' >


    <link href="https://unpkg.com/vueperslides/dist/vueperslides.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/44742972_183514302527228_7107553413201657856_n.jpg" type="image/x-icon">
    <!--Let browser know website is optimized for mobile-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8"/>
    <script src="https://use.fontawesome.com/68423d26c6.js"></script>


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
    <script src="https://use.fontawesome.com/b0c3eebc42.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
   
    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="./js/plantilla.js"></script>
    <script src="./js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vueperslides"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script>

    <script>
    $(document).ready(function() {
	$('#myCarousel').carousel({
	interval: 10000
	})
    
    $('#myCarousel').on('slid.bs.carousel', function() {
    	//alert("slid");
	});
    
    
});

        $(document).ready(function(){
          $('.modal').modal();
        });

      $(function(){
        $('.datepicker').pickadate({
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
              selectMonths: true,
              selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
              today: 'Hoy',
              clear: 'Limpiar',
              close: 'Ok',
              labelMonthNext: 'Siguiente mes',
            labelMonthPrev: 'Mes anterior',
            labelMonthSelect: 'Selecciona un mes',
            labelYearSelect: 'Selecciona un año',
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