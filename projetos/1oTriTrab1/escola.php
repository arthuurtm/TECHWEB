<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sistema Escolar</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Média Escolar</h3>
        <input type="number" step="0.1" name="n1" placeholder="Nota 1" class="form-control mb-2" required>
        <input type="number" step="0.1" name="n2" placeholder="Nota 2" class="form-control mb-2" required>
        <input type="number" step="0.1" name="n3" placeholder="Nota 3" class="form-control mb-2" required>
        <button type="submit" name="calcular" class="btn btn-dark">Calcular Média</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $media = ($_POST['n1'] + $_POST['n2'] + $_POST['n3']) / 3;
        $classe = $media >= 7 ? 'text-success' : 'text-danger';
        $status = $media >= 7 ? 'Aprovado' : 'Reprovado';
        
        echo "<div class='alert alert-info mt-3'>
                Média: " . number_format($media, 1) . " - <span class='$classe fw-bold'>$status</span>
              </div>";
    }
    ?>
</body>
</html>