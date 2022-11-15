<?php
include('../conexao.php');

    $empresa_id = $_POST['empresa_id'];
    $nome = $_POST['nome'];
    $qtd = $_POST['qtd'];
    $preco =  str_replace(",", ".", $_POST['preco']);

    if(strlen($empresa_id) == 0 || strlen($nome) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM empresas WHERE id_empresa=$empresa_id";
            $consulta = mysqli_query($mysqli, $sql);
    
        if (mysqli_num_rows($consulta) == 0) {
            echo "O ID da empresa não foi encontrado!";
        
        } else {

        $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco, empresa_id) VALUES ('$nome', $qtd, $preco, $empresa_id);";
            mysqli_query($mysqli, $sql);

        echo "Produto cadastrado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>