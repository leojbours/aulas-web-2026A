<?php
require_once __DIR__ . '/../../controller/TransactionController.php';
require_once __DIR__ . '/../../controller/InstrumentController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TransactionController();
    $controller->salvar();
}

$instrumentController = new InstrumentController();
$instruments = $instrumentController->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Compra</title>
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
</body>
</html>