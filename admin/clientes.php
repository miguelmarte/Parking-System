<?php
    session_start();
    if(isset($_SESSION['id_admin'])){
        include('cabeza.php');
        include('menu.php');
    }else{
        header("location:../index.php");
        die();  
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style_admin.css">
    <script src="js/alertify.js"></script>
    <link rel="stylesheet" href="css/alertify.css">
</head>
<body>

<div class="row">
     
        <table class="table table-hover table-condensed table-bordered" id="tabladinamica">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Correo Electronico</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
            <?php  
                require '../php/conexion.php';
                $nueva_consulta= $mysqli->prepare("SELECT * FROM clientes where estado='A'");
                $nueva_consulta->execute();
                $resultado=$nueva_consulta->get_result();
                while($datos=$resultado->fetch_assoc()){
                   
                    
            ?>
            <tr>
                <td><?php echo $datos['id_cliente']?></td>
                <td><?php echo $datos['nombre']?></td>
                <td><?php echo $datos['correo']?></td>
              
                <td>
                    <button class="btn btn-warning "onclick="editar(<?php echo $datos['id_cliente'] ?>)">Editar</button>
                
                    <button class="btn btn-danger" onclick="preguntarSiNo(<?php echo $datos['id_cliente'] ?>)">Eliminar</button>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        </table>    
    </div>
    <script>
        function preguntarSiNo(id){
                alertify.confirm('Eliminar cliente', '¿Esta seguro de eliminar este Cliente?', function(){ eliminarDatos(id) }
                            , function(){ alertify.error('Cancelado')});
        }
        function eliminarDatos(id){
            location.href='tablacliente/eliminar.php?id='+id;

        }
        function editar(id){
            location.href='tablacliente/editar.php?id='+id;

    }   
    </script>


</body>
</html>
