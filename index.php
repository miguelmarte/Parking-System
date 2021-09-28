<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:clientes/index.php");
    die();
}if(isset($_SESSION['id_admin'])){
    header("location:admin/index.php");
    die();
}else{
     
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="UTF-8">
<title>Parking System</title>
<script src="js/jquery.min.js" type="text/javascript"></script>

<link href="css/bootstrap.min.css" rel="stylesheet"/>    
<link href="css/style_login.css" rel="stylesheet"/>    
  
<link rel="icon" type="image/png" href="imagenes/par.png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>

<body>
    <form action="php/login.php" method="POST">
    <div class="container formulario">
         <div class="row">
               <div class="col-xs-4 col-xs-offset-4  ">
                <img src="imagenes/parking_logo.png" class="logo center-block">
                </div>
            
        </div>
         <div class=" espaciado">
                
                </div>
        <div class="row">
            <fieldset class="col-xs-10 col-xs-offset-1">
            

                <legend class="hidden-xs">
                    <h3>Inicio de Ses&iacute;on</h3>
                </legend>
            
                    
                    <div class="form-group">
                    <label class="col-xs-12" for="correo"><h4>Correo Electronico</h4></label>
                 <div class="col-xs-10 col-xs-offset-1">
                    <i class="material-icons">
                        account_circle
                        </i>   
                    <input type="text" id="correo" name="correo" class="form-control Input" required>
                     
                        
                        </div>
                    
                    </div>
                    <div class="form-group">
                    <label class="col-xs-12" for="password"><h4>Password</h4></label>
                 <div class="col-xs-10 col-xs-offset-1">
                    <i class="material-icons">
                        vpn_key
                        </i>
                        <input type="password" id="password" name="password" class="form-control col-xs-12 Input" required>
                      
                        </div>
                    
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Iniciar Sesion</button>                       
                    </div>



                 
                </form>

                <a href="registro.php" id="registrar">No tienes una cuenta</a>
            </fieldset>
        
        </div>
    </div>
    

</body>
</html>
