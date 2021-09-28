<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../css/alertify.css" rel="stylesheet"/> 
    <script src="../../js/alertify.js" type="text/javascript"></script>
</head>
<body>
    
</body>
</html>
<?php 
session_start();
$id_cliente=$_SESSION['id'];
$id=$_SESSION['id_vehiculo'];
$matricula=$_SESSION['matricula'];

require '../../php/conexion.php';
$nueva_consulta6= $mysqli->prepare("SELECT * FROM parqueo where estado='I' AND matricula='$matricula'");
$nueva_consulta6->execute();
$resultado6=$nueva_consulta6->get_result();
if($resultado6->num_rows==0){
    require '../../php/conexion.php';
    $nueva_consulta= $mysqli->prepare("SELECT * FROM vehiculos where estado='A' AND id_vehiculo='$id'");
    $nueva_consulta->execute();
    $resultado=$nueva_consulta->get_result();
    $datos=$resultado->fetch_assoc();

    require '../../php/conexion.php';
    $nueva_consulta1= $mysqli->prepare("SELECT * FROM parqueo where estado='I' AND matricula='$matricula'");
    $nueva_consulta1->execute();
    $resultado1=$nueva_consulta1->get_result();
    $datos1=$resultado1->fetch_assoc();

        
    if($resultado1->num_rows==0){
        require '../../php/conexion.php';
        $nueva_consulta2= $mysqli->prepare("SELECT * FROM parqueo where estado='A' AND id_piso='2' LIMIT 1");
        $nueva_consulta2->execute();
        $resultado2=$nueva_consulta2->get_result();
        $datos2=$resultado2->fetch_assoc(); 
        if($resultado2->num_rows==0){
            echo "<script>";
            echo "alertify.alert('Error', 'Estacionamiento lleno', function(){ window.location = '../../index.php'; });";
            echo "</script>"; 

        }else{
            $id=$datos2['id_parqueo'];
            require '../../php/conexion.php';
            $nueva_consulta3= $mysqli->prepare("UPDATE parqueo SET estado='I',matricula='$matricula' where id_parqueo=?");
            $nueva_consulta3->bind_param('s',$id);
            $nueva_consulta3->execute();
        }
    }else{
        $id=$datos1['id_parqueo'];
        require '../../php/conexion.php';
        $nueva_consulta3= $mysqli->prepare("UPDATE parqueo SET estado='I' where id_parqueo=?");
        $nueva_consulta3->bind_param('s',$id);
        $nueva_consulta3->execute();
    }
        ini_set('date.timezone','America/Santo_Domingo');
        $fecha=date('Y-m-d',time());
        
        require '../../php/conexion.php';
        $sql="INSERT INTO facturacion (id_cliente,matricula,fecha) values('$id_cliente','$matricula','$fecha')";

        if($resultado=mysqli_query($mysqli,$sql)){
            echo "<script>";
            echo "alertify.alert('Alerta', 'Pago exitoso', function(){ window.location = '../../index.php'; });";
            echo "</script>"; 

        }

}else{
    echo "<script>";
    echo "alertify.alert('Error', 'Este vehiculo ya esta registrado para aparcar', function(){ window.location = '../../index.php'; });";
    echo "</script>"; 
}
?>
