<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Cadastrar Produto</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $nome = $_POST['nome'];
            $qtd = $_POST['qtd'];
            $preco =  str_replace(",", ".", $_POST['preco']);
            $validade = $_POST['validade']; 
            $garantia = $_POST['garantia'];

            if(strlen($empresa_id) == 0 || strlen($nome) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM empresas WHERE id_empresa=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);
            
                if (mysqli_num_rows($consulta) == 0) {
                    echo "O ID da empresa não foi encontrado!";
                
                } else {

                    if (strlen($validade) == 0 && strlen($garantia) == 0) { $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco, empresa_id) VALUES ('$nome', $qtd, $preco, $empresa_id)";
        
                            } else if (strlen($validade) == 0) { $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco, garantia, empresa_id) VALUES ('$nome', $qtd, $preco, '$garantia', $empresa_id)";
        
                                } else if (strlen($garantia) == 0) { $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco, validade, empresa_id) VALUES ('$nome', $qtd, $preco, '$validade', $empresa_id)";
        
                                    } else { $sql = "INSERT INTO produtos (nome_produto, qtd_estoque, preco, validade, garantia, empresa_id) VALUES ('$nome', $qtd, $preco, '$validade', '$garantia', $empresa_id)";}
        
                    mysqli_query($mysqli, $sql);

                echo "Produto cadastrado com sucesso!";
                }
            }
        ?>

        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>