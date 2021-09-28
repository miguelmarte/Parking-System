<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE administrador SET estado='I' where id_administrador=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Administrador Eliminado con exito');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al Eliminar Administrador');";  
    echo "window.location = '../admin.php';";
    echo "</script>"; 
}
?>