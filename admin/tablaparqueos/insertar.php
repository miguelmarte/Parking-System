<?php
$piso=$_POST['piso'];
$parqueo=$_POST['parqueo'];


require '../../php/conexion.php';

$sql="INSERT INTO parqueo (id_piso,parqueo) values('$piso','$parqueo')";
if($resultado=mysqli_query($mysqli,$sql)){
    echo "<script>";
    echo "alert('Parqueo Agregado con exito');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Agregar parqueo');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}
?>