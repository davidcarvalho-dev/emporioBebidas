<?php

    function conectar() {
    $servidor = "localhost";
    $banco = "admin";
    $usuario = "admin";
    $senha = "admin123";

    $conn = mysqli_connect($servidor, $usuario, $senha, $banco);

    if(!$conn){
        die("Erro: ". mysqli_connect_error());
    }

    return $conn;
    }
    
    function desconectar($conn){
        mysqli_close($conn);
    }


?>