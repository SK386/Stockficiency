
        <?php
        include('../conexao.php');

            session_start();
                $empresa_id = $_SESSION['empresa_id'];
                $origem = $_SESSION['origem'];
                $destino = $_SESSION['destino'];
                $horario = str_replace("T", " ", $_SESSION['horario']);
                $observacao = $_SESSION['observacao'];
                $qtd_produtos = $_SESSION['qtd_produtos'];

            $produto_id = $_POST['produto_id'];
            $qtd = $_POST['qtd'];

            $vazio = false;
            $produto_inexistente = false;

            for ($i = 0; $i < $qtd_produtos; $i++) {      

                if(strlen($produto_id[$i]) == 0 || strlen($qtd[$i]) == 0) { $vazio = true; }

                $sql = "SELECT * FROM produtos WHERE id_produto='$produto_id[$i]' AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);
                        if (mysqli_num_rows($consulta) == 0){ $produto_inexistente = true; }
            }

                if ($vazio) {
                    $_SESSION['msg'] = "Preencha todos os campos!";

                } else if ($produto_inexistente){
                    $_SESSION['msg'] = "Algum produto selecionado não foi encontrado!";
                
                } else {

                    $sql = "INSERT INTO encomendas (origem, destino, horario_do_envio, observacao, empresa_id) VALUES ('$origem', '$destino', '$horario', '$observacao', $empresa_id);";
                        mysqli_query($mysqli, $sql);
                            $ultimo_id = mysqli_insert_id($mysqli);

                    for ($i = 0; $i < $qtd_produtos; $i++) {

                        $sql = "INSERT INTO encomendas_produtos (encomenda_id, produto_id, quantidade) VALUES ($ultimo_id, $produto_id[$i], $qtd[$i]);";
                            mysqli_query($mysqli, $sql);
                    }    
                    
                    $_SESSION['msg'] = "Encomenda registrada com sucesso!";
                }
                
                header("Location: ../../encomenda.php");
        ?>
