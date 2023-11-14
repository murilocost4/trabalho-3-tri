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
    ?>
    <table id="tabela-listar">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Data</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
    <?php
    foreach($registros as $linha){
        echo("  <tr>
                    <td>$linha->id</td>
                    <td>$linha->nome</td>
                    <td>$linha->descricao</td>
                    <td>$linha->data_insercao</td>
                    <td><a href='alterar.html'>Alterar</a></td>
                    <td><a href='excluir.html'>Excluir</a></td>
                </tr>");
        
    }
    echo("</table>");
    return;
}
function listarFaleConosco(object $conexao):void {
    $comandoSQL = "select * from fale_conosco";
    $retornoBanco = $conexao -> prepare($comandoSQL);
    $retornoBanco->execute();
    $registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
    ?>
    <table id="tabela-listar">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Duvida</th>
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
    <table id="tabela-listar">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Nome do Produto</th>
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
function excluirProduto(object $conn, $id) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $id = $dados['idproduto'];

    $stmt=$conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>