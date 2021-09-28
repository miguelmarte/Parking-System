<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE parqueo SET estado='I' where id_parqueo=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Parqueo deshabilitado con exito');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al deshabilitar Parqueo');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}
?>