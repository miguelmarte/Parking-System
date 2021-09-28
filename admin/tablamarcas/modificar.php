<?php
$id=$_POST['id'];
$marca=$_POST['marca'];


require '../../php/conexion.php';
$nueva_consulta= $mysqli->prepare("UPDATE marcas_vehiculos SET marca=? where id_marca=?");
$nueva_consulta->bind_param('ss',$marca,$id);
if($nueva_consulta->execute()){
    echo "<script>";
    echo "alert('Marca Actualizada con exito');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}else{
    echo "<script>";
    echo "alert('Error al actualizar Marca');";  
    echo "window.location = '../marcas_vehiculos.php';";
    echo "</script>"; 
}
?>