<?php
session_start();
include('../conexao.php');

    $nome = $_POST['nome'];
    $id_a = $_POST['id_produto'];
    $qtd = $_POST['qtd'];
    $preco =  str_replace(",", ".", $_POST['preco']);
    $validade = $_POST['validade'];
    $garantia = $_POST['garantia'];

    if(strlen($id_a) == 0) {
        $_SESSION['msg'] = "Preencha todos os campos obrigatórios!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE id_produto=$id_a";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            $_SESSION['msg'] = "ID do produto não encontrado!";
        
        } else {
            
            $coluna = mysqli_fetch_array($consulta);

                if(strlen($nome) == 0) { $nome = $coluna["nome_produto"]; }
                if(strlen($qtd) == 0) { $qtd = $coluna["qtd_estoque"]; }
                if(strlen($preco) == 0) { $preco = $coluna["preco"]; }

                $validade_vazia = false;
                $garantia_vazia = false;

                    if(strlen($validade) == 0){ $validade_vazia = true; }
                    if(strlen($garantia) == 0) { $garantia_vazia = true; }

            if ($validade_vazia && $garantia_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco WHERE id_produto=$id_a";
            
                } else if ($validade_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, garantia='$garantia' WHERE id_produto=$id_a";
                    
                    } else if ($garantia_vazia) { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, validade='$validade' WHERE id_produto=$id_a";
                        
                        } else { $sql = "UPDATE produtos SET nome_produto='$nome', qtd_estoque=$qtd, preco=$preco, validade='$validade', garantia='$garantia' WHERE id_produto=$id_a";}
            
            mysqli_query($mysqli, $sql);
            
            $_SESSION['msg'] = "Produto alterado com sucesso!";
        }
    }
    header("Location: ../../produtos.php");
?>
