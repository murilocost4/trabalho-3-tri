<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    
    <div class="content">
        <h1 style="margin-top: 60px;">LolSkins</h1>
        <div class="sobrenos">
            <h5>Faça Login</h5 style="order: 1;">
            <form class="formulario" method="POST" action="" style="order: 3;">
            <input type="text" id="usuario" name="usuario" placeholder="Usuário"><br>
            <input type="password" id="senha" name="senha" placeholder="Senha"><br>
            <input type="submit" id="entrar" value="Entrar">
        </form>
        <?php
            function conectarBancoDados():object {
                $usuario = "root";
                $senha = "";
                $conexao = new PDO("mysql:host=localhost;dbname=trabalho-3-tri",$usuario, $senha);
            
                return $conexao;
            }
            function validarLogin(object $conexao, $usuario, $senha) {          
                $sql = "SELECT * FROM administradores WHERE usuario = ? AND senha = ?";
            
                    $stmt = $conexao->prepare($sql);
                    $stmt->bindParam(1, $usuario, PDO::PARAM_STR);
                    $stmt->bindParam(2, $senha, PDO::PARAM_STR);
                    $stmt->execute();
                    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    if ($resultado) {
                        return true;
                    } else {
                        return false;
                    }
            }
            $conexao = conectarBancoDados();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_POST["usuario"];
                $senha = $_POST["senha"];
            
                if (validarLogin($conexao, $usuario, $senha)) {
                    header("Location: adm/listar-produtos.php");
                    exit;
                } else {
                    echo("<div id='loginfalhou' style='order: 2; font-size: 13px; border: 0.125em solid tomato; padding-left: 8px; padding-right: 8px; border-radius: 8px; background-color: rgba(255, 211, 211, 1); width: 200px'>
                            <p>Usuário ou senha incorreta.</p>
                        </div>");
                }
            }
        ?>
        </div>
    </div>
    <footer>
        <p>LolSkins - desenvolvido por:<br>Murilo e Gustavo</p>
    </footer>
</div>
</body>
</html>