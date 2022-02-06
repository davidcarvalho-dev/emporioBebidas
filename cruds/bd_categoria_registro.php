<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}
    $nome = $_POST["nome"];

    include "../php/conexao.php";
    $conn = conectar();

    $sql = "INSERT INTO Categorias (nome) VALUES ('$nome') ";
    $result = mysqli_query($conn, $sql);


    if($result){
        desconectar($conn);
        header('Location: categorias.php');
    }else{
        desconectar($conn);
        header('Location: categorias_adicionar.php');
    }





?>
