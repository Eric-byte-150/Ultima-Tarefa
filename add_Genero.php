<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $nome = $_POST['nome'];

   $stmt = $pdo->prepare('INSERT INTO genero (nome) VALUES (?)');
   $stmt->execute([$nome]);
 
   header('Location: add_Genero.php');
   exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Genero</title>
</head>
<body>
    <h2>Adicionar Genero</h2>
    <form method="POST">

        <label for="nome">Nome do Genero:</label>
        <input type="text" name="nome" required><br>

        <input type="submit" value="Adicionar">
    </form>

  
     <p><a href="index.php">Voltar</a></p>


</body>
</html> 
