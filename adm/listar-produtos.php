<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-adm.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Nome da empresa</h1>
        <p id="adm-id">Administrador</p>
    </header>
    <div class="content" id="contentlistar">
        <?php
            include "funcoes.php";
            $conn = conectarBancoDados();

            listarProdutos($conn);

            $conn = null;
        ?>
        <br>
        <a href="index-adm.html">Voltar para a página inicial</a>
    </div>


    <footer>
        Nome da empresa - desenvolvido por: Murilo e Gustavo
    </footer>
    </div>
</body>
</html>