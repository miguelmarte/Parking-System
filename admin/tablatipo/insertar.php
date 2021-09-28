<?php
$tipo=$_POST['tipo'];

require '../../php/conexion.php';

$sql="INSERT INTO tipo_vehiculos (tipo) values('$tipo')";
if($resultado=mysqli_query($mysqli,$sql)){
    echo "<script>";
    echo "alert('Tipo Agregado con exito');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Agregar Tipo');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}
?>