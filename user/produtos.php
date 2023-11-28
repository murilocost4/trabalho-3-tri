<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <header>
        <div class="divnavegacao">
            <nav class="navegacao">
                <a class="linknav" href="produtos.php"><button class="navbtn" id="navbtnativo">Produtos</button></a>
                <a class="linknav" href="fale-conosco.html"><button class="navbtn">Fale Conosco</button></a>
            </nav>
        </div>
        <div class="divadm">
            <p>Usuário</p>   
        </div>
    </header>
    <div class="content" id="contentlistar">
    <h1>LolSkins</h1><br>
        <div class="listaprodutos">
            <?php
                include "funcoes.php";
                $conn = conectarBancoDados();

                listarProdutos($conn);

                $conn = null;
            ?>
            <br>
        </div>
    </div>


    <footer>
        <p>LolSkins - desenvolvido por:<br>Murilo e Gustavo</p>
    </footer>
    </div>
</body>
</html>