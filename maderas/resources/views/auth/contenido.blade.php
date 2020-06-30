<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href='css/plantilla.css' >
    <link rel="stylesheet" href='css/estilos.css' >

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   </head>
  
   <body class="login" >

<div class="padre">
<div class="col s12 opacity center ">
        <div class="row ">
              <div >
                <img  class="logo" src="img/TIPOLOGIA LETRAS PGmaderas para fachada.png">
              </div>
        </div>

    @yield('login')

  </div>
</div>

      
     
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="js/plantilla.js"></script>
      

   </body>
</html>