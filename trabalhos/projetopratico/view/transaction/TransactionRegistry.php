<?php
require_once __DIR__ . '/../../controller/TransactionController.php';
require_once __DIR__ . '/../../controller/InstrumentController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TransactionController();
    $controller->save();
}

$instrumentController = new InstrumentController();
$instruments = $instrumentController->findAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Compra</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2>Registrar Compra</h2>
    <form action="" method="POST">
        <label>Nome do comprador</label>
        <input type="text" name="buyer_name" required>
        <br><br>
        <label>Instrumentos</label>
        <br>
        <?php foreach ($instruments as $instrument): ?>
            <label>
                <input type="checkbox" name="instrument_ids[]" value="<?= $instrument->getId() ?>">
                <?= $instrument->getName() ?> — R$ <?= number_format($instrument->getPrice(), 2, ',', '.') ?>
            </label>
            <br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Registrar</button>
    </form>
    <div class="nav-links">
        <a href="../index.html">Voltar a tela inicial</a>
        <a href="./TransactionList.php">Listar compras</a>
    </div>
</body>
</html>