<?php
    $pagina_setada = isset($_GET['pag']) ? $_GET['pag'] : null;
    $caminho_final = null;

    if ($pagina_setada) {
        $caminho_final = $pagina_setada . '.php';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .video-background iframe {
            width: 100vw;
            height: 56.25vw; /* Proporção 16:9 */
            min-height: 100vh;
            min-width: 177.77vh; /* Proporção 16:9 */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }
    </style>
</head>
<body class="container mt-5 text-white"> <?php if (!$pagina_setada): ?>
        <div class="video-background">
            <div class="overlay"></div>
            <iframe 
                src="https://www.youtube.com/embed/LhWO6_tpCXM?autoplay=1&mute=1&loop=1&playlist=LhWO6_tpCXM&controls=0&showinfo=0&rel=0" 
                frameborder="0" 
                allow="autoplay; encrypted-media">
            </iframe>
        </div>
    <?php endif; ?>

    <h1 class="mb-4">Trabalho 1º Trimestre 2026</h1>

    <div class="mb-4">
        <a href="?pag=imc" class="btn btn-primary">Calcular IMC</a>
        <a href="?pag=moeda" class="btn btn-primary">Converter Real para Dólar</a>
        <a href="?pag=voto" class="btn btn-primary">Idade Voto</a>
        <a href="?pag=escola" class="btn btn-primary">Média Escolar</a>
        <a href="?pag=desconto" class="btn btn-primary">Simulador de Desconto</a>
        <a href="?pag=combustivel" class="btn btn-primary">Consumo de Combustível</a>
        <a href="?pag=terreno" class="btn btn-primary">Área de Terreno</a>
        <a href="index.php" class="btn btn-light">Limpar</a>
    </div>

    <div class="<?php echo $pagina_setada ? 'content-box text-dark' : ''; ?>">
        <?php 
        if ($caminho_final && file_exists($caminho_final)) {
            include $caminho_final;
        } elseif (!$pagina_setada) {
            echo "<h3>Bem-vindo ao sistema!</h3><p>Escolha uma opção acima para começar.</p>";
        } else {
            echo "<div class='alert alert-danger'>Página não encontrada!</div>";
        }
        ?>
    </div>

</body>
</html>