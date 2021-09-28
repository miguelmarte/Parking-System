<?php
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$turno=$_POST['turno'];
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];


require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE administrador SET nombre=?,apellido=?,telefono=?,direccion=?,turno=?,usuario=?,contra=? where id_administrador=?");
$nueva_consulta->bind_param('ssssssss',$nombre,$apellido,$telefono,$direccion,$turno,$usuario,$contra,$id);
if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Administrador Actualizado con exito');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al actualizar Administrador');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}
?>