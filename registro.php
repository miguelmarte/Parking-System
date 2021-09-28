<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:clientes/index.php");
    die();
}if(isset($_SESSION['id_admin'])){
    header("location:admin/index.php");
    die();
}else{
     
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/style_registro.css" rel="stylesheet"/>
 <link rel="icon" type="image/png" href="imagenes/par.png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<title>formulario de registro</title>
</head>
<body>
	<section class="form-register">
			
			<h4>Registro</h4>
			<i class="material-icons">
					person
					</i>
	<form action="php/registrarse.php" method="POST" accept-charset="UTF-8">

		<input class="controls" type="text" name="nombre" placeholder="Ingrese su nombre" required>
		<i class="material-icons">
				person
				</i>

		<input class="controls" type="text" name="apellido" placeholder="Ingrese su apellido" required>
		<i class="material-icons">
				mail
				</i>
		<input class="controls" type="email" name="correo" placeholder="Ingrese su correo" required>
		<i class="material-icons">
				lock
				</i>
		<input class="controls" type="password" name="contra" placeholder="Ingrese su contrase&ntilde;a" required>
		<i class="material-icons">
				settings_phone
				</i>
		<input class="controls" type="tel" name="telefono" placeholder="Ingrese su telefono" required>

			<label>Al Registrarse acepta los <a href="#">terminos y condiciones</a></label>
		
		<button class="botons" type="submit">Registrarse</button>
		</form>
		<a href="index.php">¿Ya tengo cuenta?</a>
	 </section>


</body>
</html>