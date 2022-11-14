<?php
include('conexao.php');

    $nome = $_POST['nome'];
    $cod_a = $_POST['cod_antigo'];
    $qtd = $_POST['qtd'];
    $preco =  $_POST['preco'];

    if(strlen($nome) == 0 || strlen($cod_a) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
        echo "Preencha todos os campos!";
        
    } else {
            
        $sql = "SELECT * FROM produtos WHERE codigo_produto='$cod_a'";
            $consulta = mysqli_query($mysqli, $sql);
              
        if (mysqli_num_rows($consulta) == 0) {
            echo "Código não encontrado!";
           
        } else {
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