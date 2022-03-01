<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 3 ) {
  header('location: ../../index.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title>GRUPO DE TRABAJO </title>
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
  <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="../componentes/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../componentes/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="../componentes/css/admin.css" rel="stylesheet" type="text/css" />
  <link href="../componentes/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
  <link href="../componentes/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link href="../componentes/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet" />

</head>

<body class="dark_theme  fixed_header left_nav_fixed">
  <div class="wrapper">

    <div class="header_bar">

      <div class="brand">

        <div class="logo" style="display:block"><span class="theme_color">DASHBOARD</span> </div>
      </div>
      <!--\\\\\\\ brand end \\\\\\-->
      <div class="header_top_bar">
        <!--\\\\\\\ header top bar start \\\\\\-->
        <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
        <div class="top_left">

        </div>

        <div class="top_right_bar">
          <div class="top_right">
            <div class="top_right_menu">
              <ul>
                <li class="dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"> Notificaciones <span class="badge badge color_2">
                      <?php
                      include("../../model/conexion.php");
                      $datos = mysqli_query($con, "select * from asignaciones where id_empleado ='" . $_SESSION['correo'] . "' ");
                      $numero = mysqli_num_rows($datos);
                      echo $numero;
                      ?>
                    </span> </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px" src="../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['usuario']); ?>

                <ul class="dropdown-menu">
                  <div class="top_pointer"></div>


                  <li> <a href="usuarios/editar.php?id=<?php echo ucfirst($_SESSION['idusuario']); ?>"><i class="fa fa-cog"></i> Configuracion </a></li>
                  <li> <a href="../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
                </ul>
          </div>


        </div>
      </div>

    </div>

    <div class="inner">
      <div class="left_nav">

        <img src="../../img/logo joaking curvasblanco.png" width="90%" alt="" />


        <div class="left_nav_slidebar">
          <ul>


            <li> <a href="../clientes/index.php"> <i class="fa fa-tasks"></i>SOLICITUDES

                <span class="plus"><i class="fa fa-plus"></i></span></a>

            </li>


            <li class="left_nav_active theme_border"> <a href="index2.php"> <i class="fa fa-bookmark"></i>
                BIBLIOTECA

                </span> <span class="plus"><i class="fa fa-plus"></i></span></a>

            </li>




          </ul>
          <script language=javascript>
            function finestraSecundaria(url) {
              window.open(url, "CHAT SISTEMA DPOFUNDATION", "width=900, height=600")
            }
          </script>



          <a class="btn " href="javascript:finestraSecundaria('../chat/')">

            <img src="../../img/icono_mens.png" width="55" />

            Iniciar chat </a>

          <span class="badge badge color_2">
            <?php



            $datos2 = mysqli_query($con, "SELECT * from chat where reciever_userid ='" . $_SESSION['idusuario'] . "' and status = '1'");


            $numero = mysqli_num_rows($datos2);

            echo $numero;

            ?>
          </span>



        </div>
      </div>
      <!--\\\\\\\left_nav end \\\\\\-->
      <div class="contentpanel">
        <!--\\\\\\\ contentpanel start\\\\\\-->
        <div class="pull-left breadcrumb_admin clear_both">
          <div class="pull-left page_title theme_color">
            <h1 style="color : #182d4c">BIBLIOTECA -<?php echo strtoupper($_SESSION['departamento']); ?>

              </a>
            </h1>

          </div>

        </div>
        <div class="container clear_both padding_fix">
          <!--\\\\\\\ container  start \\\\\\-->

          <div class="row">
            <div class="col-md-12">
              <div class="block-web">

                <div class="porlets-content">

                  <?php
                  include("../../model/function.php");

                  $sql = "select * from departamentos";
                  $result = db_query($sql);
                  while ($row2 = mysqli_fetch_object($result)) {
                  ?>

                    <?php
                    if ($_SESSION['departamento'] == "") {
                      echo "no existen dependencias";
                    } else {

                      echo "si existe ";
                    };

                    if (stristr($_SESSION['departamento'], $row2->nombre_depa)) {

                      echo '
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
	  
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#' . $row2->nombre_depa . '" aria-expanded="true" aria-controls="collapseOne">
          ' . $row2->nombre_depa . '
        </a>
      </h4>
    </div>
    <div id="' . $row2->nombre_depa . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
       
	    <iframe  src="../biblioteca/' . $row2->nombre_depa . '/index.html" width="95%" scrolling="no" frameborder="0" height="1200px;"></iframe>
	   
	   
	   
      </div>
    </div>
  </div>
			
	
			<br>';
                    } else {
                    }

                    ?>


                    </tr>
                  <?php

                  }

                  ?>


                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="../componentes/js/jquery-2.1.0.js"></script>
  <script src="../componentes/js/bootstrap.min.js"></script>
  <script src="../componentes/js/common-script.js"></script>
  <script src="../componentes/js/jquery.slimscroll.min.js"></script>
  <script src="../componentes/plugins/data-tables/jquery.dataTables.js"></script>
  <script src="../componentes/plugins/data-tables/DT_bootstrap.js"></script>
  <script src="../componentes/plugins/data-tables/dynamic_table_init.js"></script>
  <script src="../componentes/plugins/edit-table/edit-table.js"></script>
  <script>
    jQuery(document).ready(function() {
      EditableTable.init();
    });
  </script>
  <script src="../componentes/js/jPushMenu.js"></script>
  <script src="../componentes/js/side-chats.js"></script>
</body>

</html>