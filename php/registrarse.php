<?php
$nombre=$_POST['nombre']; 
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$contra=$_POST['contra'];
$telefono=$_POST['telefono'];


    require 'conexion.php';
    $sql="INSERT INTO clientes (nombre,apellido,telefono,correo,contra) values('$nombre','$apellido','$telefono','$correo','$contra')";
    if($resultado=mysqli_query($mysqli,$sql)){
        echo "<script>";
        echo "alert('Registro Exitoso');";  
        echo "window.location = '../index.php';";
        echo "</script>"; 
    }else{
        echo "<script>";
        echo "alert('Error al registrarse');";  
        echo "window.location = '../registro.php';";
        echo "</script>"; 
    }
    $mysqli->close();
    $consulta1->close();
  
?>