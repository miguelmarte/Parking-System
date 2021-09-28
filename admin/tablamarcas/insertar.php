<?php
$marca=$_POST['marca'];

require '../../php/conexion.php';

$sql="INSERT INTO marcas_vehiculos (marca) values('$marca')";
if($resultado=mysqli_query($mysqli,$sql)){
    echo "<script>";
    echo "alert('Marca Agregada con exito');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Agregar Marca');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}
?>