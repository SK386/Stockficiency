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
            $validade = $_POST['validade'];
            $garantia = $_POST['garantia'];

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

                        $validade_vazia = true;
                        $garantia_vazia = true;

                            if(strlen($validade) == 0) { $validade_vazia = false; }
                            if(strlen($garantia) == 0) { $garantia_vazia = false; }

                    if ($validade_vazia && $garantia_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco WHERE id_produto=$id_a";
                    
                        } else if ($validade_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, garantia='$garantia' WHERE id_produto=$id_a";
                            
                            } else if ($garantia_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, garantia='$garantia' WHERE id_produto=$id_a";
                                
                                } else { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, validade='$validade', garantia='$garantia' WHERE id_produto=$id_a";}
                    
                    mysqli_query($mysqli, $sql);

                    echo "Produto alterado com sucesso!";
                }
            }
        ?>
        
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>