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
<script id="cid0020000215988100783" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 200px;height: 300px;">{"handle":"joa-king","arch":"js","styles":{"a":"707070","b":100,"c":"FFFFFF","d":"FFFFFF","k":"707070","l":"707070","m":"707070","n":"FFFFFF","p":"10","q":"707070","r":100,"ab":false,"pos":"br","cv":1,"cvbg":"808080","cvw":200,"cvh":30,"surl":0,"allowpm":0,"ticker":1,"fwtickm":1}}</script>	
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
select_id('votaciones','id_votacion',$id);
		 $inicio = $row->fecha_final_proyecto;  
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
		
			  
		</form>	  
			  
			  
           <div class="header">
             
              <h3 class="content-header">Votar - <?php  echo $row->nombre_proyecto; ?></h3>

            </div>
         	<div class="porlets-content">
	<?php
	date_default_timezone_set('America/Bogota');
	$actualizacion = date("Y-m-d/H:m:s ").$_SESSION['usuario'];
	if(isset($_POST['submit'])){
		$field = array("nombre"=>$_POST['nombre'], 
		"descripcion"=>$_POST['descripcion'],
		"actualizado"=>$actualizacion );
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
	
	
		$VALOR = intval($row->a_favor)   ;
		$usuario = $_SESSION['correo'] ;
		$field = array("a_favor"=>$VALOR+1);
		$tbl = "votaciones";
		edit($tbl,$field,'id_votacion',$id);
	
	$query =  "INSERT INTO votos (id_voto , id_votaciones , id_usuario ) VALUES (NULL, '$id','$usuario');";
	
	if(db_query($query)){
		
echo '<script type="application/javascript">
swal("Se ha registrado su voto   : ","Gracias","success")
.then((value) => {
location.href="../proyectos";
});
	</script>
	' ;}else{
		echo '<script type="application/javascript">
	swal("No fue posible generar su voto  ","","error")
.then((value) => {
location = location;
});

	</script>
	' ;
		
	}	
}if(isset($_POST['submit5'])){
	
	
		$VALOR = intval($row->en_contra)   ;
		$usuario = $_SESSION['correo'] ;
		$field = array("en_contra"=>$VALOR+1);
		$tbl = "votaciones";
		edit($tbl,$field,'id_votacion',$id);
	
	$query =  "INSERT INTO votos (id_voto , id_votaciones , id_usuario ) VALUES (NULL, '$id','$usuario');";
	
	if(db_query($query)){
		
echo '<script type="application/javascript">
swal("Se ha registrado su voto   : ","Gracias","success")
.then((value) => {
location.href="../proyectos";
});
	</script>
	' ;}else{
		echo '<script type="application/javascript">
	swal("No fue posible generar su voto  ","","error")
.then((value) => {
location = location;
});

	</script>
	' ;
		
	}	
}
?>			
				
				
<?php
$datos=mysqli_query($con,"select * from  votos where id_votaciones='".$id."' and id_usuario ='".$_SESSION['correo']."'");
$numero = mysqli_num_rows($datos);
				if($numero>0){
					echo '<div class="alert alert-success" role="alert">Ya se ha registrado su voto
					
					<a href="index.php" style="float: right"  type="button" class="btn btn-success">Regresar </a>
					<br>
					<br>
					
					
					</div>';
					
				}else{
					?>
					<div class="row">
						
<button style="float: right; margin-top: -10px;"class="btn btn-success" type="submit"  name="submit4">SI</button>
<button style="float: right; margin-top: -10px;"class="btn btn-danger " type="submit"  name="submit5">NO</button>						
		<div class="col-md-4">
			<strong><span><h5>Nombre</h5></span></strong>
			<h3 > <?php echo $row->nombre_proyecto;?></h3>
			<BR>
				<strong><span><h5>USUARIO</h5></span></strong>
			<h3><?php echo ucfirst($_SESSION['correo']); ?></h3>
		</div>
		<div class="col-md-8">
			<strong><span><h5>Descripcion</h5></span></strong>
<h3><?php echo $row->descripcion;?></h3>
			<br />
			<strong><span><h5>Fecha fin</h5></span></strong>
			<h3><?php echo $row->fecha_final_proyecto;?></h3>
		
		</div>
	
	</div>
						<?php 
						
				}
						?>
				
					

				
				
				
				
				
				
				


<br>
<br>
			</div>
		</div>	
	</div>
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
