<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE tipo_vehiculos SET estado='I' where id_tipo=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Tipo eliminado con exito');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al eliminar Tipo');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}
?>