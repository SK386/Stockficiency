<?php
include('conexao.php');

    $nome = $_POST['nome'];
    $cod = $_POST['cod'];
    $qtd = $_POST['qtd'];
    $preco =  $_POST['preco'];

    if(strlen($nome) == 0 || strlen($cod) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE codigo_produto='$cod'";
            $consulta = mysqli_query($mysqli, $sql);
                $cons_cod = mysqli_fetch_array($consulta);

        if ($cons_cod == true) {
            echo "Código já cadastrado! Por favor, insira um código diferente.";
        
        } else {

            $sql = "INSERT INTO produtos (codigo_produto, nome_produto, qtd_estoque, preco) VALUES ('$cod', '$nome', $qtd, $preco);";
                mysqli_query($mysqli, $sql);

            echo "Produto cadastrado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>