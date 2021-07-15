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
						<li><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO


								</span> <span class="plus"><i class="fa fa-plus"></i></span> </a>

						</li>

						<li> <a href="../proyectos/index.php"> <i class="fa fa-tasks"></i>PROYECTOS

								<span class="plus"><i class="fa fa-plus"></i></span></a>

						</li>
						<li class="left_nav_active theme_border"> <a href="#"> <i class="fa fa-user"></i>
								USUARIOS <span class="left_nav_pointer"></span>
								</span></span></a>

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
							window.open(url, "CHAT SISTEMA DPOFUNDATION", "width=900, height=600")
						}
					</script>



					<a class="btn btn-danger" href="javascript:finestraSecundaria('https://sistema.serempresarialgyp.com/view/chat/')">

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
						<h1>USUARIOS
							</a></h1>

					</div>

				</div>
				<div class="container clear_both padding_fix">
					<!--\\\\\\\ container  start \\\\\\-->

					<div class="row">
						<div class="col-md-12">
							<div class="block-web">
								<div class="header">

									<h3 class="content-header">Listado de usuarios creados</h3>


									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary" style="float: right;margin-top:-35px;  " data-toggle="modal" data-target="#myModal">
										Crear nuevo usuario <strong>+</strong>
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Creacion de usuarios </h4>
												</div>
												<div class="modal-body">

													<?php
													include("../../../model/function.php");

													if (!empty($_POST['submit2'])) {
														$fecha = date("m-d-y");


														$field = array(
															"nombre" => $_POST['nombre'],
															"correo" => $_POST['correo'],
															"usuario" => $_POST['usuario'],
															"clave" => base64_encode($_POST['password']),
															"perfil_profesional" => $_POST['perfil'],
															"departamento" => implode(' , ', $_POST['departamento']),
															"status" => $_POST['estado'],
															"tipo" => $_POST['tipo'],
															"fregistro" => $fecha,
															"creado_por" => "dependencia",
															"dependencia" => "gerencia"
														);
														$tbl = "usuarios";
														$nombre = $_POST['usuario'];
														if (insert($tbl, $field)) {

															echo '<script type="application/javascript">
	
swal("Se ha creado el usuario : ","' . $nombre . '","success")
.then((value) => {
location = location;
});

	</script>
	';
														} else {
															echo '<script type="application/javascript">
	
	swal("No fue posible crear el usuario ","' . $nombre . '","error")
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
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Nombres y apellidos</label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="nombre" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Perfil profesional </label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="perfil" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Usuario </label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="usuario" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Tipo de usuario </label>
																	<div class="col-sm-12">
																		<select name="tipo" class="form-control">

																			<option value="1">Administrador</option>
																			<option value="2">Grupo de trabajo</option>
																			<option value="3">Cliente</option>

																		</select>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Correo</label>
																	<div class="col-sm-12">
																		<input type="email" class="form-control" name="correo" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Contraseña</label>
																	<div class="col-sm-12">
																		<input type="text" class="form-control" name="password" placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Departamento</label>
																	<div class="col-sm-12">
																		Seleccion (ctrl + click para seleccion multiple)

																		<select name="departamento[]" multiple="multiple" class="form-control">



																			<?php
																			include("../../model/function.php");

																			$sql = "select * from departamentos";
																			$result = db_query($sql);
																			while ($row2 = mysqli_fetch_object($result)) {

																			?>
																				<?php
																				echo '
							  <option value="' . $row2->nombre_depa . '">' . $row2->nombre_depa . '</option>';
																				?>
																			<?php

																			}

																			?>
																		</select>


																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-12 control-label">Estado</label>
																	<div class="col-sm-12">
																		<select name="estado" class="form-control">
																			<option value="1">Activo</option>
																			<option value="0">Desactivado</option>



																		</select>

																	</div>
																</div>





															</div>




														</div>



												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
													<input class="btn-primary btn" name="submit2" type="submit" value="Crear usuario">

													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="porlets-content">
									<div class="table-responsive">
										<table class="display table table-bordered table-striped" id="dynamic-table">
											<thead>
												<tr>
													<th width="25%">CORREO</th>
													<th>PERFIL</th>
													<th>NOMBRE</th>
													<th>USUARIO</th>
													<th>DEPARTAMENTO</th>
													<th width="15%">ACCIONES</th>

												</tr>
											</thead>
											<tbody>
												<?php
												$valor = $_SESSION['creado_por'];
												$sql = "select * from usuarios ";
												$result = db_query($sql);
												while ($row = mysqli_fetch_object($result)) {
												?>
													<tr>
														<td><strong><?php echo $row->correo; ?></strong></td>
														<td width="25%"><?php echo $row->perfil_profesional; ?></td>
														<td><?php echo $row->nombre; ?></td>
														<td><?php echo $row->usuario; ?></td>
														<td><?php echo $row->departamento; ?></td>

														<td>


															<a class="btn btn-primary" href="editarcom.php?id=<?php echo $row->idusuario; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
															<a class="btn btn-danger" href="borrar.php?id=<?php echo $row->idusuario; ?>">Eliminar</a>

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
	<script>
		jQuery(document).ready(function() {
			EditableTable.init();
		});
	</script>
	<script src="../../componentes/js/jPushMenu.js"></script>
	<script src="../../componentes/js/side-chats.js"></script>
</body>

</html>