<?php
    function conectarBancoDados():object {
    $usuario = "root";
    $senha = "";
    $conexao = new PDO("mysql:host=localhost;dbname=trabalho-3-tri",$usuario, $senha);
    
    return $conexao;
}
function inserirFaleConosco(object $conn, $nome, $email, $duvida) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome = $dados['nome'];
	$email = $dados['email'];
	$duvida = $dados['duvida'];

    $stmt=$conn->prepare("INSERT INTO fale_conosco(nome, email, duvida) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $duvida, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
function inserirInteresse(object $conn, $nome, $fone, $nomeproduto) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$nome = $dados['nome'];
	$fone = $dados['fone'];
	$nomeproduto = $dados['nomeproduto'];

    $stmt=$conn->prepare("INSERT INTO interesse(nome, fone, nomeproduto) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $fone, PDO::PARAM_STR);
    $stmt->bindParam(3, $nomeproduto, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
function listarProdutos(object $conexao):void {
    $comandoSQL = "select * from produtos";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    foreach($registros as $linha){
            echo("<div class='produto'>");
            echo("<a href='detalhe-produto.php'>");
            echo("<button type='button' class='btnproduto' href='detalhe-produto.php'>");
                    echo "<figure class='figuraproduto'>";
                    echo('<img src = "data:;base64,'.base64_encode($linha->imagem).'"width = "200" height = ""/>');
                    echo("<br>");
                    echo("<p class='nomeproduto'>$linha->nome</p>");
                    echo "</figure>";
            echo("</button>");
            echo("</a>");
            echo("</div>");
            
    }
    return;
}
function mostrarProdutoDetalhado(object $conexao):void {
    $comandoSQL = "select * from produtos";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    foreach($registros as $linha){
            echo("<div class='produto-detalhado'>");
                    echo "<figure class='figuraproduto'>";
                    echo('<img src = "data:;base64,'.base64_encode($linha->imagem).'"width = "200" height = ""/>');
                    echo("<p class='nomeproduto'>$linha->nome</p>");
                    echo("<p class='descricaoproduto'>$linha->descricao</p>");
                    echo("<p class='dataproduto'>$linha->data_insercao</p>");
                    echo "</figure>";
                    echo("<a href='tenho-interesse.html'><button>Tenho Interesse</button></a>");
            echo("</div>");
            
    }
    return;
}
?>