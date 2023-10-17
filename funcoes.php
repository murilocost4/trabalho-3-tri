<?php
    function conectar(): object {
        $host = "localhost";
        $dbname = "inf3am";
        $usuario_bd = "root";
        $senha_bd = "";

        try {
            $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario_bd, $senha_bd);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de conexão com o banco de dados: " . $e->getMessage());
        }
        return $conexao;
    }
function mostrarProdutosComImagens(object $conexao):void{
$comandoSQL = "select * from pdorutos";
$retornoBanco = $conexao -> prepare($comandoSQL);
$retornoBanco->execute();
$registros = $retornoBanco->fetchall(PDO::FETCH_OBJ);
foreach($registros as $linha){
    if($linha-> imagem <>null){
        echo"<figure>";
         echo'<img smc="data:;base64, "'.base64_encode($linha->imagem).'"width=200" height=""/>';

        echo"<figure>";
}

}
}

?>