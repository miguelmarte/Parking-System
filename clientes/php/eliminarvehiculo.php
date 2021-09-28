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
$id=$_GET['id_vehiculo'];

require 'conexion.php';
$nueva_consulta2= $mysqli->prepare("UPDATE vehiculos SET estado='I' where id_vehiculo=?");
$nueva_consulta2->bind_param('s',$id);

if($nueva_consulta2->execute()){
    echo "<script>";
    echo "alertify.alert('Error', 'Vehiculo eliminado con exito', function(){ window.location = '../../index.php'; });";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alertify.alert('Error', 'Error al eliminar Vehiculo', function(){ window.location = '../../index.php'; });";
    echo "</script>"; 
}
?>