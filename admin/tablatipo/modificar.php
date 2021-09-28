<?php
$id=$_POST['id'];
$tipo=$_POST['tipo'];


require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE tipo_vehiculos SET tipo=? where id_tipo=?");
$nueva_consulta->bind_param('ss',$tipo,$id);
if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Tipo Actualizado con exito');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al actualizar Tipo');";  
    echo "window.location = '../tipo_vehiculos.php';";
    echo "</script>"; 
}
?>