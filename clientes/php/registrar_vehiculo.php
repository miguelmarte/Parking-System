<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/alertify.css" rel="stylesheet"/> 
    <script src="../../js/alertify.js" type="text/javascript"></script>
</head>
<body>
    
</body>
</html>
<?php
error_reporting(0);
session_start();
$id=$_SESSION['id'];
$matricula=$_POST['matricula'];
$marca=$_POST['marca']; 
$tipo=$_POST['tipo'];
$modelo=$_POST['modelo'];
$ano=$_POST['ano'];

    require 'conexion.php';
    $sql="INSERT INTO vehiculos (id_cliente,matricula,tipo,modelo,marca,ano) values('$id','$matricula','$tipo','$modelo','$marca','$ano')";
    if($resultado=mysqli_query($mysqli,$sql)){
        echo "<script>";
        echo "alertify.alert('Error', 'Registro Exitoso', function(){ window.location = '../../index.php'; });";
        echo "</script>"; 
    }else{
        echo "<script>";
        echo "alertify.alert('Error', 'Error al registrarse', function(){ window.location = '../../index.php'; });";
        echo "</script>"; 
    }
    $mysqli->close();
    $consulta1->close();
  
?>