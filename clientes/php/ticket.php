<?php
  session_start();
  $id_vehiculo=$_GET['id_vehiculo'];
  $id_parqueo=$_GET['id_parqueo'];
  $nombre=$_SESSION['nombre'];

  require 'conexion.php';
  $nueva_consulta= $mysqli->prepare("SELECT * FROM vehiculos where id_vehiculo='$id_vehiculo'");
  $nueva_consulta->execute();
  $resultado=$nueva_consulta->get_result();
  $datos=$resultado->fetch_assoc();

  require 'conexion.php';
  $nueva_consulta1= $mysqli->prepare("SELECT * FROM parqueo where id_parqueo='$id_parqueo'");
  $nueva_consulta1->execute();
  $resultado1=$nueva_consulta1->get_result();
  $datos1=$resultado1->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="style_ticket.css">
</head>
<body>
<a class="atras"href="../index.php">Ir Atras</a>
<br>
<div class="cardWrap">
  <div class="card cardLeft">
    <h1 align="center">Ticket de Parqueo</h1>
    <div class="title">
      <h2>Responsable: <?php echo $nombre ?></h2>

    </div>
    <div class="name">
      <h2>Modelo: <?php echo $datos['modelo']?></h2>
    </div>
    <div class="seat">
      <h2>Matricula: <?php echo $datos['matricula']?></h2>
    </div>
    <div class="time">
      <br>
      <table>
      <th><h2>Planta<h3 class="num">No.<?php echo $datos1['id_piso']?></h3></h2></th> <th><h2>Cubiculo<h3 class="num">No.<?php echo $datos1['parqueo']?></h3></h2></th>
      </table>
    </div>
    
  </div>




</div>
</body>
</html>
