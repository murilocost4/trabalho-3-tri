<?php
function conectarBancoDados():object {
    $usuario = "root";
    $senha = "";
    $conexao = new PDO("mysql:host=localhost;dbname=trabalho-3-tri",$usuario, $senha);

    return $conexao;
}

function inserirProduto(object $conn, $nome, $arquivo, $data_insercao, $descricao):bool {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	$arquivo = $_FILES['imagem'];
	$nome = $dados['nome'];
	$data_insercao = $dados['data_insercao'];
    $descricao = $dados['descricao'];
	$arquivo_blob = file_get_contents($arquivo['tmp_name']);

    $stmt=$conn->prepare("INSERT INTO produtos(nome, imagem, data_insercao, descricao) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $arquivo_blob, PDO::PARAM_STR);
    $stmt->bindParam(3, $data_insercao);
    $stmt->bindParam(4, $descricao, PDO::PARAM_STR);

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
            echo("<form action='detalhe-produto.php' method='post'>");
            echo("<input type='text' id='idproduto' name='idproduto' value='$linha->id' style='background: none; border: none; color: #E2DDCC; width: 1px;'>");
            echo("<button type='submit' class='btnproduto' href='detalhe-produto.php' id='$linha->id' method='get'>");
                    echo('<img src = "data:;base64,'.base64_encode($linha->imagem).'"width = "200" height = ""/>');
                    echo("<br>");
                    echo("<p class='nomeproduto'>$linha->nome</p>");
            echo("</button>");
            echo("</form>");
            echo("</div>");
}
}
function listarFaleConosco(object $conexao):void {
    $comandoSQL = "select * from fale_conosco";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    ?>
    <div class="divtable">
    <table class="tabela" id="tabela-listar">
            <tr>
                <th id="thnome">Nome</th>
                <th id="themail">Email</th>
                <th id="thduvida">Duvida</th>
            </tr>
    <?php
    foreach($registros as $linha){
        echo("  <tr>
                    <td>$linha->nome</td>
                    <td>$linha->email</td>
                    <td>$linha->duvida</td>
                </tr>");
        
    }
    echo("</table>");
    return;
}
function listarInteresse(object $conexao):void {
    $comandoSQL = "select * from interesse";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    ?>
    <div class="divtable">
    <table class="tabela" id="tabela-listar">
            <tr>
                <th id="thnome">Nome</th>
                <th id="thfone">Telefone</th>
                <th id="thprod">Nome do Produto</th>
            </tr>
    <?php
    foreach($registros as $linha){
        echo("  <tr>
                    <td>$linha->nome</td>
                    <td>$linha->fone</td>
                    <td>$linha->nomeproduto</td>
                </tr>");
        
    }
    echo("</table>");
    echo("</div>");
    return;
}
function alterarProduto(object $conn, $nome, $arquivo, $data_insercao, $descricao, $id):bool {

    
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = $dados['idproduto'];
	$arquivo = $_FILES['imagem'];
	$nome = $dados['nome'];
	$data_insercao = $dados['data_insercao'];
    $descricao = $dados['descricao'];
	$arquivo_blob = file_get_contents($arquivo['tmp_name']);

    $stmt=$conn->prepare("UPDATE produtos SET nome=?, imagem=?, data_insercao=?, descricao=? WHERE id = ?");
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $arquivo_blob, PDO::PARAM_STR);
    $stmt->bindParam(3, $data_insercao);
    $stmt->bindParam(4, $descricao, PDO::PARAM_STR);
    $stmt->bindParam(5, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
function excluirProduto(object $conn, $idproduto) {
    $idproduto = $_GET['idproduto'];

    $comandoSQL = "DELETE FROM produtos WHERE id = '$idproduto'";
    $retornoBanco = $conn->prepare($comandoSQL);

    if ($retornoBanco->execute()) {
        header("Location: listar-produtos.php");
    } else {
    }
}
function mostrarProdutoDetalhado(object $conexao, $idproduto) {
    $idproduto = $_POST['idproduto'];
    $comandoSQL = "SELECT * FROM produtos WHERE id = '$idproduto'";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    foreach($registros as $linha){
            echo("<div class='produtodetalhado'>");
            echo("<button type='button' class='btnprodutodetalhado'>");
                    echo('<img src = "data:;base64,'.base64_encode($linha->imagem).'"width = "200" height = ""/>');
                    echo("<br>");
                    echo("<p class='nomeproduto'>$linha->nome</p>");
                    echo("<p class='descricaoproduto'>$linha->descricao</p>");
                    echo("<p class='dataproduto'>$linha->data_insercao</p>");
                    echo("<p class='idproduto'>ID: $linha->id</p>");
                    echo("<form action='enviar.php' method='get'>");
                    echo("<input type='text' id='idproduto' name='idproduto' value='$linha->id' style='background: none; border: none; color: #E2DDCC; width: 2px;'>");
                    echo("<input type='submit' class='btnform' id='excluirbtn' name='excluir' value='Exlcuir'></input>");
                    echo("<input type='submit' class='btnform' id='alterarbtn' name='alterar' value='Alterar'></input>");
                    echo("</form>");
            echo("</button>");
            echo("</div>");
            
    }
    return;
}
?>