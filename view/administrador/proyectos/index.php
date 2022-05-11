<?php
include("../../../model/function.php");
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1) {
	header('location: ../../../index.php');
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMINISTRADOR</title>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
	<link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="../../componentes/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../../componentes/css/animate.css" rel="stylesheet" type="text/css" />
	<link href="../../componentes/css/admin.css" rel="stylesheet" type="text/css" />
	<link href="../../componentes/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
	<link href="../../componentes/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet" />
	<link href="../../componentes/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet" />
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
								<li class="dropdown">
									<a href="javascript:void(0);" data-toggle="dropdown"> Notificaciones
										<span class="badge badge color_2">
											<?php
											$datos = mysqli_query($con, "SELECT * from votaciones");
											$numero = mysqli_num_rows($datos);
											$datos2 = mysqli_query($con, "SELECT * from asignaciones where id_empleado ='" . $_SESSION['correo'] . "'");
											$numero2 = mysqli_num_rows($datos2);
											echo $numero + $numero2;
											?>
										</span>
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown">
										<?php
										if ($numero > 0) {

											$sql = "select * from votaciones ";
											$result = db_query($sql);
											while ($row = mysqli_fetch_object($result)) {

												echo '<li><a href="votar.php?id=' . $row->id_votacion . '">Proyecto a votacion ' . $row->nombre_proyecto . ' </a></li>';
											}
										} else {
											echo '<li><a href="#">Sin notificaciones  </a></li>';
										}
										?>
										<?php
										if ($numero2 > 0) {

											$sql = "SELECT * from asignaciones where id_empleado ='" . $_SESSION['correo'] . "'";
											$result = db_query($sql);
											while ($row = mysqli_fetch_object($result)) {

												echo '<li><a href="editar.php?id=' . $row->id_proyecto . '">Asignacion: ' . $row->nombre_proyecto . ' </a></li>';
											}
										} else {
											
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


									<li> <a href="../usuarios/editar.php?id=<?php echo ucfirst($_SESSION['idusuario']); ?>"><i class="fa fa-cog"></i> Configuracion </a>
									</li>
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
						<li class="left_nav_active theme_border"> <a href=""> <i class="fa fa-tasks"></i>SOLICITUDES
								<span class="left_nav_pointer"></span>
							</a>
						</li>
						<li> <a href="../usuarios/index.php"> <i class="fa fa-user"></i>
								USUARIOS
								</span></span><span class="plus"><i class="fa fa-plus"></i></span></a>
						</li>
						<li> <a href="../../biblioteca/index.php"> <i class="fa fa-bookmark"></i>
								BIBLIOTECA
								</span> <span class="plus"><i class="fa fa-plus"></i></span></a>
						</li>
						<li> <a href="../configuracion/index.php"> <i class="fa fa-gear"></i>
								CONFIGURACION
								</span> <span class="plus"><i class="fa fa-plus"></i></span>
							</a>
						</li>
					</ul>
					<script language=javascript>
						function finestraSecundaria(url) {
							window.open(url, "CHAT SISTEMA", "width=900, height=600")
						}
					</script>
					<a class="btn" href="javascript:finestraSecundaria('/view/chat/')">

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
						<h1 style="color:#182d4c ;">SOLICITUDES</h1>
						<button style="background-color: #182d4c;" type="button" class="btn-LG btn-primary" data-toggle="modal" data-target="#myModal">
							Crear nuevo caso <strong>+</strong>
						</button>
					</div>
				</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="modal-header" style="background-color: #182d4c; color:white;">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">PLANTEAR CASO </h4>
												</div>
												<div class="modal-body">

													<?php






													if (!empty($_POST['submit2'])) {
														$fecha = date("d-m-Y h:i:s A");
														$psswd = substr(md5(microtime()), 1, 10);

														$valor = $_SESSION['creado_por'];
														$field = array(
															"nombre" => $_POST['nombre'],
															"correo" => $_POST['id_empleado'],
															"telefono" => $_POST['telefono'],
															"direccion" => $_POST['direccion'],
															"descripcion" => $_POST['caso'],
															"area" => $_POST['area'],
															"status" => 'activo',
															"fecha_creacion" => $fecha,
															"actualizacion" => 'Solicitud en Proceso',
														);
														$tbl = "casos";


														if (insert($tbl, $field)) {
															echo $sql;

															$to = $_SESSION['correo'];
															$subject = "Creacion correcta de caso ";
															$headers = "MIME-Version: 1.0" . "\r\n";
															$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

															$message = "<html>
															<head>
																<title>HTML</title>
																</head>
																<body>
																<img src='https://sistema.bufeteabogadoshs.com/img/logo%20joaking%20curvas.png' width='350' /> 
																<p>Los datos de acceso son:<BR>
																URL de acceso <a href='https://sistema.bufeteabogadoshs.com'>sistema.bufeteabogadoshs.comm</a>
																<br>
																</p>
																</body>
																</html>";

															mail($to, $subject, $message, $headers);
															echo '<script type="application/javascript">
																swal("Se ha creado el caso : ","' . $nombre . '","success")
																.then((value) => {
																location = location;
																});

																	</script>
																';
														} else {
															echo '<script type="application/javascript">
																	
																			swal("No fue posible crear el caso ","' . $nombre . '","error")
																			.then((value) => {
																			location = location;
																			});

																	</script>
																	';
														}
													}
													?>
													<form action=" " method="post">
														<div class="row">
															<div class="col-md-6">

																<p class="alert alert-info">Diligencia el siguiente formulario, para la creacion de tu caso el cual sera atendido por uno de nuestros especializastas.
																	los campos marcados (*) son obligatorios. <br>
																	<a href="#"> Proteccion de datos personales </a>
																</p>
																<img class="img-responsive" src="../../../img/form1.png" />
															</div>
															<div class="col-md-6">
															<div class="col-md-12">
														<BR />
														<p>Listado abogados-clientes Diponibles / Seleccione (ctrl + click para seleccion multiple) </p>
														<select name="id_empleado" class="form-control" size="7" multiple="multiple">
															<?php
															$sql = "select * from usuarios where tipo ='2' ";
															$result = db_query($sql);

															while ($row = mysqli_fetch_object($result)) {
															?>
																<option value="<?php echo $row->correo; ?>"><?php echo $row->nombre; ?></option>
															<?php } ?>
														</select>
														<br />
													</div>
																<div class="form-group">
																	<label style="color: #182d4c;" for="inputEmail3" class="col-sm-12 control-label"> <b>NOMBRE COMPLETO</b> </label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="nombre" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label style="color: #182d4c;" for="inputEmail3" class="col-sm-12 control-label"> <b>TELEFONO</b></label>
																	<div class="col-sm-12">
																		<input type="tel" class="form-control" name="telefono" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label style="color: #182d4c;" for="inputEmail3" class="col-sm-12 control-label"><b>DIRECCION</b></label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="direccion" placeholder="">
																	</div>
																</div>
																<div class="form-group ">
																	<label style="color: #182d4c; text-transform: uppercase;" for="inputEmail3" class="col-sm-12 control-label"> <b>la area especializada para tu caso *</b> </label>
																	<div class="col-sm-12">

																		<select name="area" class="form-control">
																			<option>Derecho Civil</option>
																			<option>Derecho de Familia</option>
																			<option>Derecho Penal</option>
																			<option>Derecho Laboral </option>
																			<option>Derecho Administrativo</option>
																		</select>
																	</div>
																</div>
																<div class="form-group">
																	<label style="color: #182d4c;  text-transform: uppercase;" for="inputEmail3" class="col-sm-12 control-label"><b>Describe tu caso / Solicitud *</b> </label>
																	<div class="col-sm-12">
																		<textarea rows="10" class="form-control" name="caso" placeholder=""></textarea>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn-lg btn-danger" data-dismiss="modal">Cerrar</button>
															<input class="btn-primary btn-lg" name="submit2" type="submit" value="Crear solicitud ">
													</form>
												</div>
											</div>
										</div>
									</div>
			</div>









				
				<div class="container clear_both padding_fix">
					<!--\\\\\\\ container  start \\\\\\-->
					<div class="row">
						<div class="col-md-12">
							<div class="block-web">
								<div class="header">

									<h3 class="content-header">Listado de solicitudes creadas </h3>
								</div>
								<div class="porlets-content">
									<div class="table-responsive">
										<table class="display table table-bordered table-striped" id="dynamic-table">
											<thead>
												<tr>
													<th>ID</th>
													<th>SOLICITANTE</th>
													<th>AREA</th>
													<th>STATUS</th>
													<th>FECHA CREACION</th>
													<th>ACCIONES</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql = "select * from casos";
												$result = db_query($sql);
												while ($row = mysqli_fetch_object($result)) {
												?>
													<tr>
														<td>
															<strong>
																<?php echo $row->idcaso; ?>
															</strong>
														</td>
														<td>
															<?php echo $row->nombre; ?>
														</td>
														<td>
															<?php echo $row->area; ?>
														</td>
														<td>
															<?php echo $row->status; ?>
														</td>
														<td>
															<?php echo $row->fecha_creacion; ?>
														</td>
														<td>

															<a class="label label-warning" href="editar.php?id=<?php echo $row->idcaso; ?>">Editar</a>

															<a title="Eliminar " class="label label-danger" href="borrar.php?id=<?php echo $row->idcaso; ?>">Eliminar</a>

														
														</td>
													</tr>
												<?php } ?>
											</tbody>

										</table>
									</div>
									<!--/table-responsive-->
								</div>
								<!--/porlets-content-->
							</div>
						</div>
					</div>
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
	<script src="../../componentes/js/jPushMenu.js"></script>
	<script src="../../componentes/js/side-chats.js"></script>
</body>

</html>