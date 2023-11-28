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
    <header>
        <div class="divnavegacao">
            <nav class="navegacao">
                <a class="linknav" href="listar-produtos.php"><button class="navbtn" id="navbtnativo">Produtos</button></a>
                <a class="linknav" href="listar-interesse.php"><button class="navbtn">Interesses</button></a>
                <a class="linknav" href="listar-faleconosco.php"><button class="navbtn">Dúvidas</button></a>
                <a class="linknav" href="inserir-produto.html"><button class="navbtn">Inserir</button></a>
            </nav>
        </div>
        <div class="divadm">
            <p>Administrador</p>   
        </div>
    </header>
    <div class="content">
    <h1>LolSkins</h1><br>
        <div class="inserirprodutosdiv">
            <h3>Formulário de Alteração de Produto</h3>
            <form class="formularioinserir"action="alterar.php" method="post" enctype="multipart/form-data">
                <?php
                    $variavelId = $_GET['idproduto'];
                    include "funcoes.php";
                    $conectar = conectarBancoDados();
                    
                    $sql = "SELECT * FROM produtos WHERE id = '$variavelId'";
                    $stmt = $conectar->prepare($sql);
                    $stmt->execute();
                    $arrayMostrarProdutos = $stmt->fetchAll(PDO::FETCH_OBJ);

                    foreach($arrayMostrarProdutos as $produtos) {
                        $nomeantigo = $produtos->nome;
                        $descricaoantiga = $produtos->descricao;
                        $dataantiga = $produtos->data_insercao;
                    }

                ?>
                <input type="hidden" name="idproduto" id="idproduto" value="<?php echo($_GET['idproduto']) ?>" required><br><br>
                
                <label for="nome">Nome do Produto</label><br>
                <input type="text" name="nome" id="nome" value="<?php echo($nomeantigo) ?>" required><br><br>
                <p class="labelinferior">nome</p>

                <label for="descricao">Descrição do Produto</label><br>
                <input type="text" name="descricao" id="descricao" value="<?php echo($descricaoantiga) ?>" required><br><br>
                <p class="labelinferior">descrição</p>

                <label for="imagem">Imagem do Produto</label><br>
                <input type="file" name="imagem" id="imagem" accept="image/*"><br><br>
                <p class="labelinferior">imagem</p>

                <label for="data_insercao">Data</label><br>
                <input type="date" name="data_insercao" id="data_insercao" value="<?php echo($dataantiga) ?>" required><br><br>
                <p class="labelinferior">data</p>

                <input id="btninserir" type="submit" value="Alterar">
                <br>
            </form>
            <br>
        </div>
    </div>


    <footer>
        <p>LolSkins - desenvolvido por:<br>Murilo e Gustavo</p>
    </footer>
    </div>
</body>
</html>
