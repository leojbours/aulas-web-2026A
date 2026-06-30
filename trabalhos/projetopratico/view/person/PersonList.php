<?php
require_once __DIR__ . '/../../controller/PersonController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $controller = new PersonController();
    $controller->delete($_POST['delete_id']);
}

$controller = new PersonController();
$persons = $controller->findAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pessoas</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2>Pessoas cadastradas</h2>
    <?php if (count($persons) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($persons as $person): ?>
                    <tr>
                        <td><?= $person->getId() ?></td>
                        <td><?= $person->getName() ?></td>
                        <td><?= $person->getAdressRoad() ?></td>
                        <td><?= $person->getAdressNumber() ?></td>
                        <td><?= $person->getCEP() ?></td>
                        <td><?= $person->getCity() ?></td>
                        <td><?= $person->getState() ?></td>
                        <td>
                            <a href="./PersonRegistry.php?id=<?= $person->getId() ?>">Editar</a>
                            <form action="" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                <input type="hidden" name="delete_id" value="<?= $person->getId() ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma pessoa cadastrada.</p>
    <?php endif; ?>
    <div class="nav-links">
        <a href="../index.html">Voltar a página inicial</a>
        <a href="./PersonRegistry.php">Cadastrar nova pessoa</a>
    </div>
</body>
</html>