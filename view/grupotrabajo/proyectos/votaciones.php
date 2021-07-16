<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
	header('location: ../../../index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMINISTRADOR</title>

	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
	<link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
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
											$datos = mysqli_query($con, "SELECT * from proyectos  ");
											$numero = mysqli_num_rows($datos);
											echo $numero;
											?>
										</span> </a>
								</li>
							</ul>
						</div>
					</div>
					<div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px" src="../../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['usuario']); ?>

								<ul class="dropdown-menu">
									<div class="top_pointer"></div>
									<li> <a href="#"><i class="fa fa-cog"></i> Configuracion </a></li>
									<li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
								</ul>
					</div>
				</div>
			</div>

		</div>
		<?php
		include("../../../model/function.php");
		$id = $_GET['id'];
		select_id('proyectos', 'id', $id);
		$inicio = $row->inicio;
		$fin =  $row->fin;
		?>
		<div class="inner">
			<div class="left_nav">
				<img src="../../../img/logo joaking curvasblanco.png" width="90%" alt="" />
				<div class="left_nav_slidebar">
					<ul>
						<li><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO
								<span class="plus"><i class="fa fa-plus"></i></span> </a>
						</li>

						<li class="left_nav_active theme_border"> <a href="index.php"> <i class="fa fa-tasks"></i>PROYECTOS
								<span class="left_nav_pointer"></span>
								<span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li> <a href="../usuarios/index.php"> <i class="fa fa-tasks"></i>
								USUARIOS
								</span></span><span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li> <a href="../../biblioteca/index.php"> <i class="fa fa-bookmark"></i>
								BIBLIOTECA

								</span> <span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li> <a href="../dependencia/index.php"> <i class="fa fa-map-o"></i>
								DEPENDENCIAS
								<span class="badge badge color_2" style="float: right">

									Nuevo+
								</span>
							</a>

						</li>


						<li>
							<div class="alert alert-warning" role="alert">
								<strong>Ultima modificacion </strong><br />
								<?php echo $row->actualizado; ?>
							</div>
						</li>
					</ul>
				</div>
			</div>

			<!--\\\\\\\left_nav end \\\\\\-->
			<div class="contentpanel">
				<!--\\\\\\\ contentpanel start\\\\\\-->
				<div class="pull-left breadcrumb_admin clear_both">
					<div class="pull-left page_title theme_color">
						<h1><a href="index.php">PROYECTOS</a>
						</h1> Votar
					</div>
				</div>
				<div class="container clear_both padding_fix">
					<!--\\\\\\\ container  start \\\\\\-->
					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">

								<div class="block-web">
									<button style="float: right; margin-top: -10px;" class="btn btn-info " type="submit" name="submit4">
										Generar votacion
									</button>

					</form>


					<div class="header">

						<h3 class="content-header">Votar - <?php echo $row->nombre; ?></h3>

					</div>
					<div class="porlets-content">
						<?php
						date_default_timezone_set('America/Bogota');
						$actualizacion = date("Y-m-d/H:m:s ") . $_SESSION['usuario'];
						if (isset($_POST['submit'])) {
							$field = array(
								"nombre" => $_POST['nombre'],
								"descripcion" => $_POST['descripcion'],
								"actualizado" => $actualizacion
							);
							$tbl = "proyectos";
							edit($tbl, $field, 'id', $id);
							echo '<script type="application/javascript">
	
	swal("Actualizado correctamente","","success")
.then((value) => {
location.href=" ";
 
});

	</script>
	';
						}
						if (isset($_POST['submit4'])) {

							$sql = "select * from usuarios";
							$result = db_query($sql);
							$numero = mysqli_num_rows($result);


							$nombre_proyecto = $_POST['nombre'];
							$descripcion = $_POST['descripcion'];
							$fecha_fin = $_POST['descripcion'];
							$correos = $_POST['correos'];
							$creado = $_SESSION['correo'];


							$field = array("votacion" => "si");
							$tbl = "proyectos";
							edit($tbl, $field, 'id', $id);
							$query =  "INSERT INTO votaciones (id_votacion , nombre_proyecto , descripcion ,fecha_final_proyecto,correos,total,generado_por) VALUES (NULL, '$nombre_proyecto','$descripcion','$fecha_fin','$correos','$numero','$creado')";


							if (db_query($query)) {

								$para      = $correos;
								$titulo    = 'Sistema  notificacion dpocolombia ';
								$mensaje   = 'Se ha puesto a votacion un proyecto ' . $nombre_proyecto . '
  https://sistema.dpocolombia.org
';
								$cabeceras = 'From: info@dpocolombia' . "\r\n" .
									'Reply-To: disenoweb@mandragoraproducciones.com.co' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
								mail($para, $titulo, $mensaje, $cabeceras);
								header('Location: ' . $_SERVER['HTTP_REFERER']);
								echo '<script type="application/javascript">
swal("Se ha asignado correctamente  : ","se envio correo a ' . $correos . '","success")
.then((value) => {
location.href="../proyectos";
});
	</script>
	';
							} else {
								echo '<script type="application/javascript">
	swal("No fue posible crear la votacion  ","","error")
.then((value) => {
location = location;
});

	</script>
	';
							}
						}
						?>

						<div class="row">
							<div class="col-md-3">
								<strong><span>
										<h5>Nombre</h5>
									</span></strong>
								<input class="form-control " type="text" value="<?php echo $row->nombre; ?>" name="nombre" />
								<br />
								<strong><span>
										<h5>Fecha inicio</h5>
									</span></strong>
								<h3><?php echo $row->inicio; ?></h3>
							</div>
							<div class="col-md-9">
								<strong><span>
										<h5>Descripcion</h5>
									</span></strong>
								<input class="form-control " type="text" value="<?php echo $row->descripcion; ?>" name="descripcion" />
								<br />
								<strong><span>
										<h5>Fecha fin</h5>
									</span></strong>
								<h3><?php echo $row->fin; ?></h3>

							</div>

						</div>
						<br>
						<br>
					</div>
					<div class="header">
						<?php
						$sql = "select * from usuarios";
						$result = db_query($sql);
						$result2 = db_query($sql);
						$numero = mysqli_num_rows($result);
						?>
						<h3 class="content-header">Asignacion de usuarios Usuarios <?php echo $numero ?>
						</h3>
					</div>
					<input type="hidden" name="correos" value="<?php while ($row = mysqli_fetch_object($result)) {
																	echo $row->correo . ",";
																} ?>" />
					<br>
					<?php while ($row2 = mysqli_fetch_object($result2)) {
						echo $row2->nombre . "<br>";
					} ?>

					<br>

				</div>
			</div>
			</form>

		</div>
		<!--/porlets-content-->
	</div>
	<!--/block-web-->
	</div>
	<!--/col-md-12-->
	</div>
	<!--/row-->
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