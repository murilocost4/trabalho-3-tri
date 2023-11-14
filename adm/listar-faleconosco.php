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
    <div class="content">
        <?php
            include "funcoes.php";
            $conn = conectarBancoDados();

            listarFaleConosco($conn);

            $conn = null;
        ?>
    </div>

    <footer>
        Nome da empresa - desenvolvido por: Murilo e Gustavo
    </footer>
    </div>
</body>
</html>