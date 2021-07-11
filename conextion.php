<?php

    $host = "localhost";
    $user = "root";
    $conextion_pass = "";
    $db_name = "login";
    $conexion = mysqli_connect($host, $user, $conextion_pass, $db_name);
    if(mysqli_connect_error()){
            echo "Falha na Conexão: ".mysqli_connect_error();
    }else{
        
    }
?>