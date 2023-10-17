<?php
include "funcoes.php";
$auxconexao= conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
</head>
<body>
    <?php
        echo "Imagens dos produtos no Banco de Dados : <br>";
        mostrarProdutosComImagens($auxconexao);
?>
</body>
</html>