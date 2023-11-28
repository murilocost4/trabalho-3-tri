<?php
include "funcoes.php";

$conn = conectarBancoDados();

    $idproduto = $_GET['idproduto'];
	
    $retornoDaFuncao = excluirProduto( $conn, $idproduto);

if ($retornoDaFuncao == true) {
    header("Location: listar-produtos.php");
} else {
    echo "Erro ao inserir o produto.";
}
?>

