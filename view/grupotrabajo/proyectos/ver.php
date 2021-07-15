<?php
  session_start();
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    header('location: ../../../index.php');
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COMERCIAL</title>
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
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
      
		<div class="logo" style="display:block"><span class="theme_color">COMERCIAL</span> </div>
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
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado = 'Solicitud_cotizacion' ") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
				  ?>			  
				  </span> </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px"  src="../../componentes/images/user.png" /><span class="user_adminname"> <?php echo ucfirst($_SESSION['nombre']); ?>
   
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            
          
            <li> <a href="#"><i class="fa fa-cog"></i> Configuracion  </a></li>
            <li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
          </ul>
        </div>

        
      </div>
    </div>
 
  </div>

  <div class="inner">
    <div class="left_nav">
      <div class="search_bar"> <i class="fa fa-search"></i>
        <input name="" type="text" class="search" placeholder="Buscar ..." />
      </div>
      <div class="left_nav_slidebar">
        <ul>
          <li ><a href="../index.php"><i class="fa fa-home"></i>SOLICITUDES <span class="badge badge color_2" style="float: right">
				   
			<?php
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado ='Solicitud_cotizacion'") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
			  ?>
				  </span>    <span class="plus"><i class="fa fa-plus"></i></span> </a>
            
          </li>
          
          <li class="left_nav_active theme_border"> <a href="index.php"> <i class="fa fa-tasks"></i>OFERTAS
			 <span class="left_nav_pointer"></span>
			  <span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>
		<li> <a href="../revicion/index.php"> <i class="fa fa-tasks"></i>
			REVISION <span class="badge badge color_2" style="float: right">
				   
			<?php
				  $datos = mysqli_query($con,"SELECT * from solicitudcertificacion where estado ='Rechazada'") ;
				  $numero = mysqli_num_rows($datos);
				  echo $numero ; 
			  ?>
				  </span></span><span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>	
        </ul>
      </div>
    </div>
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="index.php">OFERTAS</a> 
    </h1> Ver 
         
        </div>
        ../
      </div>
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
   <?php 
include("../../../model/function.php");
$id = $_GET['id'];
select_id('solicitudcertificacion','idsolicitud',$id);
?>     
<div id="muestra" class="row">
        <div class="col-md-12">
          <div class="block-web">
           <div class="header">
             
              <h3 class="content-header">Ver / Solicitud - <?php echo $row->codigo_solicitud;?></h3>
            </div>
         	<div class="porlets-content">
				
				
				
				
	<?php
	
	if(isset($_POST['submit'])){
		$field = array("codigo_solicitud"=>$_POST['codigo'], "fecha_solicitud"=>$_POST['fecha']);
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
			
			
<div class="panel panel-default">
  <div class="panel-heading">Codigo de solicitud </div>
  <div class="panel-body">
   <?php echo $row->codigo_solicitud;?>
  </div>
</div>
			
					
			
		
		</div>
	
		<div class="col-md-4">
			
<div class="panel panel-default">
  <div class="panel-heading"> Empresa /cliente  </div>
  <div class="panel-body">
  <?php echo $row->empresa_cliente;?>
  </div>
</div>
		
		
		</div>
		
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading"> Fecha </div>
  <div class="panel-body">
 <?php echo $row->fecha_solicitud;?>
  </div>
</div>
			
			
			
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Nit/Cedula </div>
  <div class="panel-body">
 <?php echo $row->nit;?>
  </div>
</div>
			
			
		
	
		
		</div>
	
		<div class="col-md-4">
			 
			
			<div class="panel panel-default">
  <div class="panel-heading">Pais  </div>
  <div class="panel-body">
   <?php echo $row->pais;?>
  </div>
</div>
			
			
			
			
		
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
  <div class="panel-heading">Ciudad  </div>
  <div class="panel-body">
   <?php echo $row->ciudad;?>
  </div>
</div>
			
			
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Direccion  </div>
  <div class="panel-body">
   <?php echo $row->direccion;?>
  </div>
</div>
		
			
		
		</div>
	
		<div class="col-md-4">
			<div class="panel panel-default">
  <div class="panel-heading">Telefono </div>
  <div class="panel-body">
   <?php echo $row->telefono;?>
  </div>
</div>
			
			
		
		</div>
		
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading">Representante </div>
  <div class="panel-body">
   <?php echo $row->representante;?>
  </div>
</div>
			
			
			
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading">Correo </div>
  <div class="panel-body">
  <?php echo $row->correo;?>
  </div>
</div>
		
			
		
		</div>
	
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Logo</div>
  <div class="panel-body">
   <?php echo $row->logo;?>
  </div>
</div>
			
		
		</div>
		
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading">Pagina Web</div>
  <div class="panel-body">
	  <a href="<?php echo $row->enlace_paginaweb;?>"><?php echo $row->enlace_paginaweb;?></a>
  </div>
</div>
			
			
			
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading">Certificado</div>
  <div class="panel-body">
   <?php echo $row->certificado;?>
  </div>
</div>
		
			
		
		</div>
	
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Iaf</div>
  <div class="panel-body">
   <?php echo $row->iaf;?>
  </div>
</div>
			
			
		
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
  <div class="panel-heading">Alcance</div>
  <div class="panel-body">
   <?php echo $row->alcance;?>
  </div>
</div>
			
			
		
		
		</div>
	
	
	</div>
	<div class="row">
	
		<div class="col-md-4">
			
			
			<div class="panel panel-default">
  <div class="panel-heading">Numero empleados</div>
  <div class="panel-body">
   <?php echo $row->numero_empleados;?>
  </div>
</div>
			
		
			
		
		</div>
	
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Cantidad sitios </div>
  <div class="panel-body">
 <?php echo $row->cantidad_sitios;?>
  </div>
</div>
			
			
			
		
		</div>
		
		<div class="col-md-4">
			
			<div class="panel panel-default">
  <div class="panel-heading">Servicio solicitado </div>
  <div class="panel-body">
 <?php echo $row->servicio_solicitado;?>
  </div>
</div>
			
			
			
			
		
		
		</div>
	
	
	</div>
	

            
            </div><!--/porlets-content-->
            
            
          </div><!--/block-web--> 
        </div><!--/col-md-12--> 
      </div><!--/row-->
	<a class="btn btn-primary" href="javascript:imprSelec('muestra')"><h4>Imprimir </h4> </a>
	
	
	
</form>

          
          
       

        
        
        
 
      </div>
      <!--\\\\\\\ container  end \\\\\\-->
    </div>
    <!--\\\\\\\ content panel end \\\\\\-->
  </div>
  <!--\\\\\\\ inner end\\\\\\-->
</div>
<!--\\\\\\\ wrapper end\\\\\\-->
<!-- Modal -->

 




<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>




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








