<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}
    $nome = $_POST["nome"];
    $id_categorias = $_POST["categorias"]; 
    $preco = $_POST["preco"];

    $nome_imagem ="";
if(isset($_FILES['imagem_produto']) && !empty($_FILES["imagem_produto"]["name"])){
    $imagem_temp = $_FILES["imagem_produto"]["tmp_name"];
    $destino = '../images/'.$_FILES["imagem_produto"]["name"];
    move_uploaded_file($imagem_temp, $destino);

    $nome_imagem = $_FILES["imagem_produto"]["name"];
}else{
    $nome_imagem = "sem_imagem.png";
}



    include "../php/conexao.php";
    $conn = conectar();

    $sql = "INSERT INTO Produtos (nome, id_categorias, preco, imagem) VALUES ('$nome', $id_categorias, '$preco', '$nome_imagem')";
    $result = mysqli_query($conn, $sql);


    if($result){
        desconectar($conn);
        header('Location: produtos.php');
    }else{
        desconectar($conn);
        header('Location: produto_adicionar.php');
    }





?>
