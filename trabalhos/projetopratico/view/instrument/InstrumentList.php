<?php
require_once __DIR__ . '/../../controller/InstrumentController.php';
$controller = new InstrumentController();
$instruments = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Instrumentos</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2>Instrumentos cadastrados</h2>
    <?php if (count($instruments) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($instruments as $instrument): ?>
                    <tr>
                        <td><?= $instrument->getId() ?></td>
                        <td><?= $instrument->getName() ?></td>
                        <td><?= $instrument->getDescription() ?></td>
                        <td>R$ <?= number_format($instrument->getPrice(), 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum instrumento cadastrado.</p>
    <?php endif; ?>
    <div class="nav-links">
        <a href="../index.html">Voltar a página inicial</a>
        <a href="./InstrumentRegistry.php">Cadastrar novo instrumento</a>
    </div>
</body>
</html>