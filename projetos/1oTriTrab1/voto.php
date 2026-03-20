<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Verificador de Idade</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Pode Votar?</h3>
        <input type="number" name="ano" placeholder="Ano de Nascimento" class="form-control mb-2" required>
        <button type="submit" name="verificar" class="btn btn-secondary">Verificar</button>
    </form>

    <?php
    if (isset($_POST['verificar'])) {
        $idade = date('Y') - $_POST['ano'];
        $pode_votar = $idade >= 16 ? "Sim, já possui idade para votar." : "Não, ainda não possui idade para votar.";
        echo "<div class='alert alert-info mt-3'>Idade: $idade anos. <br> $pode_votar</div>";
    }
    ?>
</body>
</html>