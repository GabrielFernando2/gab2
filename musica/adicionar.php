<?php
include 'config.php';

// Inserir nova música
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $imagem_path = '';

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_path = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_path);
    }

    $sql = "INSERT INTO musicas (titulo, imagem_path, descricao) VALUES ('$titulo', '$imagem_path', '$descricao')";
    $conn->query($sql);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Nova Música</title>
</head>
<body>

    <h1>Adicionar Nova Música</h1>
    <form action="adicionar.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="imagem">Imagem:</label><br>
        <input type="file" name="imagem" id="imagem" accept="image/*"><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" id="descricao" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Adicionar Música</button>
    </form>

</body>
</html>
