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
<main>

<!-- Container -->
<div class="row">
    <!-- Sign In -->
    <div class="col m6 s12 p-0 mb-2">
        <h4 class="mt-0 color-main">Mi Cuenta</h4>
        <p>¿Aún no tienes cuenta?<br>¡Crea tu cuenta hoy!</p>
        <p>
            Revisa el estatus de tus órdenes
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Consulta tu historial de compras
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Vuelve a comprar tus órdenes anteriores
            <i class="material-icons left color-main">check</i>
        </p>
        <p>
            Recibe nuestras promociones y ¡Aprovéchalas antes que nadie!
            <i class="material-icons left color-main">check</i>
        </p>
        <a class="btn bg-main mt-2" href="#">Registrarme<i class="material-icons left">person_add</i></a>
       
        @yield('loginC')
   
    </div>



</div>

      
     
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="js/plantilla.js"></script>
      

   </body>
</html>