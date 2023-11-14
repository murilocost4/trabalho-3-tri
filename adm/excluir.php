<?php
include "funcoes.php";

$conn = conectarBancoDados();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = $dados['idproduto'];
	
    $retornoDaFuncao = excluirProduto( $conn, $id);

if ($retornoDaFuncao == true) {
    echo "Produto excluido com sucesso.<br>";
} else {
    echo "Erro ao inserir o produto.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index-adm.html">Voltar para a página inicial</a>
</body>
</html>
