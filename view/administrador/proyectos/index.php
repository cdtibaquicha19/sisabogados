<?php
include( "../../../model/function.php" );
session_start();
if ( !isset( $_SESSION[ 'tipo' ] ) || $_SESSION[ 'tipo' ] != 1 ) {
	header( 'location: ../../../index.php' );

}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMINISTRADOR</title>
	<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
	 <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico" />
	<link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../componentes/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../componentes/css/animate.css" rel="stylesheet" type="text/css"/>
	<link href="../../componentes/css/admin.css" rel="stylesheet" type="text/css"/>
	<link href="../../componentes/plugins/data-tables/DT_bootstrap.css" rel="stylesheet"/>
	<link href="../../componentes/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet"/>
	<link href="../../componentes/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet"/>
	

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
									 

									  $datos = mysqli_query( $con, "SELECT * from votaciones" );
							            	  
									  $numero = mysqli_num_rows( $datos) ;
									  
									  $datos2 = mysqli_query( $con, "SELECT * from asignaciones where id_empleado ='".$_SESSION['correo']."'" );
							            	  
									  $numero2 = mysqli_num_rows( $datos2) ;
									
									  echo $numero+$numero2;
									  
									  ?>		  
				  						</span> 
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropdown">
										<?php 
				  						if($numero>0){
				  						    
											$sql = "select * from votaciones ";
											$result = db_query($sql);
											while($row = mysqli_fetch_object($result)){
		
												echo '<li><a href="votar.php?id='.$row->id_votacion.'">Proyecto a votacion '.$row->nombre_proyecto.' </a></li>';
											}
										}
										
										else{
					 echo '<li><a href="#">Sin notificaciones  </a></li>' ;
				  }
				  ?>
				  
				  <?php 
				  						if($numero2>0){
				  						    
											$sql = "SELECT * from asignaciones where id_empleado ='".$_SESSION['correo']."'";
											$result = db_query($sql);
											while($row = mysqli_fetch_object($result)){
		
												echo '<li><a href="editar.php?id='.$row->id_proyecto.'">Asignacion: '.$row->nombre_proyecto.' </a></li>';
											}
										}
										
										else{
					 echo '<li><a href="#">Sin notificaciones  </a></li>' ;
				  }
				  ?>
				  
				  
				  
				  
				  

									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px"  src="../../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['usuario']); ?>
   
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            
          
            <li>  <a href="../usuarios/editar.php?id=<?php echo ucfirst($_SESSION['idusuario']); ?>"><i class="fa fa-cog"></i> Configuracion  </a>
						</li>
						<li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
						</ul>
					</div>


				</div>
			</div>

		</div>

		<div class="inner">
			<div class="left_nav">
				<img src="../../../img/logo joaking curvasblanco.png" width="90%" alt=""/>
				<div class="left_nav_slidebar">
					<ul>
						<li><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO    <span class="plus"><i class="fa fa-plus"></i></span> </a>

						</li>

						<li class="left_nav_active theme_border"> <a href=""> <i class="fa fa-tasks"></i>PROYECTOS
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
function finestraSecundaria (url){
window.open(url, "CHAT SISTEMA", "width=900, height=600")
}
</script>



        <a class"btn btn-danger" href="javascript:finestraSecundaria('https://sistema.serempresarialgyp.com/view/chat/')">
            
            <img src="../../../img/icono_mens.png" width="55" />
            
            Iniciar chat </a>
            
            <span class="badge badge color_2">
				  <?php
		
				
			
				 $datos2 = mysqli_query( $con, "SELECT * from chat where reciever_userid ='".$_SESSION['idusuario']."' and status = '1'" );
			
							            	  
									  $numero = mysqli_num_rows( $datos2) ;
									
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
						<h1>PROYECTOS</h1>

					</div>

				</div>
				<div class="container clear_both padding_fix">
					<!--\\\\\\\ container  start \\\\\\-->

					<div class="row">
						<div class="col-md-12">
							<div class="block-web">
								<div class="header">

									<h3 class="content-header">Listado de proyectos creados  </h3>
								</div>
								<div class="porlets-content">
									<div class="table-responsive">
										<table class="display table table-bordered table-striped" id="dynamic-table">
											<thead>
												<tr>
													<th>NOMBRE DEL PROYECTO </th>
													<th>DESCRIPCION</th>
													<th>ULTIMA VEZ ACTUALIZADO</th>

													<th>INICIO</th>
													<th>FINALIZACION</th>
													<th width="15%">ACCIONES</th>

												</tr>
											</thead>
											<tbody>
<?php 

	$sql = "select * from calendar where category ='Proyectos' ";
	$result = db_query($sql);
	while($row = mysqli_fetch_object($result)){
	?>
												<tr>
													<td>
														<strong>
															<?php echo $row->title;?>
														</strong>
													</td>
													<td width="25%">
														<?php echo $row->description;?>
													</td>
													<td>
														<?php echo $row->actualizado;?>
													</td>
													<td>
														<?php echo $row->start;?>
													</td>
													<td>
														<?php echo $row->end;?>
													</td>
													<td>

														<a class="btn btn-primary" href="editar.php?id=<?php echo $row->id; ?>"><i class="fa fa-pencil fa-lg" title="Editar" aria-hidden="true"></i></a>

														<a title="Eliminar " class="btn btn-danger" href="borrar.php?id=<?php echo $row->id; ?>"><strong> x </strong></a>

														<?php if(($row->votacion ==NULL) && ($row->creado_por==$_SESSION['correo'])){
		echo '<a  title="Enviar a votacion a votacion "class="btn btn-warning" href="votaciones.php?id='.$row->id.'"><i class="fa fa-check fa-lg" aria-hidden="true"></i></a>' ;
	}		
			?>

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

					<div class="row">
						<div class="col-md-12">
							<div class="block-web">
								<div class="header">

									<h3 class="content-header">Listado de proyectos enviados a votacion </h3>
								</div>
								<div class="porlets-content">
									<div class="table-responsive">
										<table class="display table table-bordered table-striped" id="dynamic-table">
											<thead>
												<tr>
													<th>NOMBRE DEL PROYECTO</th>
													<th>DESCRIPCION</th>
													<th>VOTOS A FAVOR </th>
													<th>VOTOS EN CONTRA </th>
													<th>TOTAL VOTOS </th>
													<th>ESTADO </th>
													<th width="15%">ACCIONES</th>

												</tr>
											</thead>
											<tbody>
												<?php 
												
												
							
		
												
												
												
	$sql2 = "select * from votaciones";
	$result2 = db_query($sql2);
	while($row2 = mysqli_fetch_object($result2)){
	?>
												<tr>
													<td>
														<strong>
															<?php echo $row2->nombre_proyecto;?>
														</strong>
													</td>
													<td width="25%">
														<?php echo $row2->descripcion;?>
													</td>
													<td>
														<?php 
		
		if($row2->a_favor==NULL){
			
			echo "0";
			
		}else{
			echo $row2->a_favor;
		}
			?>
													</td>
													<td>
														<?php 
			if($row2->en_contra==NULL){
			echo "0";
		}else{
			echo $row2->en_contra;
		}
			
			?>
													</td>
													<td>
														<?php echo $row2->total;?>
													</td>
													<td>
														<?php echo $row2->estado;?>
													</td>
													<td>
													
														
														<?php
														if($row2->generado_por==$_SESSION['correo']){
														    
														    echo '<a title="Eliminar " class="btn btn-danger" href="borrar_vota.php?id='.$row2->id_votacion.'"><strong> x </strong></a>';
														}else {
														    echo "no puede finalizar ";
														    
														}
														?>
														
														
														
															
													</td>
												</tr>
												<?php } 
					  ?>
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