<?php
include 'config.php';

// Excluir música
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM musicas WHERE id = $id";
    $conn->query($sql);
}

// Buscar músicas
$sql = "SELECT * FROM musicas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Músicas Pops</title>
    <style>
        .musica-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            width: 300px;
        }
        .musica-item img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <h1>Músicas Pops</h1>
    <a href="adicionar.php">Adicionar Nova Música</a>

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="musica-item">
            <h2><?php echo htmlspecialchars($row['titulo']); ?></h2>
            <?php if ($row['imagem_path']): ?>
                <img src="<?php echo htmlspecialchars($row['imagem_path']); ?>" alt="Imagem da música">
            <?php endif; ?>
            <p><?php echo htmlspecialchars($row['descricao']); ?></p>
            <a href="?delete=<?php echo $row['id']; ?>">Excluir</a>
        </div>
    <?php endwhile; ?>

</body>
</html>
