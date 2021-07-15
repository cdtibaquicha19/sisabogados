<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
	include ('Chat.php');
	$chat = new Chat();
	$user = $chat->loginUsers($_POST['username'], $_POST['pwd']);	
	if(!empty($user)) {
		$_SESSION['usuario'] = $user[0]['usuario'];
		$_SESSION['idusuario'] = $user[0]['idusuario'];
		$chat->updateUserOnline($user[0]['idusuario'], 1);
		$lastInsertId = $chat->insertUserLoginDetails($user[0]['idusuario']);
		$_SESSION['login_details_id'] = $lastInsertId;
		header("Location:index.php");
	} else {
		$loginError = "Usuario y Contraseña invalida";
	}
}

?>


<div class="container">		
	
	<div class="row">
		<div class="col-sm-4">
			<h4>Chat Login:</h4>		
			<form method="post">
				<div class="form-group">
				<?php if ($loginError ) { ?>
					<div class="alert alert-warning"><?php echo $loginError; ?></div>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="username">Usuario:</label>
					<input type="username" class="form-control" name="username" required>
				</div>
				<div class="form-group">
					<label for="pwd">Contraseña:</label>
					<input type="password" class="form-control" name="pwd" required>
				</div>  
				<button type="submit" name="login" class="btn btn-info">Iniciar Sesion</button>
			</form>
			<br>
			

		</div>
		
	</div>
</div>	







