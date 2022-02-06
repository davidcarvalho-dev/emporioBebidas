<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
}

$id = $_GET["id"];
include '../php/conexao.php';
$conn = conectar();

//Recuperar os dados    

$sql = "SELECT * FROM Produtos WHERE id=$id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $nome = $row["nome"];
        $categoria_id = $row["id_categorias"];
    }
}else{
    desconectar($conn);
    header('Location: produtos.php');
}    
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar produto</h1>
    <form action="bd_atualizar_produto.php" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $nome;?>">
        </p>
        <p>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </p>
        <p>Selecione a categoria</p>
        <?php
            $sql = "SELECT * FROM Categorias ORDER BY nome";
            $result= mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<input  type='radio' name='categoria' value='".$row["id"]."'";
                    if($row["id"] == $categoria_id){
                        echo "checked";
                    }
                    echo">" .$row["nome"]."<br />";
                }
            }else{
                echo "Nenhuma categoria cadastrada";
            }
        ?>
        <p>
            <input type="submit" value="Atualizar">
        </p>
    </form>


</body>
</html>