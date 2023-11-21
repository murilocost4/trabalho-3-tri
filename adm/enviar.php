<?php
    include "funcoes.php";

    $conn = conectarBancoDados();

    $idproduto = $_GET['idproduto'];

    if(isset($_GET['excluir'])) {
        excluirProduto($conn, $idproduto);
    } else if(isset($_GET['alterar'])) {
        header("Location: alterar.html");
    }
?>