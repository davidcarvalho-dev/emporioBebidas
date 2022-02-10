<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}
    $nome = $_POST["nome"];
    $id_categorias = $_POST["categorias"]; 
    $preco = $_POST["preco"];

    include "../php/conexao.php";
    $conn = conectar();

    $sql = "INSERT INTO Produtos (nome, id_categorias, preco) VALUES ('$nome', $id_categorias, '$preco')";
    $result = mysqli_query($conn, $sql);


    if($result){
        desconectar($conn);
        header('Location: produtos.php');
    }else{
        desconectar($conn);
        header('Location: produto_adicionar.php');
    }





?>
