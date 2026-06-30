<?php
require_once __DIR__ . '/../../controller/InstrumentController.php';

$controller = new InstrumentController();
$instrument = null;

if (isset($_GET['id'])) {
    $instrument = $controller->findById($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->edit($_POST['id']);
    } else {
        $controller->save();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $instrument != null ? 'Editar' : 'Cadastrar' ?> Instrumento</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2><?= $instrument != null ? 'Editar' : 'Cadastro de' ?> Instrumento</h2>
    <form action="" method="POST">
        <?php if ($instrument != null): ?>
            <input type="hidden" name="id" value="<?= $instrument->getId() ?>">
        <?php endif; ?>

        <label>Nome</label>
        <input type="text" name="name" value="<?= $instrument != null ? htmlspecialchars($instrument->getName()) : '' ?>" required>

        <label>Preço</label>
        <input type="number" name="price" step="0.01" min="0" value="<?= $instrument != null ? $instrument->getPrice() : '' ?>" required>

        <label>Descrição</label>
        <input type="text" name="description" value="<?= $instrument != null ? htmlspecialchars($instrument->getDescription()) : '' ?>">

        <button type="submit"><?= $instrument != null ? 'Salvar alterações' : 'Cadastrar' ?></button>
    </form>
    <div class="nav-links">
        <a href="../index.html">Voltar a tela inicial</a>
        <a href="./InstrumentList.php">Ver instrumentos cadastrados</a>
    </div>
</body>
</html>