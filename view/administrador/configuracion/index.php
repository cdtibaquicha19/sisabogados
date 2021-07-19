<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
  header('location: ../../../index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="euc-jp">

  <title>ADMINISTRADOR</title>
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="../../componentes/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../../componentes/css/animate.css" rel="stylesheet" type="text/css" />
  <link href="../../componentes/css/admin.css" rel="stylesheet" type="text/css" />
  <link href="../../componentes/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
  <link href="../../componentes/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link href="../../componentes/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="dark_theme  fixed_header left_nav_fixed">
  <div class="wrapper">

    <div class="header_bar">

      <div class="brand">

        <div class="logo" style="display:block"><span class="theme_color">ADMINISTRADOR</span> </div>
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
                      include("../../../model/conexion.php");
                      $datos = mysqli_query($con, "SELECT * from votaciones ");
                      $numero = mysqli_num_rows($datos);
                      echo $numero;
                      ?>
                    </span> </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php
                    if ($numero > 0) {
                      while ($row = mysqli_fetch_object($datos)) {

                        echo '<li><a href="../proyectos/votar.php?id=' . $row->id_votacion . '">Proyecto a votacion ' . $row->nombre_proyecto . ' </a></li>';
                      }
                    } else {
                      echo '<li><a href="#">Sin notificaciones  </a></li>';
                    }

                    ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px" src="../../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['usuario']); ?>

                <ul class="dropdown-menu">
                  <div class="top_pointer"></div>


                  <li> <a href="editar.php?id=<?php echo ucfirst($_SESSION['idusuario']); ?>"><i class="fa fa-cog"></i> Configuracion </a></li>
                  <li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
                </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="inner">
      <div class="left_nav">
        <img src="../../../img/logo joaking curvasblanco.png" width="90%" alt="" />
        <div class="left_nav_slidebar">
          <ul>
            <li><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO <span class="plus"><i class="fa fa-plus"></i></span> </a>

            </li>

            <li> <a href="../proyectos/index.php"> <i class="fa fa-tasks"></i>SOLICITUDES

                <span class="plus"><i class="fa fa-plus"></i></span></a>

            </li>
            <li> <a href="#"> <i class="fa fa-user"></i>
                USUARIOS
                <span class="plus"><i class="fa fa-plus">
                  </i></span>
              </a>

            </li>

            <li> <a href="../../biblioteca/index.php"> <i class="fa fa-bookmark"></i>
                BIBLIOTECA <span class="plus"><i class="fa fa-plus"></i></span></a>

            </li>

            <li class="left_nav_active theme_border"> <a href="../configuracion/index.php"> <i class="fa fa-gear"></i>
                CONFIGURACION
                </span>


                <span class="left_nav_pointer"></span>

              </a>


            </li>
          </ul>
          <script language=javascript>
            function finestraSecundaria(url) {
              window.open(url, "CHAT SISTEMA DPOFUNDATION", "width=900, height=600")
            }
          </script>



          <a class="btn " href="javascript:finestraSecundaria('https://sistema.bufeteabogadoshs.com/view/chat/')">

            <img src="../../../img/icono_mens.png" width="55" />

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
            <h1 style="color: #182d4c;">CONFIGURACION </h1>

          </div>

        </div>
        <div class="container clear_both padding_fix">


          <div class="row">
            <div class="col-md-12">
              <div class="block-web">

                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Biblioteca</a></li>

                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">

                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Personalizacion <a style="float:right" class="btn btn-default "> Modificar valores </a> </div>
                        <div class="panel-body">


                          <div class="row">
                            <div class="col-md-4">Nombre Principal : <BR />
                              <strong>sistema.bufeteabogadoshs.com </strong>


                              <BR /><BR>
                              <strong>Departamentos :</strong>

                              <div class="porlets-content">

                                <?php
                                include("../../../model/function.php");

                                $sql = "select * from departamentos";
                                $result = db_query($sql);
                                while ($row = mysqli_fetch_object($result)) {
                                ?>
                                  <table class="table table-bordered table-hover">
                                    <tr>
                                      <td><strong>
                                          <?php

                                          if ($row->status == 1) {

                                            echo $row->nombre_depa;
                                          } else {

                                            echo $row->nombre_depa . " (inactivo) ";
                                          }

                                          ?></strong>
                                        <a style="float:right" class="btn btn-danger" href="borrar.php?id=<?php echo $row->id_departamento; ?>">X</a>
                                      </td>

                                    </tr>
                                  <?php

                                }

                                  ?>


                                  </table>

                                  <!-- Button trigger modal -->
                                  <button style="float:right" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                    Agregar <i class="fa fa-plus"></i>
                                  </button>



                              </div>


                            </div>
                            <div class="col-md-4">Tema : <BR />
                              <strong> Dark </strong>

                            </div>
                            <div class="col-md-4">Logo principal :

                              <br />
                              <img style="float:right" src="../../../img/logo joaking curvasblanco.png" width="30%" alt="" />
                            </div>


                          </div>

                        </div>
                      </div>

                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Informacion </div>
                        <div class="panel-body">
                          <p>
                            <iframe src="informacion.php" width="100%" height="500px" frameborder="0"></iframe>



                          </p>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">.2.</div>

                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Agregar departamento </h4>
        </div>
        <div class="modal-body">
          <?php




          if (!empty($_POST['submit'])) {


            $field = array(
              "nombre_depa" => $_POST['nombre'],
              "observaciones" => $_POST['observaciones'],
              "status" => 1
            );
            $tbl = "departamentos";
            $nombre = "../../biblioteca/" . $_POST['nombre'];
            $srcfile = "../../biblioteca/base";


            mkdir($nombre, 0777, true);
            copiar($srcfile, $nombre);
            if (insert($tbl, $field)) {







              echo '<script type="application/javascript">
	
swal("Se ha creado el departamento : ","' . $nombre . '","success")
.then((value) => {
location = location;
});

	</script>
	';
            } else {
              echo '<script type="application/javascript">
	
	swal("No fue posible crear el departamento ","' . $nombre . '","error")
.then((value) => {
location = location;
});

	</script>
	';
            }
          }
          ?>


          <form action=" " method="post">


            <div class="form-group">
              <label for="inputEmail3" class="col-sm-12 control-label">Nombres del departamento </label>
              <div class="col-sm-12">
                <input type="text" required="required" class="form-control" name="nombre" placeholder="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-12 control-label"> Observaciones </label>
              <div class="col-sm-12">
                <input type="text" class="form-control" name="observaciones" placeholder="">
              </div>
            </div>


            <BR />
            <BR />
            <BR />
            <BR />

            <BR />
            <BR />
            <BR />
            <BR />


            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <input class="btn-primary btn" name="submit" type="submit" value="Crear departamento">

          </form>

        </div>
      </div>
    </div>
  </div>


  <script src="../../componentes/js/jquery-2.1.0.js"></script>
  <script src="../../componentes/js/bootstrap.min.js"></script>
  <script src="../../componentes/js/common-script.js"></script>
  <script src="../../componentes/js/jquery.slimscroll.min.js"></script>
  <script src="../../componentes/plugins/data-tables/jquery.dataTables.js"></script>
  <script src="../../componentes/plugins/data-tables/DT_bootstrap.js"></script>
  <script src="../../componentes/plugins/data-tables/dynamic_table_init.js"></script>
  <script src="../../componentes/plugins/edit-table/edit-table.js"></script>
  <script>
    jQuery(document).ready(function() {
      EditableTable.init();
    });
  </script>
  <script src="../../componentes/js/jPushMenu.js"></script>
  <script src="../../componentes/js/side-chats.js"></script>
</body>

</html>