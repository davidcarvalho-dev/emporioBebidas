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
    <title>Produtos</title>
</head>
<body>
    <h1>Produtos</h1>
    <a href="produto_adicionar.php"><h3>Adicionar</h3></a>

    <?php
        include "../php/conexao.php";

        $conn = conectar();

        $sql = "SELECT * FROM Produtos ORDER BY nome";
        $result = mysqli_query($conn, $sql);

        echo "<ul>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<li>" .$row["nome"] .$row["preco"]. "<a href='produto_editar.php?id=".$row["id"]."'>Editar</a> <a href='bd_remover_produto.php?id=".$row["id"]."'>REMOVER|</a>". "<img src='../images/".$row["imagem"]."'"."</li>";
            }
        }else{
            echo "Nenhuma produto cadastrado";
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