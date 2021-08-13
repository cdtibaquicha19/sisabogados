<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
	header('location: ../../../index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMINISTRADOR</title>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
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
		select_id('casos', 'idcaso', $id);
		$inicio = $row->fecha_creacion;
		$fin =  $row->end;
		?>
		<div class="inner">
			<div class="left_nav">
				<img src="../../../img/logo joaking curvasblanco.png" width="90%" alt="" />
				<div class="left_nav_slidebar">
					<ul>
						<li><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO
								<span class="plus"><i class="fa fa-plus"></i></span> </a>
						</li>

						<li class="left_nav_active theme_border"> <a href="index.php"> <i class="fa fa-tasks"></i>SOLICITUDES
								<span class="left_nav_pointer"></span>
								<span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li> <a href="../usuarios/index.php"> <i class="fa fa-tasks"></i>
								USUARIOS
								</span></span><span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li>
							<br>
							<div class="alert alert-warning" role="alert">
								<strong>Ultima modificacion </strong><br />
								<?php echo $row->actualizacion; ?>
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
						</h1> Editar
					</div>
				</div>
				<div class="container clear_both padding_fix">
					<!--\\\\\\\ container  start \\\\\\-->
					<form action="" method="post">
						<div class="row">
							<div class="col-md-12">

								<div class="block-web">
									<button style="float: right; margin-top: -10px;" class="btn btn-info " type="submit" name="submit">
										Actualizar
									</button>

					</form>
					<!-- Button trigger modal -->
					<button style="float: right; margin-top: -10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
						Cargar documentos
					</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Cargar documentos a Solicitud :  <?php echo $row->idcaso; ?></h4>
								</div>
								<div class="modal-body">


									<h5>Usuario: <strong><?php echo $_SESSION['usuario'];  ?> </strong></h5>
									<?php

									if (!empty($_POST['submit2'])) {

										if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {

											$ruta = "../../carga/upload/";
											$nombrefinal = trim($_FILES['fichero']['name']);

											$upload = $ruta . $nombrefinal;
											if (move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) {
												$fecha = date(" d-m-Y h:i:s ");
												$nombre  = $_POST["nombre"];
												$description  = $_POST["description"];

												$query = "INSERT INTO archivos (idproyecto,idempleado,ruta,tipo,size) 
    VALUES ('$id','" . $_SESSION['usuario'] . $fecha . "','" . $nombrefinal . "','" . $_FILES['fichero']['type'] . "','" . $_FILES['fichero']['size'] . "')";

												db_query($query);
											}
											echo '<script type="application/javascript">
	
	swal("Cargado correctamente","","success")
.then((value) => {
location = location;
});

	</script>
	';
										}
									}
									?>

									<form action=" " method="post" enctype="multipart/form-data">
										Seleccione archivo:

										<input class="form-control" name="fichero" type="file" size="150" maxlength="150">
										<input type="hidden" class="form-control" name="nombre" value="<?php echo $row->id; ?>" size="70" maxlength="70">
										<input type="hidden" class="form-control" value="<?php echo $row->idcaso; ?> " name="description" size="100" maxlength="250">
										<br><br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
									<input class="btn-primary btn" name="submit2" type="submit" value="Subir archivo">
									</form>
								</div>
							</div>
						</div>
					</div>
					<br>
					<br>
					<div class="header">

						<h3 class="content-header">Editar - Solicitud  <?php echo $row->idcaso; ?> Estado : <?php echo $row->status; ?></h3>

					</div>
					<div class="porlets-content">

						<?php
						date_default_timezone_set('America/Bogota');
						$actualizacion = date("Y-m-d/H:m:s ") . $_SESSION['usuario'];
						if (isset($_POST['submit'])) {
							$field = array(
								"title" => $_POST['nombre'],
								"description" => $_POST['descripcion'],
								"actualizado" => $actualizacion

							);

							$tbl = "calendar";
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
							$actividad = $_POST['actividad'];
							//$idempleado = $_POST['id_empleado'] ;
							$fechaini = $_POST['fecha'];
							$fechafin = $_POST['fecha_fin'];
							$observaciones = $_POST['observaciones'];
							$proyecto = $row->title;
							$correos = implode(', ', $_POST['id_empleado']);
							$query =  "INSERT INTO asignaciones (id , asignacion , id_proyecto ,nombre_proyecto, id_empleado, fecha, feha_fin, observaciones, estado) VALUES (NULL, '$actividad','$id','$proyecto','$correos','$fechaini', '$fechafin', '$observaciones', 'asignado');";
							if (db_query($query)) {

								$para      = $correos;
								$titulo    = 'Sistema  notificacion';
								$mensaje   = 'Se ha asignado una nueva actividad : ' . $proyecto . ' ' . $observaciones . ' con fecha ' . $fechafin . " como plazo maximo de entrega ";
								$cabeceras = 'From: info@bihaosas.co' . "\r\n" .
									'Reply-To: soporte@multiaccess.co' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
								mail($para, $titulo, $mensaje, $cabeceras);
								header('Location: ' . $_SERVER['HTTP_REFERER']);
								echo '<script type="application/javascript">
	
swal("Se ha asignado correctamente  : ","se envio correo a ' . $correos . '","success")
.then((value) => {
location = location;
});

	</script>
	';
							} else {
								echo '<script type="application/javascript">
	
	swal("No fue crear la asignacion  ","","error")
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
								<p ><?php echo $row->nombre; ?></p>
								<br />
								<strong><span>
										<h5>Correo</h5>
									</span></strong>
								<p><?php echo $row->correo; ?></p>
								<strong><span>
										<h5>Direccion</h5>
									</span></strong>
								<p><?php echo $row->direccion; ?></p>
							</div>
							<div class="col-md-3">
							<strong><span>
										<h5>Telefono</h5>
									</span></strong>
								<p><?php echo $row->telefono; ?></p>
								<strong><span>
										<h5>Fecha de creacion </h5>
									</span></strong>
								<p><?php echo $row->fecha_creacion; ?></p>
					

								
							</div>
							<div class="col-md-3">
							<strong><span>
										<h5>Descripcion caso </h5>
									</span></strong>
								<p ><?php echo $row->descripcion; ?></p>
								<br />


								
							</div>
							</div>
						</div>
						<br />
						<br />
						<div class="header">
							<!-- Button trigger modal -->
							<button style="float: right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5">
								Crear asignacion </button>
							<!-- Modal -->
							<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Creacion de Asignaciones </h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<form class="form" action=" " method="post">

													<div class="col-md-12">
														<BR />
														<p>Listado abogados Diponibles / Seleccione (ctrl + click para seleccion multiple) </p>
														<select name="id_empleado[]" class="form-control" size="7" multiple="multiple">
															<?php
															$sql = "select * from usuarios where tipo ='3' ";
															$result = db_query($sql);

															while ($row = mysqli_fetch_object($result)) {
															?>
																<option value="<?php echo $row->correo; ?>"><?php echo $row->nombre; ?></option>
															<?php } ?>
														</select>
														<br />
													</div>
													<br />
													<div class="col-md-6">
														<p>Fecha inicio </p>
														<input class="form-control" type="date" name="fecha" />
													</div>
													<div class="col-md-6">

														<p>Fecha fin </p>
														<input class="form-control" type="date" name="fecha_fin" />

													</div>
													<div class="col-md-12">

														<p>Observaciones </p>
														<textarea class="form-control" type="text" name="observaciones"></textarea>

													</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
											<input class="btn-primary btn" name="submit4" type="submit" value="Crear asignacion">

											</form>
										</div>
									</div>
								</div>
							</div>

							<br />

							<br />

							<div class="header">

								<h3 class="content-header">Asignaciones </h3>
							</div>

							<BR>

							<div class="table-responsive">
								<table class="display table table-bordered table-striped" id="dynamic-table2">
									<thead>
										<tr>
											<th>ASIGNACION </th>
											<th>ENCARGADO</th>
											<th>INICIO</th>
											<th>FIN</th>
											<th>OPCIONES</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "select * from asignaciones where id_proyecto = '$id' ";
										$result = db_query($sql);
										while ($row = mysqli_fetch_object($result)) {
										?>
											<tr>
												<td><?php echo $row->observaciones; ?></td>
												<td width="25%"><?php echo $row->id_empleado; ?></td>
												<td><?php echo $row->fecha; ?></td>
												<td><?php echo $row->feha_fin; ?></td>
												<td>

													<a title="Eliminar documento " class="btn btn-danger" target="_blank" href="borrar_doc.php?id=<?php echo $row->id; ?>"> X </a>



												</td>

											</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>


							<br>
							<br>
							<div class="header">
								<h3 class="content-header">Carga de documentos </h3>
							</div>
							<div class="table-responsive">
								<table class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
										<tr>
											<th>NOMBRE </th>
											<th>CARGADO POR</th>
											<th>OPCIONES</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "select * from archivos where idproyecto = '$id' ";
										$result = db_query($sql);
										while ($row = mysqli_fetch_object($result)) {
										?>
											<tr>
												<td><strong><?php echo $row->ruta; ?></strong></td>
												<td width="25%"><?php echo $row->idempleado; ?></td>
												<td>
													<a class="btn btn-default" target="_blank" href="../../carga/upload/<?php echo $row->ruta; ?>"> Ver documento </a>
													<a title="Eliminar documento " class="btn btn-danger" target="_blank" href="borrar_doc.php?id=<?php echo $row->id; ?>"> X </a>
												</td>
											</tr>
										<?php } ?>
									</tbody>

								</table>
							</div>
							<!--/table-responsive-->
						</div>
					</div>
					<br />
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