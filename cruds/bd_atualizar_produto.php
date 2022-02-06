<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');

}
$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];

include '../php/conexao.php';
$conn = conectar();

//Atualizar produtos

$sql = "UPDATE Produtos SET nome='$nome', id_categorias=$categoria WHERE id=$id";
$result = mysqli_query($conn, $sql);

if($result){
    desconectar($conn);
    header('Location: produtos.php');
}else{
    desconectar($conn);
    echo"Deu erro";
}


?>
