<?php
include('conexao.php');

    $nome = $_POST['nome'];
    $cod_a = $_POST['cod_antigo'];
    $qtd = $_POST['qtd'];
    $preco =  $_POST['preco'];

    if(strlen($cod_a) == 0) {
        echo "Preencha todos os campos obrigatórios!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE codigo_produto='$cod_a'";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            echo "Código do produto não encontrado!";
        
        } else {
            
            $coluna = mysqli_fetch_array($consulta);

                if(strlen($nome) == 0) { $nome = $coluna["nome_produto"]; }
                if(strlen($qtd) == 0) { $qtd = $coluna["qtd_estoque"]; }
                if(strlen($preco) == 0) { $preco = $coluna["preco"]; }

            $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco WHERE codigo_produto='$cod_a'";
                mysqli_query($mysqli, $sql);

            echo "Produto alterado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>