<?php
include('../conexao.php');

    $nome = $_POST['nome'];
    $qtd = $_POST['qtd'];
    $preco =  $_POST['preco'];

    if(strlen($nome) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco) VALUES ('$nome', $qtd, $preco);";
            mysqli_query($mysqli, $sql);

        echo "Produto cadastrado com sucesso!";
    }
?>

<HTML>
    <BODY>
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>