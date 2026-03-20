<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Calculadora de IMC</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Calculadora de IMC</h3>
        <input type="number" step="0.01" name="peso" placeholder="Peso (kg)" class="form-control mb-2" required>
        <input type="number" step="0.01" name="altura" placeholder="Altura (m)" class="form-control mb-2" required>
        <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $imc = $peso / ($altura ** 2);
        echo "<div class='alert alert-info mt-3'>Seu IMC é: " . number_format($imc, 2) . "</div>";
    }
    ?>
</body>
</html>