<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $titulo = $_POST['titulo'];
   $genero_id = $_POST['genero_id'];
   $diretor_id = $_POST['diretor_id'];
   $ano = $_POST['ano'];


   $stmt = $pdo->prepare('INSERT INTO filme (titulo, genero_id, diretor_id, ano) VALUES (?, ?, ?, ?)');
   $stmt->execute([$titulo, $genero_id, $diretor_id, $ano]);
 
   header('Location: add_Filme.php');
   exit();
}

$generos = $pdo->query('SELECT id, nome FROM genero')->fetchAll();
$diretores = $pdo->query('SELECT id, nome FROM diretor')->fetchAll();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Filme</title>
</head>
<body>
    <h2>Adicionar Filme</h2>
    <form method="POST">

        <label for="titulo">Título do Filme:</label>
        <input type="text" name="titulo" required><br>

        <label for="genero_id">Genero:</label>

        <select name="genero_id" required>
            <?php foreach ($generos as $genero): ?>
                <option value="<?= $genero['id']?>"><?= $genero['nome'] ?></option>
            <?php endforeach; ?>
        </select><br>


       <label for="diretor_id">Diretor:</label>
       <select name="diretor_id" required>
            <?php foreach ($diretores as $diretor): ?>
                <option value="<?= $diretor['id']?>"><?= $diretor['nome'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="ano">Ano:</label>
        <input type="text" name="ano" required><br>

        <input type="submit" value="Adicionar">
    </form>

    <p><a href="index.php">Voltar</a></p>
    
</body>
</html> 
