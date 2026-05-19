<?php
require_once __DIR__ . '/../../controller/InstrumentController.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new InstrumentController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Instrumento</title>
</head>
<body>
    <h2>Cadastro de Instrumento</h2>
    <form action="" method="POST">
        <label>Nome</label>
        <input type="text" name="name" required>
        <br>
        <label>Preço</label>
        <input type="number" name="price" step="0.01" min="0" required>
        <br>
        <label>Descrição</label>
        <input type="text" name="description">
        <br>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="lista.php">Ver instrumentos cadastrados</a>
</body>
</html>