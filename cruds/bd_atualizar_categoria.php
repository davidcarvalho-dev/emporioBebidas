<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}

$id = $_POST["id"];
$nome = $_POST["nome"];


include "../php/conexao.php";
$conn = conectar();
$sql = "UPDATE Categorias SET nome='$nome' WHERE id=$id";
$result = mysqli_query($conn, $sql);

if($result){
    desconectar($conn);
    header('Location: categorias.php');
}else{
    desconectar($conn);
    header('Location: categoria_editar.php');

}
?>  