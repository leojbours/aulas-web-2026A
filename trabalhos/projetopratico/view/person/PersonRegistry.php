<?php
require_once __DIR__ . '/../../controller/PersonController.php';

$controller = new PersonController();
$person = null;

if (isset($_GET['id'])) {
    $person = $controller->findById($_GET['id']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && $_POST['id'] !== '') {
        $controller->edit($_POST['id']);
    } else {
        $controller->save();
    }
    header("Location: ./PersonList.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $person != null ? 'Editar' : 'Cadastrar' ?> Pessoa</title>
    <link rel="stylesheet" href="../../resources/styles/default.css">
</head>
<body>
    <h2><?= $person != null ? 'Editar' : 'Cadastro de' ?> Pessoa</h2>
    <form action="" method="POST">
        <?php if ($person != null): ?>
            <input type="hidden" name="id" value="<?= $person->getId() ?>">
        <?php endif; ?>

        <label>Nome</label>
        <input type="text" name="name" value="<?= $person != null ? htmlspecialchars($person->getName()) : '' ?>" required>

        <label>CEP</label>
        <input type="text" name="cep" id="cep" value="<?= $person != null ? htmlspecialchars($person->getCEP()) : '' ?>" required>

        <label>Rua</label>
        <input type="text" name="adress_road" id="adress_road" value="<?= $person != null ? htmlspecialchars($person->getAdressRoad()) : '' ?>" required>

        <label>Número</label>
        <input type="text" name="adress_number" value="<?= $person != null ? htmlspecialchars($person->getAdressNumber()) : '' ?>" required>

        <label>Cidade</label>
        <input type="text" name="city" id="city" value="<?= $person != null ? htmlspecialchars($person->getCity()) : '' ?>" required>

        <label>Estado</label>
        <input type="text" name="state" id="state" value="<?= $person != null ? htmlspecialchars($person->getState()) : '' ?>" required>

        <button type="submit"><?= $person != null ? 'Salvar alterações' : 'Cadastrar' ?></button>
    </form>

    <div class="nav-links">
        <a href="../index.html">Voltar a tela inicial</a>
        <a href="./PersonList.php">Ver pessoas cadastradas</a>
    </div>

    <script>
        document.getElementById('cep').addEventListener('blur', async function () {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) return;

            const response = await fetch('https://viacep.com.br/ws/' + cep + '/json/');
            const data = await response.json();

            if (data.erro) return;

            document.getElementById('adress_road').value = data.logradouro;
            document.getElementById('city').value = data.localidade;
            document.getElementById('state').value = data.uf;
        });
    </script>
</body>
</html>