<?php
    session_start();
    if(isset($_SESSION['id'])){
        $id=$_SESSION['id'];

    }else{
        header("location:../index.php");
        die();  
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking System</title>
    <link rel="icon" type="image/png" href="img/par.png">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8f73687074.js" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <link href="css/new-age.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/alertify.js"></script>
    <link rel="stylesheet" href="css/alertify.css">

</head>

<body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <img src="img/iphoneblanco2.PNG" class="logo" alt="">
            <a class="navbar-brand js-scroll-trigger" id="bienvenido" href="#page-top"><?php echo $_SESSION['nombre']?> Bienvenido a Parking System</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              
        Menu
        <i class="fas fa-bars"></i>
      </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <hr>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#features">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="salir.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
            <div class="row">
                <div class="col-sm-6" id="arriba">
                    <h2 class="reg-v">Vehiculos Registrados</h2>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Año</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require 'php/conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM vehiculos where estado='A' AND id_cliente='$id'");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                                ?>
                                <tr>
                                <th><?php echo $datos['marca']?></th>
                                <td><?php echo $datos['modelo']?></td>
                                <td><?php echo $datos['ano']?></td>
                                <td>
                                
                                <button onclick="preguntarSiNo(<?php echo $datos['id_vehiculo']?>)">Eliminar</button>
                                <button onclick="aparcar(<?php echo $datos['id_vehiculo']?>)">Aparcar</button>
                                <?php
                                    $matricula=$datos['matricula'];
                                    require 'php/conexion.php';
                                    $nueva_consulta1= $mysqli->prepare("SELECT * FROM parqueo where estado='I' AND matricula='$matricula'");
                                    $nueva_consulta1->execute();
                                    $resultado1=$nueva_consulta1->get_result();
                                    $datos1=$resultado1->fetch_assoc();
                                    
                                    
                                    if($resultado1->num_rows==1){

                                        ?>
                                        <button onclick="ticket(<?php echo $datos1['id_parqueo']?>,<?php echo $datos['id_vehiculo']?>)">Ticket</button>
                                        <?php
                                    }
                                ?>
                                </td>
                                
                                </tr>
                         <?php   
                            }
        
                        ?>
                            
                        </tbody>
                        </table>
                    
                </div>
                <div class="col-sm-6" id="abajo">
                    <h2 class="mb-5" >Registrar un Vehiculo</h2>
                    <form action="php/registrar_vehiculo.php" method="post" >
                        <label >Matricula</label>
                        <br>
                        <input name="matricula" type="text" required>
                        <br>
                        <label >Marca</label>
                        <br>
                        <select name="marca" id="">
                        
                            <option value="0" selected disabled>Eliga la Marca</option>

                            <?php
                            require 'php/conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM marcas_vehiculos where estado='A'");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                                ?>
                                <option value="<?php echo $datos['marca']?>"><?php echo $datos['marca']?></option>
                         <?php   
                            }
        
                        ?>

                        </select>
                        <br>
                        <label >Tipo</label>
                        <br>
                        <select name="tipo" id="" required>
                            <option value="0" selected disabled>Eliga el tipo</option>
                            <?php
                            require 'php/conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM tipo_vehiculos where estado='A'");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                                ?>
                                <option value="<?php echo $datos['tipo']?>"><?php echo $datos['tipo']?></option>
                         <?php   
                            }
        
                        ?>
                        </select>
                        <br>
                        <label >Modelo</label>
                        <br>
                        <select name="modelo" id="">
                            <option value="0" selected disabled>Eliga el modelo</option>
                            <?php
                            require 'php/conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM modelo_vehiculos where estado='A'");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                                ?>
                                <option value="<?php echo $datos['modelo']?>"><?php echo $datos['modelo']?></option>
                         <?php   
                            }
        
                        ?>
                        </select>
                        <br>
                        <label >Año</label>
                        <br>
                        <select name="ano" id="">
                            <option value="0" selected disabled>Eliga el año</option>
                            <?php
                            require 'php/conexion.php';
                            $nueva_consulta= $mysqli->prepare("SELECT * FROM ano_vehiculos where estado='A' order by ano DESC");
                            $nueva_consulta->execute();
                            $resultado=$nueva_consulta->get_result();
                            while($datos=$resultado->fetch_assoc()){
                                ?>
                                <option value="<?php echo $datos['ano']?>"><?php echo $datos['ano']?></option>
                         <?php   
                            }
        
                        ?>
                        </select>
                        <br>
                        <button id="reg" type="submit">Registrar vehiculo</button>
                    </form>
                </div>
                
        </div>
                        
                    
        </header>

        <section class="features" id="features">
            <div class="container">
                <div class="section-heading text-center">
                    <hr>
                    <h2 id="acerca">Acerca de Parking System</h2>
                    <p class="text-muted">Esto es lo que somos!</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 my-auto">
                        <div class="device-container">
                            <div class="device-mockup iphone6_plus portrait white">
                                <div class="device">
                                    <div class="screen">

                                        <img src="img/iphoneblanco2.png" class="img-fluid" alt="">
                                    </div>
                                    <div class="button">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 my-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="icon-screen-smartphone text-primary"></i>
                                        <h3>Multiplataforma</h3>
                                        <p class="text-muted">Reserva tu bloque de parqueo desde cualquier dispositivo que tenga a mano!</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="icon-camera text-primary"></i>
                                        <h3>Facil de utilizar</h3>
                                        <p class="text-muted">La app te guiará todo el tiempo para que puedas reservar tu parqueo con éxito!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="icon-present text-primary"></i>
                                        <h3>Pagos en linea</h3>
                                        <p class="text-muted">Paga tu factura del parqueadero desde la comodidad de tu movil!</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-item">
                                        <i class="icon-lock-open text-primary"></i>
                                        <h3>Registrate una vez y entra cuando quieras</h3>
                                        <p class="text-muted">La app recuerda tu cuenta dando así más comodidad para cuando decidas volver al establecimiento, solo llena el espacio de matricula del vehiculo y listo!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact bg-primary" id="contact">
            <div class="container">
                <h2>Contáctanos</h2>
                <h4>Llama al: 809-000-0001</h4>
                <ul class="list-inline list-social">
                    <li class="list-inline-item social-twitter">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item social-facebook">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item social-google-plus">
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; J&B corporation. Todos los derechos reservados.</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="file:///Users/kingb/Desktop/startbootstrap-new-age-gh-pages/terminos.html">Terminos y condiciones</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </div>
        </footer>


        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="js/new-age.min.js"></script>

        <script>
        function preguntarSiNo(id){
            alertify.confirm('Eliminar Vehiculo', '¿Esta seguro de eliminar este Vehiculo?', function(){ eliminarDatos(id) }
                        , function(){ alertify.error('Cancelado')});
    }
    function eliminarDatos(id){
        location.href='php/eliminarvehiculo.php?id_vehiculo='+id;

}

    function aparcar(id){
        location.href='pago/index.php?id_vehiculo='+id;
    }

    function ticket(id_parqueo,id_vehiculo){
        
        location.href='php/ticket.php?id_parqueo='+id_parqueo+'&id_vehiculo='+id_vehiculo;
    }

    </script>

</body>

</html>