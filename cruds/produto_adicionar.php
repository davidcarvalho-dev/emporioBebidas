<?php
session_start();
if(!isset($_SESSION['apelido'])){
    header('Location: ../php/login.php');
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
    <form action="bd_produto_registro.php" method="POST">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <?php
        include "../php/conexao.php";

        $conn = conectar();

        $sql = "SELECT * FROM Categorias ORDER BY nome";
        $result = mysqli_query($conn, $sql);

    
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<p><label>Categoria <br /><input type='radio' name='categorias' value='".$row['id']."'> ".$row['nome']."</label></p>";
            }
        }else{
            echo "Nenhuma categoria cadastradada";
        }
        desconectar($conn);
        ?>
        <p>
            <input type="submit" value="Adicionar">
        </p>

        

    </form>
</body>
</html>
