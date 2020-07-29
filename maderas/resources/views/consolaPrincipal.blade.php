<!DOCTYPE html>
<html>
  <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="csrf-token" content="{{ csrf_token()  }}">
      <meta name="viewport" content="width=device-width, initial-scale=1">  
      <link href="https://unpkg.com/vueperslides/dist/vueperslides.css" rel="stylesheet">
      <link rel="stylesheet" href='./css/plantilla.css' >
      <link rel="shortcut icon" href="img/44742972_183514302527228_7107553413201657856_n.jpg" type="image/x-icon">
      <link rel="stylesheet" href="css/estilos.css">
  </head>
  <style>
    nav{
      background-color: transparent;
    }
    footer{
      background-color: black;
    }
    nav ul a {
      font-size: 1rem;
      color: #100c0c;
      display: block;
      padding: 0 15px;
    }
    ul li a {
      color:black;
    }
  </style>
  <body>
    <div id="app">
    
      @include('plantilla.consolaNavAdmin')   

      <!-- Contenido principal -->
      @yield('consola')
      <!-- Termina contenido principal -->

    </div>
  </body>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="js/plantilla.js"></script>
<script src="js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>      
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script>
  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
      

  $(document).ready(function(){
    $('.dropdown-trigger').dropdown();
    
  });
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {closeOnClick: true});
  });

  document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  var instances = M.Modal.init(elems);
 });

  //     // Or with jQuery

</script> 


</html>
