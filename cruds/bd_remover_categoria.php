<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}

$id= $_GET["id"];

 include "../php/conexao.php";

 $conn = conectar();
 $sql = "DELETE FROM Categorias WHERE id=$id";
 $result = mysqli_query($conn, $sql);

 if($result){
     desconectar($conn);
     header('Location: categorias.php');
 }else{
     desconectar($conn);
     header('Location: categorias.php');
 }



?>