<?php
$id=$_GET['id'];

require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE clientes SET estado='I' where id_cliente=?");
$nueva_consulta->bind_param('s',$id);

if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Cliente eliminado con exito');";  
    echo "window.location = '../clientes.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al eliminar Cliente');";  
    echo "window.location = '../clientes.php';";
    echo "</script>"; 
}
?>