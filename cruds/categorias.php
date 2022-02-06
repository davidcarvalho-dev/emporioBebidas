<?php
session_start();
if(isset($_SESSION['apelido'])){
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body>
    <h1>Categorias</h1>
    <a href="categorias_adicionar.php"><h3>Adicionar</h3></a>

    <?php
        include "../php/conexao.php";

        $conn = conectar();

        $sql = "SELECT * FROM Categorias ORDER BY nome";
        $result = mysqli_query($conn, $sql);

        echo "<ul>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<li>".$row["nome"]. "<a href='categoria_editar.php?id=".$row["id"]."'>|EDITAR </a> | <a href='bd_remover_categoria.php?id=".$row["id"]."'>REMOVER|</a></li>" ;
            }
        }else{
            echo "Nenhuma categoria cadastradada";
        }
        echo "</ul>";

        desconectar($conn);
    ?>
    
</body>
</html>
<?php
}else{
    header('Location: ../index.php');
}
?>