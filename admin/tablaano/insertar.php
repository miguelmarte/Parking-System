<?php
$ano=$_POST['ano'];

require '../../php/conexion.php';

$sql="INSERT INTO ano_vehiculos (ano) values('$ano')";
if($resultado=mysqli_query($mysqli,$sql)){
    echo "<script>";
    echo "alert('Año Agregado con exito');";  
    echo "window.location = '../ano_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Agregar Año');";  
    echo "window.location = '../ano_vehiculos.php';";
    echo "</script>"; 
}
?>