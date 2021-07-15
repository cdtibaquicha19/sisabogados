<?php
include 'config.php';
if (isset($_POST['submit'])) {   
    if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
     
     
      // creamos las variables para subir a la db
        $ruta = "upload/"; 
        $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
      
        $upload= $ruta . $nombrefinal;  



        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
                    
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
                    echo "Nombre: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES['fichero']['name']."</a></i><br>";  
                    echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                    echo "<br><hr><br>";  
                         


                   $nombre  = $_POST["nombre"]; 
                   $description  = $_POST["description"]; 


                   $query = "INSERT INTO archivos (idproyecto,idempleado,ruta,tipo,size) 
    VALUES ('$nombre','$description','".$nombrefinal."','".$_FILES['fichero']['type']."','".$_FILES['fichero']['size']."')"; 
    
    


       mysql_query($query) or die(mysql_error()); 
       
       echo "El archivo se ha subido con exito <br>";       
        } 
        $para      = 'cdtibaquicha19@gmail.com,disenoweb@mandragoraproducciones.com.co';
    $titulo    = 'Sistema joaking ';
    $mensaje   = 'Se ha cargado  un nuevo archivo al proyecto';
    $cabeceras = 'From: info@joakingpd.com' . "\r\n" .
    'Reply-To: disenoweb@mandragoraproducciones.com.co' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
    }  
 } 
?> 


<form action="#" method="post" enctype="multipart/form-data">  
    Seleccione archivo: <input name="fichero" type="file" size="150" maxlength="150">  
    <br><br> Nombre: <input name="nombre" type="text" size="70" maxlength="70"> 
    <br><br> Descripcion: <input name="description" type="text" size="100" maxlength="250"> 
    <br><br> 
  <input name="submit" type="submit" value="SUBIR ARCHIVO">   
</form>  


