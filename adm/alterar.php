<?php
include "funcoes.php";

$conn = conectarBancoDados();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $idproduto = $dados['idproduto']; 
    echo('inserindo o negocio'.$idproduto);
	$arquivo = $_FILES['imagem'];
	$nome = $dados['nome'];
	$data_insercao = $dados['data_insercao'];
    $descricao = $dados['descricao'];
	$arquivo_blob = file_get_contents($arquivo['tmp_name']);  


    $retornoDaFuncao = alterarProduto( $conn, $nome, $arquivo_blob, $data_insercao, $descricao, $idproduto);

if ($retornoDaFuncao == true) {
    Header("Location: listar-produtos.php");
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
