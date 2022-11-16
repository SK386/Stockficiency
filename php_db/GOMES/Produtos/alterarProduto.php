<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Alterar Produto</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $nome = $_POST['nome'];
            $id_a = $_POST['id_antigo'];
            $qtd = $_POST['qtd'];
            $preco =  str_replace(",", ".", $_POST['preco']);

            if(strlen($id_a) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM produtos WHERE id_produto=$id_a";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "ID do produto não encontrado!";
                
                } else {
                    
                    $coluna = mysqli_fetch_array($consulta);

                        if(strlen($nome) == 0) { $nome = $coluna["nome_produto"]; }
                        if(strlen($qtd) == 0) { $qtd = $coluna["qtd_estoque"]; }
                        if(strlen($preco) == 0) { $preco = $coluna["preco"]; }

                    $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco WHERE id_produto=$id_a";
                        mysqli_query($mysqli, $sql);

                    echo "Produto alterado com sucesso!";
                }
            }
        ?>
        
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>