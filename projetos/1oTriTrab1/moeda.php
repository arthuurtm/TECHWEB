<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Conversor de Moeda</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Conversor de Moeda</h3>
        <input type="number" step="0.01" name="reais" placeholder="Valor em Reais (R$)" class="form-control mb-2" required>
        <input type="number" step="0.01" name="cotacao" placeholder="Cotação do Dólar" class="form-control mb-2" required>
        <button type="submit" name="converter" class="btn btn-success">Converter</button>
    </form>

    <?php
    if (isset($_POST['converter'])) {
        $reais = $_POST['reais'];
        $cotacao = $_POST['cotacao'];
        $dolares = $reais / $cotacao;
        echo "<div class='alert alert-info mt-3'>O valor em dólares é: U$ " . number_format($dolares, 2) . "</div>";
    }
    ?>
</body>
</html>