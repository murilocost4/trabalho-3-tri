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
?>