<?php
    $mysqli=new mysqli('us-cdbr-east-04.cleardb.com','b03e7f218d9523','247651b0','heroku_94eccb7cf9a3cc6');
    if($mysqli->connect_errno):
        echo "Error al conectarse con MySQL debido al error ".$mysqli->connect_error;
    endif;
?>
