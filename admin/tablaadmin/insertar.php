<?php
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$turno=$_POST['turno'];
$apellido=$_POST['apellido'];
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];

require '../../php/conexion.php';

$sql="INSERT INTO administrador (nombre,apellido,telefono,direccion,turno,usuario,contra) values('$nombre','$apellido','$telefono','$direccion','$turno','$usuario','$contra')";
if($resultado=mysqli_query($mysqli,$sql)){
    echo "<script>";
    echo "alert('Administrador Agregado con exito');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Agregar Administrador');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}
?>