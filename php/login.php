<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/alertify.css" rel="stylesheet"/> 
    <script src="../js/alertify.js" type="text/javascript"></script>
</head>
<body>
    
</body>
</html>
<?php
    $correo=$_POST['correo']; 
    $password=$_POST['password'];
    require 'conexion.php';
    $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes WHERE correo=? AND contra=? AND estado='A'");    
    $nueva_consulta->bind_param('ss',$correo, $password);
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();

    require 'conexion.php';
    $nueva_consulta1= $mysqli->prepare("SELECT * FROM administrador WHERE usuario=? AND contra=? AND estado='A'");    
    $nueva_consulta1->bind_param('ss',$correo, $password);
    $nueva_consulta1->execute();
    $resultado1=$nueva_consulta1->get_result();
    
    if($resultado->num_rows==1){
        $datos=$resultado->fetch_assoc();
        session_start();
        $_SESSION['id']=$datos['id_cliente'];
        $_SESSION['nombre']=$datos['nombre'].' '.$datos['apellido'];
        $mysqli->close();
        $nueva_consulta->close();

        echo "<script>"; 
        echo "window.location = '../clientes/index.php';";
        echo "</script>"; 
   
    }elseif($resultado1->num_rows==1){
        $datos1=$resultado1->fetch_assoc();
        session_start();
        $_SESSION['id_admin']=$datos1['id_administrador'];
        $mysqli->close();
        $nueva_consulta->close();

        echo "<script>"; 
        echo "window.location = '../admin/index.php';";
        echo "</script>"; 
    }
    else{
        echo "<script>";
        echo "alertify.alert('Error', 'Usuario o Contraseña invalida!', function(){ window.location = '../index.php'; });";
        echo "</script>"; 

    }

    
?>