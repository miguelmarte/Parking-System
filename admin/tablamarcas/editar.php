<?php
    session_start();
    if(isset($_SESSION['id_admin'])){
        include('cabeza.php');
        include('menu.php');
        $id=$_GET['id'];
        require '../../php/conexion.php';
        $nueva_consulta= $mysqli->prepare("SELECT * FROM marcas_vehiculos where estado='A' AND id_marca='$id'");
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
    <h4>Marca</h4>
    <input type="text" name="marca" value="<?php echo $datos['marca']?>" required>
  
    
    <button id="botoneditar"type="submit">Modificar</button>

</form>
</div>


</body>
</html>
