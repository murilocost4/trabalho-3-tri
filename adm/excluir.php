<?php
include "funcoes.php";

$conn = conectarBancoDados();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = $dados['idproduto'];
	
    $retornoDaFuncao = excluirProduto( $conn, $id);

if ($retornoDaFuncao == true) {
    header("Location: listar-produtos.php");
} else {
    echo "Erro ao inserir o produto.";
}
?>

