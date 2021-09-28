<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE parqueo SET estado='A' where id_parqueo=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Parqueo habilitado con exito');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al habilitar Parqueo');";  
    echo "window.location = '../parqueos.php';";
    echo "</script>"; 
}
?>