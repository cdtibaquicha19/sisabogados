<?php
/*
    En ocasiones el usuario puede volver al login
    aun si ya existe una sesion iniciada, lo correcto
    es no mostrar otra ves el login sino redireccionarlo
    a su pagina principal mientras exista una sesion entonces
    creamos un archivo que controle el redireccionamiento
  */
session_start();

// isset verifica si existe una variable o eso creo xd
if (isset($_SESSION['id'])) {
  header('location: controller/redirec.php');
}

?>


<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SISTEMA BUFETE DE ABOGADOS HS</title>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
  <link rel="stylesheet" href="css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!--
      Las clases que utilizo en los divs son propias de Bootstrap
      si no tienes conocimiento de este framework puedes consultar la documentacion en
      https://v4-alpha.getbootstrap.com/getting-started/introduction/
    -->


  <!-- Formulario Login -->
  <div class="container">
    <div style="margin-top: 150px;" class="row">
      <div class=" col-md-6 " >
      <img width="100%" class="img-responsive" src="img/logo joaking curvas.png">
      <legend class="center">Sistema gestion V 3.0</legend>

      <img width="100%" class="img-responsive" src="img/login.png">


      </div>
      <div style="background-color: #182D4C; padding: 30px; border-radius: 15px; margin-top: 170px;" class=" col-md-6 ">
        <!-- Margen superior (css personalizado )-->

        <!-- Estructura del formulario -->
        <fieldset>

          

          <div class="alert alert-info" role="alert">Notas de version V 3.0

            <ul>

              <li>Correccion de errores </li>

            </ul>


          </div>
          <!-- Caja de texto para usuario -->
          <label class="sr-only" for="user">Usuario</label>
          <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-user"></i></div>
            <input type="text" class="form-control" id="user" placeholder="Ingresa tu usuario">
          </div>

          <!-- Div espaciador -->
          <div class="spacing-2"></div>

          <!-- Caja de texto para la clave-->
          <label class="sr-only" for="clave">Contraseña</label>
          <div class="input-group">
            <div class="input-group-addon">
              <a href="#" id="show_password" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span>
              </a>
            </div>

            <input type="password" autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu contraseña"></input>

          </div>

          <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
          <div class="row" id="load" hidden="hidden">
            <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
              <img src="img/load.gif" width="100%" alt="">
            </div>
            <div class="col-xs-12 center text-accent">
              <span> Validando información... </span>
            </div>
          </div>
          <!-- Fin load -->

          <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
              <div class="spacing-2"></div>
              <button type="button" class="btn btn-primary btn-lg " name="button" id="login">Iniciar sesion</button>
<a href="registro.php" type="button" class="btn btn-default btn-lg " name="button" >Registrarse</a>
            </div>
          </div>

          <section class="text-accent center">
            <div class="spacing-2"></div>


          </section>

        </fieldset>
      </div>
    </div>
  </div>



  <script type="text/javascript">
    function mostrarPassword() {
      var cambio = document.getElementById("clave");
      if (cambio.type == "password") {
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    $(document).ready(function() {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function() {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>

  <script type="text/javascript">
    function mostrarPassword() {
      var cambio = document.getElementById("clave");
      if (cambio.type == "password") {
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }

    }

    $(document).ready(function() {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function() {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>

  <!-- / Final Formulario login -->

  <!-- Jquery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- SweetAlert js -->
  <script src="js/sweetalert.min.js"></script>
  <!-- Js personalizado -->
  <script src="js/operaciones.js"></script>
</body>

</html>