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
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            M.Sidenav.init(document.querySelectorAll('.sidenav'), {});
            M.Materialbox.init(document.querySelectorAll('.materialboxed'), {});
            M.FormSelect.init(document.querySelectorAll('select'), {});
            M.Datepicker.init(document.querySelectorAll('.datepicker'), {});
        });
    </script>
  </body>
</html>