<?php
  session_start();
  if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 1){
    header('location: ../../../index.php');
  }
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <div class="user_admin dropdown"> <a href="javascript:void(0);" data-toggle="dropdown"><img width="35px"  src="../../componentes/images/user.png" /><span class="user_adminname"> 
			<?php echo ucfirst($_SESSION['usuario']); ?>
   
          <ul class="dropdown-menu">
            <div class="top_pointer"></div>
            <li> <a href=" "><i class="fa fa-cog"></i> Configuracion  </a></li>
            <li> <a href="../../../controller/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesion</a> </li>
          </ul>
        </div> 
      </div>
    </div>
 
  </div>
<?php 
include("../../../model/function.php");
$id = $_GET['id'];
select_id('usuarios','idusuario',$id);
		  
?>
  <div class="inner">
    <div class="left_nav">
        <img src="../../../img/logo joaking curvasblanco.png" width="90%"  alt=""/>
      <div class="left_nav_slidebar">
        <ul>
          <li ><a href="../index.php"><i class="fa fa-home"></i>CALENDARIO 
				     <span class="plus"><i class="fa fa-plus"></i></span> </a>
          </li>
          
          <li > <a href="../proyectos/index.php"> <i class="fa fa-tasks"></i>PROYECTOS
			 
			  <span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>
		<li class="left_nav_active theme_border"> <a href="../usuarios"> <i class="fa fa-tasks"></i>
			USUARIOS <span class="left_nav_pointer"></span>
				  </span></span><span class="plus"><i class="fa fa-plus"></i></span></a>
            
          </li>	
	  <li>
                       
          </li>
        </ul>
      </div>
    </div>
	
    <!--\\\\\\\left_nav end \\\\\\-->
    <div class="contentpanel">
      <!--\\\\\\\ contentpanel start\\\\\\-->
      <div class="pull-left breadcrumb_admin clear_both">
        <div class="pull-left page_title theme_color">
          <h1><a href="index.php">Usuarios</a> 
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
             
              <h3 class="content-header">Editar - <?php echo $row->usuario;?></h3>
			   
            </div>
         	<div class="porlets-content">

	<?php
	if(isset($_POST['submit'])){
		$field = array("nombre"=>$_POST['nombre'], 
						"correo"=>$_POST['correo'],	
					   "clave"=>base64_encode($_POST['clave']),
					   "perfil_profesional"=>$_POST['perfil']
					  );
		
		$tbl = "usuarios";
		edit($tbl,$field,'idusuario',$id);
		echo '<script type="application/javascript">
	
	swal("Actualizado correctamente","","success")
.then((value) => {
location.href=" ";
 
});

	</script>
	' ;
	
	 	
	}
				
?>			

	<div class="row">
		<div class="col-md-3">
			<strong><span><h5>Nombre</h5></span></strong>
			<input class="form-control " type="text" value="<?php echo $row->nombre;?>" name="nombre"  />
			
				
		</div>
		<div class="col-md-4">
			<strong><span><h5>Correo</h5></span></strong>
<input class="form-control " type="email" value="<?php echo $row->correo;?>" name="correo"  />	
	
			
			
		
		</div>
		<div class="col-md-4">
			<strong><span><h5>Contraseña</h5></span></strong>
<input class="form-control "  value="<?php echo base64_decode($row->clave)?>" type="password"  name="clave"  />	
	
			
			
		
		</div>
	
	</div>
			<br>	
	<div class="row">
		<div class="col-md-12">
			<strong><span><h5>Perfil profesional </h5></span></strong>
<textarea class="form-control " type="text"  name="perfil"><?php echo $row->perfil_profesional;?>	</textarea>
	
			
			
		
		</div>
		
		</di>
				
				

	
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








