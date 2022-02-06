<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}

$id = $_GET["id"];

include '../php/conexao.php';
$conn = conectar();
$sql = "SELECT * FROM Categorias WHERE id=$id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result))
        $nome = $row["nome"];
}else{
    $nome ="";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editar Categoria</h1>

    <form action="bd_atualizar_categoria.php" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>">
        </p>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <p>
            <input type="submit" value="Atualizar">
        </p>
    </form>
</body>
</html>
