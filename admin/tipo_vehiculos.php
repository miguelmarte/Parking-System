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
    <button class="btn btn-primary "onclick="agregar()">Agregar</button>     
        <table class="table table-hover table-condensed table-bordered" id="tabladinamica">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th></th>
                   
                </tr>
            </thead>
            <tbody>
            <?php  
                require '../php/conexion.php';
                $nueva_consulta= $mysqli->prepare("SELECT * FROM tipo_vehiculos where estado='A'");
                $nueva_consulta->execute();
                $resultado=$nueva_consulta->get_result();
                while($datos=$resultado->fetch_assoc()){
                   
                    
            ?>
            <tr>
                <td><?php echo $datos['id_tipo']?></td>
                <td><?php echo $datos['tipo']?></td>
                <td><?php echo $datos['estado']?></td>
                <td>
                    <button class="btn btn-warning "onclick="editar(<?php echo $datos['id_tipo'] ?>)">Editar</button>
                    <button class="btn btn-danger" onclick="preguntarSiNo(<?php echo $datos['id_tipo'] ?>)">Eliminar</button>
                    
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
                alertify.confirm('Eliminar Tipo', '¿Esta seguro de eliminar este Tipo?', function(){ eliminarDatos(id) }
                            , function(){ alertify.error('Cancelado')});
        }
        function eliminarDatos(id){
            location.href='tablatipo/eliminar.php?id='+id;

        }
        
    function agregar(){
            location.href='tablatipo/agregar.php';

    }  
    function editar(id){
            location.href='tablatipo/editar.php?id='+id;

    }   
    </script>


</body>
</html>
