<?php
require_once __DIR__ . '/../../controller/InstrumentController.php';

$controller = new InstrumentController();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $controller->delete($_POST['delete_id']);
}

$instruments = $controller->findAll();
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($instruments as $instrument): ?>
                    <tr>
                        <td><?= $instrument->getId() ?></td>
                        <td><?= $instrument->getName() ?></td>
                        <td><?= $instrument->getDescription() ?></td>
                        <td>R$ <?= number_format($instrument->getPrice(), 2, ',', '.') ?></td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <a href="./InstrumentRegistry.php?id=<?= $instrument->getId() ?>">Editar</a>
                                <form action="" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')"
                                      style="background: none; border: none; padding: 0; margin: 0;">
                                    <input type="hidden" name="delete_id" value="<?= $instrument->getId() ?>">
                                    <button type="submit" style="padding: 0.25rem 0.75rem; font-size: 13px;">Excluir</button>
                                </form>
                            </div>
                        </td>
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