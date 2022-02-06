<?php
    session_start();

    include "conexao.php";
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $conn = conectar();


    $sql = "SELECT * FROM Usuario WHERE usuario='$usuario' AND senha='$senha'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['apelido'] = $row['apelido'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['usuario'] = $usuario;

        }
        desconectar($conn);
        header('Location: perfil.php');
    }else{
        desconectar($conn);
        header('Location: login.php');
    }

?>