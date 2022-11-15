<?php
session_start();
include('conexao.php');

    $nome = $_POST['nome'];
    $id_a = $_POST['id_produto'];
    $qtd = $_POST['qtd'];
    $preco =  str_replace(",", ".", $_POST['preco']);

    if(strlen($id_a) == 0) {
        $_SESSION['msg'] = "Preencha todos os campos obrigatórios!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE id_produtos=$id_a";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            $_SESSION['msg'] = "ID do produto não encontrado!";
        
        } else {
            
            $coluna = mysqli_fetch_array($consulta);

                if(strlen($nome) == 0) { $nome = $coluna["nome_produto"]; }
                if(strlen($qtd) == 0) { $qtd = $coluna["qtd_estoque"]; }
                if(strlen($preco) == 0) { $preco = $coluna["preco"]; }

            $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco WHERE id_produtos=$id_a";
                mysqli_query($mysqli, $sql);

            $_SESSION['msg'] = "Produto alterado com sucesso!";
        }
    }
    header("Location: ../estoque.php");
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>
