<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');

}
$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];

include '../php/conexao.php';
$conn = conectar();



$nome_imagem ="";
if(isset($_FILES['imagem_produto']) && !empty($_FILES["imagem_produto"]["name"])){
    $imagem_temp = $_FILES["imagem_produto"]["tmp_name"];
    $destino = '../images/'.$_FILES["imagem_produto"]["name"];
    move_uploaded_file($imagem_temp, $destino);

    $nome_imagem = $_FILES["imagem_produto"]["name"];
    $sql = "UPDATE Produtos SET nome='$nome', id_categorias=$categoria, preco='$preco', imagem='$nome_imagem' WHERE id=$id";



    
}else{
    $nome_imagem = "sem_imagem.png";
    $sql = "UPDATE Produtos SET nome='$nome', id_categorias=$categoria, preco='$preco' WHERE id=$id";

}



//Atualizar produtos

$result = mysqli_query($conn, $sql);

if($result){
    desconectar($conn);
    header('Location: produtos.php');
}else{
    desconectar($conn);
    echo"Deu erro";
}
