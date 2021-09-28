<?php
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE clientes SET nombre=?,apellido=?,telefono=?,correo=? where id_cliente=?");
$nueva_consulta->bind_param('sssss',$nombre,$apellido,$telefono,$correo,$id);
if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Cliente Actualizado con exito');";  
    echo "window.location = '../clientes.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al actualizar Cliente');";  
    echo "window.location = '../clientes.php';";
    echo "</script>"; 
}
?>