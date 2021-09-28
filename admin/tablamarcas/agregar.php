<?php
    session_start();
    if(isset($_SESSION['id_admin'])){
        include('cabeza.php');
        include('menu.php');
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
<form id="editar" action="insertar.php" method="post">
    <h4>Marca</h4>
    <input type="text" name="marca"  required>
    
    <br>
    <br>
    <button id="botoneditar"type="submit">Agregar</button>

</form>
</div>


</body>
</html>
