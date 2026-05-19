<?php
require_once __DIR__ . '/../../controller/TransactionController.php';
$controller = new TransactionController();
$transactions = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Compras</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2>Compras registradas</h2>
    <?php if (count($transactions) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comprador</th>
                    <th>Data</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= $transaction->getId() ?></td>
                        <td><?= $transaction->getBuyerName() ?></td>
                        <td><?= $transaction->getOccurredAt() ?></td>
                        <td>R$ <?= number_format($transaction->getTotalValue(), 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma compra registrada.</p>
    <?php endif; ?>
    <div class="nav-links">
        <a href="../index.html">Voltar a tela inicial</a>
        <a href="./TransactionRegistry.php">Registrar nova compra</a>
    </div>
</body>
</html>