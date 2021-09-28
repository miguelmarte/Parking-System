<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE marcas_vehiculos SET estado='I' where id_marca=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Marca eliminada con exito');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al eliminar Marca');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}
?>