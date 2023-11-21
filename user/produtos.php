<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles-user.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Nome da empresa</h1>
        </header>
        <nav>
            <a href="pagina-inicial-usuario.html" class="navbar">Página inicial</a>
            <a href="fale-conosco.html" class="navbar">Fale Conosco</a>
        </nav>
        <div class="content">
            <h2>Produtos</h2>
            <?php
            include "funcoes_usuario.php";
            $conn = conectarBancoDados();

            listarProdutos($conn);

            $conn = null;
            ?>
        </div>
        <footer>
            Nome da empresa - desenvolvido por: Murilo e Gustavo
        </footer>
        </div>
</body>
</html>