<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../index.php');
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COMERCIAL</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="../componentes/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../componentes/css/animate.css" rel="stylesheet" type="text/css" />
<link href="../componentes/css/admin.css" rel="stylesheet" type="text/css" />
<link href="../componentes/plugins/data-tables/DT_bootstrap.css" rel="stylesheet" />
<link href="../componentes/plugins/advanced-datatable/css/demo_table.css" rel="stylesheet" />
<link href="../componentes/plugins/advanced-datatable/css/demo_page.css" rel="stylesheet" />

<script id="cid0020000215988100783" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 200px;height: 300px;">{"handle":"joa-king","arch":"js","styles":{"a":"707070","b":100,"c":"FFFFFF","d":"FFFFFF","k":"707070","l":"707070","m":"707070","n":"FFFFFF","p":"10","q":"707070","r":100,"ab":false,"pos":"br","cv":1,"cvbg":"808080","cvw":200,"cvh":30,"surl":0,"allowpm":0,"ticker":1,"fwtickm":1}}</script>
</head>
<body class="dark_theme  fixed_header left_nav_fixed">
<div class="wrapper">
  
  <div class="header_bar">
   
    <div class="brand">
      
      <div class="logo" style="display:block"><span class="theme_color">COMERCIAL</span> </div>
      <div class="small_logo" style="display:none"><img src="images/s-logo.png" width="50" height="60" alt="s-logo" /> <img src="images/r-logo.png" width="122" height="20" alt="r-logo" /></div>
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
            
              <li class="dropdown"> <a href="../comercial/index.php" > Notificaciones <span class="badge badge color_2">
				  
				  <?php
				 
				  include("../../model/conexion.php") ;
			
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado = 'Solicitud_cotizacion'") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
?>
				  
				  
				  </span> </a>
                
              </li>
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px"  src="../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['nombre']); ?>
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            
          
            <li> <a href="settings.html"><i class="fa fa-cog"></i> Configuracion  </a></li>
            <li> <a href="../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
          </ul>
        </div>

        
      </div>
    </div>
    <!--\\\\\\\ header top bar end \\\\\\-->
  </div>
  <!--\\\\\\\ header end \\\\\\-->
  <div class="inner">
    <!--\\\\\\\ inner start \\\\\\--><div class="left_nav">

      <!--\\\\\\\left_nav start \\\\\\-->
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Buscar..." />
      </div>
      <div class="left_nav_slidebar">
        <ul>
         <li class="left_nav_active"> <a href="index.php"> <i class="fa fa-tasks"></i>SOLICITUDES
			
			  <span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>
			<li> <a href="index.php"> <i class="fa fa-tasks"></i>OFERTA
			  <span class="badge badge color_2" style="float: right">
				   
			<?php
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado ='Aprobada'") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
			  ?>
				  </span> 
			  <span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>
		
		<li> <a href="revision/index.php"> <i class="fa fa-tasks"></i>
			REVISION <span class="badge badge color_2" style="float: right">
				   
			<?php
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado ='revision'") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
			  ?>
				  </span> <span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>	
          
          
          
       
        </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="index.php">COMERCIAL</a> 
    </h1> Editar 
         
        </div>
        
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        
<div class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
             
              <h3 class="content-header">Editar</h3>
            </div>
         	<div class="porlets-content">
				
				
				
				<?php 
include("../../model/function.php");
$id = $_GET['id'];
select_id('solicitudcertificacion','idsolicitud',$id);
?>
	<?php
	
	if(isset($_POST['submit'])){
		$field = array("empresa_cliente"=>$_POST['empresa'], 
		"nit"=>$_POST['nit'] ,
		"pais"=>$_POST['pais'],
		"ciudad"=>$_POST['ciudad'],
		"direccion"=>$_POST['direccion'],
		"telefono"=>$_POST['telefono'],
		"representante"=>$_POST['representante'] ,
		"correo"=>$_POST['correo'],
		"logo"=>$_POST['logo']	,
		"enlace_paginaweb"=>$_POST['enlacepaginaweb'],
		"certificado"=>$_POST['certificado'],	
		"iaf"=>$_POST['iaf'],
		"alcance"=>$_POST['alcance'],
		"numero_empleados"=>$_POST['numero_empleados'] ,
		"cantidad_sitios"=>$_POST['cantidad_sitios'] ,	
		"servicio_solicitado"=>$_POST['servicio_solicitado'],
		"costototal"=>$_POST['costo'],
		"diaprogramado"=>$_POST['dia']);
		
		$tbl = "solicitudcertificacion";
		edit($tbl,$field,'idsolicitud',$id);
		echo ' <div class="alert alert-success alert-dismissible" role="alert">Se ha actualizado correctamente 
  <button type="button" class="close" data-dismiss="alert" onclick="reload()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>
</div> ' ;
		

echo '<script type="text/javascript">
         location.href="";       
</script>';
		



		
		
	}
		if(isset($_POST['submit2'])){
		$field = array("estado"=>Revision);
		$tbl = "solicitudcertificacion";
		edit($tbl,$field,'idsolicitud',$id);
		
		

echo '<script type="text/javascript">
         location.href="index.php";       
</script>';
		



		
		
	}
				
				

				
?>			
				
<form action="" method="post">
	<div class="row">
	
		<div class="col-md-4">
		Codigo de solicitud 
			<input class="form-control " type="text" value="<?php echo $row->codigo_solicitud;?>" name="codigo" disabled="disabled" />
			
			
		
		</div>
	
		<div class="col-md-4">
			 Empresa /cliente 
			<input class="form-control"type="text" value="<?php echo $row->empresa_cliente;?>" name="empresa" />
		
		</div>
		
		<div class="col-md-4">
			
			Fecha
			<input class="form-control"type="text" value="<?php echo $row->fecha_solicitud;?>" name="fecha" disabled="disabled" />
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
		Nit/Cedula
			<input class="form-control" type="text" value="<?php echo $row->nit;?>" name="nit" />
		
		</div>
	
		<div class="col-md-4">
			 Pais 
			<input class="form-control"type="text" value="<?php echo $row->pais;?>" name="pais" />
		
		</div>
		
		<div class="col-md-4">
			
			Ciudad
			<input class="form-control"type="text" value="<?php echo $row->ciudad;?>" name="ciudad" />
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
		Direccion
			<input class="form-control" type="text" value="<?php echo $row->direccion;?>" name="direccion" />
		
		</div>
	
		<div class="col-md-4">
			Telefono
			<input class="form-control"type="text" value="<?php echo $row->telefono;?>" name="telefono" />
		
		</div>
		
		<div class="col-md-4">

			
			Representante
			<input class="form-control"type="text" value="<?php echo $row->representante;?>" name="representante" />
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
		Correo
			<input class="form-control" type="text" value="<?php echo $row->correo;?>" name="correo" />
		
		</div>
	
		<div class="col-md-4">
			Logo
			<input class="form-control"type="text" value="<?php echo $row->logo;?>" name="logo" />
		
		</div>
		
		<div class="col-md-4">
			
			Pagina Web
			<input class="form-control"type="text" value="<?php echo $row->enlace_paginaweb;?>" name="enlacepaginaweb" />
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
		Certificado
			<input class="form-control" type="text" value="<?php echo $row->certificado;?>" name="certificado" />
		
		</div>
	
		<div class="col-md-4">
			Iaf
			<input class="form-control"type="text" value="<?php echo $row->iaf;?>" name="iaf" />
		
		</div>
		
		<div class="col-md-4">
			
			Alcance
			<input class="form-control"type="text" value="<?php echo $row->alcance;?>" name="alcance" />
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
		Numero empleados
			<input class="form-control" type="text" value="<?php echo $row->numero_empleados;?>" name="numero_empleados" />
		
		</div>
	
		<div class="col-md-4">
			Cantidad sitios
			<input class="form-control"type="text" value="<?php echo $row->cantidad_sitios;?>" name="cantidad_sitios" />
		
		</div>
		
		<div class="col-md-4">
			
			Servicio solicitado
			<input class="form-control"type="text" value="<?php echo $row->servicio_solicitado;?>" name="servicio_solicitado" />
			
			
		
		</div>
	
	
	</div>
	<br />
	<div class="header">

              <h3 class="content-header">Programar </h3>

	
            </div>
	
	<div class="row">
	
	
	<div class="col-md-4">
		Costos
		<input  required class="form-control" type="number" value="<?php echo $row->costototal;?>" name="costo" />
		
		
		</div>
	<div class="col-md-4">
		
		Dias Programados
			
		<input class="form-control" required type="number" value="<?php echo $row->diaprogramado;?>" name="dia" />
		
		</div>
	<div class="col-md-4">
		
		
		

		
		</div>	
	</div>
<br />
	<button class="btn btn-info" type="submit"  name="submit">
		<h4>Actualizar  
		</h4></button>
	<button class="btn btn-default" type="submit"  name="submit2"><h4>Enviar a Revison  tecnica 
		</h4></button>
	
</form>


            
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
          
          
       

        
        
        
 
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->


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








