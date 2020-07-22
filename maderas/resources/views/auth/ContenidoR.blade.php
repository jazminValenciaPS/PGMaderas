<!DOCTYPE html>
<html>
  <head>
    <title>Registro</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- General CSS -->
    <link rel="stylesheet" href="css/general.css">
    <link rel="shortcut icon" href="img/44742972_183514302527228_7107553413201657856_n.jpg" type="image/x-icon">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8"/>
  </head>

  <body>

    @include('plantilla.navEcommerce')
   


      @yield('registro')
    

     <!-- Footer -->

    @include('plantilla.footerPrincipal')


          

    <!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
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
            M.Materialbox.init(document.querySelectorAll('.materialboxed'), {});
            M.FormSelect.init(document.querySelectorAll('select'), {});
            M.Datepicker.init(document.querySelectorAll('.datepicker'), {});
        });
    </script>
  </body>
</html>