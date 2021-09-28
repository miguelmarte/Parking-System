<?php
    session_start();
    if(isset($_SESSION['id_admin'])){
        include('cabeza.php');
        include('menu.php');
        $id=$_GET['id'];
        require '../../php/conexion.php';
        $nueva_consulta= $mysqli->prepare("SELECT * FROM administrador where estado='A' AND id_administrador='$id'");
        $nueva_consulta->execute();
        $resultado=$nueva_consulta->get_result();
        $datos=$resultado->fetch_assoc();

    }else{
        header("location:../../index.php");
        die();  
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editar</title>
    <link rel="stylesheet" href="../css/style_admin.css">
    <script src="../js/alertify.js"></script>
    <link rel="stylesheet" href="../css/alertify.css">
</head>
<body>
<div class="row">
<form id="editar" action="modificar.php" method="post">
    <input type="text" name="id" hidden="" value="<?php echo $id?>">
    <h4>Nombre</h4>
    <input type="text" name="nombre" value="<?php echo $datos['nombre']?>"  required>
    <h4>Apellido</h4>
    <input type="text" name="apellido" value="<?php echo $datos['apellido']?>"  required>
    <h4>Telefono</h4>
    <input type="tel" name="telefono" value="<?php echo $datos['telefono']?>"  required>
    <h4>Direccion</h4>
    <input type="text" name="direccion" value="<?php echo $datos['direccion']?>"  required>
    <h4>turno</h4>
    <input type="text" name="turno" value="<?php echo $datos['turno']?>"  required>
    <h4>Usuario</h4>
    <input type="text" name="usuario" value="<?php echo $datos['usuario']?>"  required>
    <h4>Contraseña</h4>
    <input type="text" name="contra" value="<?php echo $datos['contra']?>"  required>
    <br>
    <br>
    <button id="botoneditar"type="submit">Modificar</button>

</form>
</div>


</body>
</html>
