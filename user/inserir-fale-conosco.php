<?php
    include "funcoes_usuario.php";

    $conn = conectarBancoDados();

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome = $dados['nome'];
	$email = $dados['email'];
	$duvida = $dados['duvida'];

    $retornoDaFuncao = inserirFaleConosco($conn, $nome, $email, $duvida);

    if ($retornoDaFuncao == true) {
        echo "Formulario inserido com sucesso.<br>";
    } else {
        echo "Erro ao inserir o formulario.";
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
    <a href="pagina-inicial-usuario.html">Voltar para a página inicial</a>
</body>
</html>