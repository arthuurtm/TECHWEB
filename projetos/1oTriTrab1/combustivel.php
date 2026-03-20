<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Consumo</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Consumo de Combustível</h3>
        <input type="number" name="distancia" placeholder="Distância (km)" class="form-control mb-2" required>
        <input type="number" step="0.1" name="litros" placeholder="Combustível (L)" class="form-control mb-2" required>
        <button type="submit" name="calcular" class="btn btn-info">Analisar Consumo</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $consumo = $_POST['distancia'] / $_POST['litros'];
        $tipo = $consumo > 12 ? "Econômico" : "Gastador";
        echo "<div class='alert alert-info mt-3'>Média: " . number_format($consumo, 2) . " km/l - <strong>$tipo</strong></div>";
    }
    ?>
</body>
</html>