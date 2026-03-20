<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Área de Terreno</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Cálculo de Área</h3>
        <input type="number" step="0.01" name="largura" placeholder="Largura (m)" class="form-control mb-2" required>
        <input type="number" step="0.01" name="comprimento" placeholder="Comprimento (m)" class="form-control mb-2" required>
        <button type="submit" name="calcular" class="btn btn-dark">Calcular Área</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $area = $_POST['largura'] * $_POST['comprimento'];
        echo "<div class='alert alert-info mt-3'>A área total do terreno é: " . number_format($area, 2) . " m²</div>";
    }
    ?>
</body>
</html>