<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ajuste Salarial</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Ajuste Salarial</h3>
        <input type="number" step="0.01" name="salario" placeholder="Salário Atual" class="form-control mb-2" required>
        <input type="number" step="0.01" name="aumento" placeholder="Percentual de Aumento (%)" class="form-control mb-2" required>
        <button type="submit" name="ajustar" class="btn btn-primary">Calcular Novo Salário</button>
    </form>

    <?php
    if (isset($_POST['ajustar'])) {
        $antigo = $_POST['salario'];
        $novo = $antigo + ($antigo * ($_POST['aumento'] / 100));
        echo "<div class='alert alert-info mt-3'>
                Salário Antigo: R$ " . number_format($antigo, 2) . "<br>
                Novo Salário: R$ " . number_format($novo, 2) . "
              </div>";
    }
    ?>
</body>
</html>