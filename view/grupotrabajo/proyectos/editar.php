<?php
  session_start();
  if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1){
    header('location: ../../../index.php');
  }
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
				  include("../../../model/conexion.php") ;
				  $datos = mysqli_query($con,"SELECT * from proyectos  ") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
				  ?>			  
				  </span> </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px"  src="../../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['usuario']); ?>
   
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href="#"><i class="fa fa-cog"></i> Configuracion  </a></li>
            <li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
          </ul>
        </div> 
      </div>
    </div>
 
  </div>
<?php 
include("../../../model/function.php");
$id = $_GET['id'];
select_id('proyectos','id',$id);
		 $inicio = $row->inicio;  
			$fin =  $row->fin; 
?>
  <div class="inner">
    <div class="left_nav">
        <img src="../../../img/logo joaking curvasblanco.png" width="90%"  alt=""/>
      <div class="left_nav_slidebar">
        <ul>
          <li ><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO 
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
    </h1> Editar 
        </div>
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
 <form action="" method="post">       
<div class="row">
        <div class="col-md-12">
			
          <div class="block-web">
			  <button style="float: right; margin-top: -10px;"class="btn btn-info " type="submit"  name="submit">
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
        <h4 class="modal-title" id="myModalLabel">Cargar documentos a <?php echo $row->nombre; ?></h4>
      </div>
      <div class="modal-body">

        
		  <h5>Usuario: <strong><?php echo $_SESSION['usuario'];  ?>  </strong></h5>
		  
		  
		  
		  <?php

if (!empty($_POST['submit2'])) { 

  if(is_uploaded_file($_FILES['fichero']['tmp_name'])) {
     
        $ruta = "../../carga/upload/"; 
        $nombrefinal= trim ($_FILES['fichero']['name']); 
      
        $upload= $ruta . $nombrefinal;  
        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { 
			$fecha = date(" d-m-Y h:i:s ");
            $nombre  = $_POST["nombre"]; 
            $description  = $_POST["description"]; 
			
$query = "INSERT INTO archivos (idproyecto,idempleado,ruta,tipo,size) 
    VALUES ('$nombre','".$_SESSION['usuario'].$fecha."','".$nombrefinal."','".$_FILES['fichero']['type']."','".$_FILES['fichero']['size']."')"; 
			
			db_query($query);

        }  
	  echo '<script type="application/javascript">
	
	swal("Cargado correctamente","","success")
.then((value) => {
location = location;
});

	</script>
	' ;
    }  
 } 
?> 

<form action=" " method="post" enctype="multipart/form-data"> 
    Seleccione archivo: 
	
<input class="form-control" name="fichero" type="file" size="150" maxlength="150">  
<input type="hidden" class="form-control" name="nombre" value="<?php echo $row->id; ?>" size="70" maxlength="70"> 
<input type="hidden" class="form-control" value="<?php echo $row->nombre; ?> " name="description" size="100" maxlength="250">
	

							

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
             
              <h3 class="content-header">Editar - <?php 
				  
				 
				  
				  echo $row->nombre; ?></h3>
			   
            </div>
         	<div class="porlets-content">

	<?php
	date_default_timezone_set('America/Bogota');
	$actualizacion = date("Y-m-d/H:m:s ").$_SESSION['usuario'];
	if(isset($_POST['submit'])){
		$field = array("nombre"=>$_POST['nombre'], 
		"descripcion"=>$_POST['descripcion'],
		"actualizado"=>$actualizacion
					   
					  );
		
		$tbl = "proyectos";
		edit($tbl,$field,'id',$id);
		echo '<script type="application/javascript">
	
	swal("Actualizado correctamente","","success")
.then((value) => {
location.href=" ";
 
});

	</script>
	' ;
	
	 	
	}
if(isset($_POST['submit4'])){
	
	
	
	$actividad = $_POST['actividad'] ;
	$idempleado = $_POST['id_empleado'] ;
	$fechaini= $_POST['fecha'] ;
	$fechafin= $_POST['fecha_fin'] ;
	$observaciones= $_POST['observaciones'] ;
	$proyecto = $row->nombre; 
	

	$query =  "INSERT INTO asignaciones (id , asignacion , id_proyecto ,nombre_proyecto, id_empleado, fecha, feha_fin, observaciones, estado) VALUES (NULL, '$actividad','$id','$proyecto','$idempleado','$fechaini', '$fechafin', '$observaciones', 'asignado');";
	
	
	if(db_query($query)){
		
$para      = $idempleado.",cdtibaquicha19@gmail.com";
$titulo    = 'Sistema  notificacion joaking ';
$mensaje   = 'Se ha asignado una nueva actividad con fecha '.$fechafin." como plazo maximo de entrega ";
$cabeceras = 'From: info@joakingpd.com' . "\r\n" .
    'Reply-To: disenoweb@mandragoraproducciones.com.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($para, $titulo, $mensaje, $cabeceras);
header('Location: '.$_SERVER['HTTP_REFERER']);
		echo '<script type="application/javascript">
	
swal("Se ha asignado correctamente  : ","se envio correo a '.$idempleado.'","success")
.then((value) => {
location = location;
});

	</script>
	' ;}else{
		echo '<script type="application/javascript">
	
	swal("No fue crear la asignacion  ","","error")
.then((value) => {
location = location;
});

	</script>
	' ;
	
	
	
			

		
	}	
}
?>			

	<div class="row">
		<div class="col-md-3">
			<strong><span><h5>Nombre</h5></span></strong>
			<input class="form-control " type="text" value="<?php echo $row->nombre;?>" name="nombre"  />
			<br />
			<strong><span><h5>Fecha inicio</h5></span></strong>
				<h3><?php echo $row->inicio;?></h3>
		</div>
		<div class="col-md-9">
			<strong><span><h5>Descripcion</h5></span></strong>
<input class="form-control " type="text" value="<?php echo $row->descripcion;?>" name="descripcion"  />	
			<br />
			<strong><span><h5>Fecha fin</h5></span></strong>
			<h3><?php echo $row->fin;?></h3>
		
		</div>
	
	</div>
	<br />
		<br />
	<div class="header">
             
		
		
		<!-- Button trigger modal -->
<button style="float: right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5">
  Crear asignacion a Grupo de trabajo
</button>

<!-- Modal -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Creador de asignaciones </h4>
      </div>
      <div class="modal-body">
       
		  
		  
		  
		   <form action=" " method="post">
			   <!--/
			   <p>Seleccione actividad</p>
			   <select  name="actividad" class="form-control">
			   <option  >Seleccione</option>
				<option disabled>-------------- FASE 1 (Planeacion )-------------</option>
				<option  class="" value="titulo" >Titulo</option>
				<option  class="" value="antecedentes" >Antecedentes</option>
				<option  class="" value="justificacion" >Justificacion</option>
				<option  class="" value="componentes" >Componentes</option>
				<option disabled>-------------- FASE 2 (Actividades )-------------</option>
				<option  class="" value="actividades" >Actividades</option>
				<option  class="" value="indicadores" >Indicadores y medios de verificacion</option>
				<option  class="" value="factores" >Factores externos</option>
				<option disabled>-------------- FASE 3 (Presupuesto )-------------</option>
				<option  class="" value="insumos" >Insumos</option>
				<option  class="" value="viabilidad" >Viabilidad</option>
				<option  class="" value="metodologia" >Metodologia</option>   
				<option disabled>-------------- FASE 4 (Ejecucion )-------------</option>
				<option  class="" value="calendarios" >Calendarios ejecucion de actividades </option>
				<option  class="" value="monitoreo" >Monitoreo y evaluacion </option>
				<option  class="" value="anexos" >Anexos</option>      
				   
				   
				   
			   </select>
			   -->
			   
		  <br>
			  <p>Seleccione usuario</p>
		  <select  name="id_empleado" class="form-control">
			  <option  class="" value="" >Seleccione</option>
			  <?php 
	$sql = "select * from usuarios ";				 
	$result = db_query($sql);
		   
    while($row = mysqli_fetch_object($result)){
	?>	  
		<option value="<?php echo $row->correo;?>" ><?php echo $row->nombre;?></option>
	<?php } ?>
		   </select>
			   
			   <div class="col-md-6">
			   <p>Fecha inicio </p> 
				<input class="form-control" type="date"  name="fecha" />
			   
			   
			   </div>
			   <div class="col-md-6">
			   
			   		 <p>Fecha fin </p>
					<input class="form-control" type="date"  name="fecha_fin" />
			   
			   </div>
			 
			
			  <p>Observaciones  </p>
			<input  class="form-control" type="text"  name="observaciones" /> 
		  <br>
		<br>
		
		
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <input class="btn-primary btn" name="submit4" type="submit" value="Crear asignacion">
		
		</form>
      </div>
    </div>
  </div>
</div>
		
	<!--/	
    <h3 class="content-header">Asignaciones</h3>
    </div>
	<div class="row">
	
		<div class="col-md-3">
		<h5><strong>FASE 1 (Planeacion)</strong></h5> 
		
		</div>
	
		<div class="col-md-3">
		<h5><strong>FASE 2 (Actividades)</strong></h5>
		
		</div>
		<div class="col-md-3">
			
		<h5><strong>FASE 3 (Presupuesto)</strong></h5>

		
		</div>
		<div class="col-md-3">
			
		<h5><strong>FASE 4 (Ejecucion)</strong></h5>
		
		</div>
	
	</div>
	<div class="row">
		
	
		<div class="col-md-3">
		<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='titulo' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
         Titulo  
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
			
			
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='antecedentes' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
         Antecedentes  
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='justificacion' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
        Justificacion  
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='componentes' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
        Componentes
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
			
			
   
    </div>
		
		
  
	
		
		<div class="col-md-3">
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='actividades' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
        Actividades
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='indicadores' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
        Indicadores y medios de verificacion
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='factores' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
       Factores externos
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
		
		
		
		
		</div>
		<div class="col-md-3">
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='insumos' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
       Insumos
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='viabilidad' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
	Viabilidad
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='metodologia' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
       Metodologia<br>
			<li>Presupuesto</li>
			<li>Calendario Desenboldo</li>
			
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
			
		
		
		
		
		</div>
		<div class="col-md-3">
			
			
			<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='calendarios' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
	Calendario ejecucion de actividades 
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
	<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='monitoreo' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
	Monitoreo y evaluacion 
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>
			
	<?php
	$sql = "select * from asignaciones where id_proyecto = '$id' and asignacion ='anexos' ";
	$result = db_query($sql);				
?>
      <h4 class="panel-title">
        <a class="list-group-item" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
	Anexos
	<?php while($row = mysqli_fetch_object($result)){
		
	
			if($row->estado ="asignado"){
				
				echo '<div class="alert alert-warning" role="alert">Asignado a '.$row->id_empleado.'</div>' ; 
			}else{
				echo " normal";
			}
	
			}
	?> 
        </a>
      </h4>		
		
		
		
		
		
		</div>
	</div>	
			</div>
			
			
			-->
	<br />
				
	<br />
	
		<div class="header">

              <h3 class="content-header">Asignaciones </h3>
            </div>
	
	<BR>
	    
	     <div class="table-responsive">
                <table  class="display table table-bordered table-striped" id="dynamic-table2">
                  <thead>
                    <tr>
                      	<th>ASIGNACION  </th>
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
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		<td><?php echo $row->observaciones;?></td>
		<td width="25%"><?php echo $row->id_empleado;?></td>
			<td><?php echo $row->fecha;?></td>
				<td><?php echo $row->feha_fin;?></td>
		<td>
		 
		<a  title="Eliminar documento " class="btn btn-danger"  target="_blank" href="borrar_doc.php?id=<?php echo $row->id;?>"> X </a>
		
		
		
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
                <table  class="display table table-bordered table-striped" id="dynamic-table">
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
	while($row = mysqli_fetch_object($result)){
	?>
	<tr>
		<td><strong><?php echo $row->ruta;?></strong></td>
		<td width="25%"><?php echo $row->idempleado;?></td>
		<td>
		  <a  class="btn btn-default"  target="_blank" href="../../carga/upload/<?php echo $row->ruta;?>"> Ver documento </a>
		<a  title="Eliminar documento " class="btn btn-danger"  target="_blank" href="borrar_doc.php?id=<?php echo $row->id;?>"> X </a>
		
		
		
		</td>
		
	</tr>
	<?php } ?>
                  </tbody>
                  
                </table>
              </div><!--/table-responsive-->
		</div>	
	</div>
<br />

	
</form>
            
      </div><!--/porlets-content-->      
    </div><!--/block-web--> 
  </div><!--/col-md-12--> 
      </div><!--/row--> 
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
