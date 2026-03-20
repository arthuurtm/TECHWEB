<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Simulador de Desconto</title>
</head>
<body class="container mt-5">
    <form method="POST" class="card p-4 shadow-sm">
        <h3>Simulador de Desconto</h3>
        <input type="number" step="0.01" name="preco" placeholder="Preço Original" class="form-control mb-2" required>
        <select name="desconto" class="form-select mb-2">
            <option value="5">5% de desconto</option>
            <option value="10">10% de desconto</option>
            <option value="15">15% de desconto</option>
        </select>
        <button type="submit" name="calcular" class="btn btn-warning">Aplicar Desconto</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $preco = $_POST['preco'];
        $porcentagem = $_POST['desconto'];
        $economizado = $preco * ($porcentagem / 100);
        $novo_preco = $preco - $economizado;
        
        echo "<div class='alert alert-info mt-3'>
                Economia: R$ " . number_format($economizado, 2) . "<br>
                Novo Preço: R$ " . number_format($novo_preco, 2) . "
              </div>";
    }
    ?>
</body>
</html>