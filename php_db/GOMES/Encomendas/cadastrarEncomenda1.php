<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Registrar Encomenda</TITLE>
    </HEAD>

    <BODY>
        <?php 
        include('../conexao.php');

            if(strlen($_POST['empresa_id']) == 0 || strlen($_POST['origem']) == 0 || strlen($_POST['destino']) == 0 || strlen($_POST['horario']) == 0 || strlen($_POST['qtd_produtos']) == 0 || $_POST['qtd_produtos'] < 1) {
                echo "Nem todos os campos obrigatórios foram preenchidos ou um número inválido de produtos foi inserido!";
        
                ?> <br/><br/> <a href="cadastrarEncomenda.html">Voltar</a> <?php   

            } else {

                $id_empresa = $_POST['empresa_id'];
                    $sql = "SELECT * FROM empresas WHERE id_empresa=$id_empresa";
                        $consulta = mysqli_query($mysqli, $sql);
                
                if (mysqli_num_rows($consulta) == 0) {
                    echo "O ID da empresa não foi encontrado!";

                    ?> <br/><br/> <a href="cadastrarEncomenda.html">Voltar</a> <?php
        
                } else {
            
                    ?> <form method="POST" action="cadastrarEncomenda2.php"> <?php

                    session_start();
                        $_SESSION['empresa_id'] = $_POST['empresa_id'];
                        $_SESSION['origem'] = $_POST['origem'];
                        $_SESSION['destino'] = $_POST['destino'];
                        $_SESSION['horario'] = $_POST['horario'];
                        $_SESSION['observacao'] = $_POST['observacao'];

                        $qtd_p = $_POST['qtd_produtos'];
                            $_SESSION['qtd_produtos'] = $qtd_p;

                    for ($i = 0; $i < $qtd_p; $i++) {
                    ?>
                        <hr>
                        <h4>Produto n° <?php echo $i+1; ?></h4>

                        ID do produto: <br/>
                        <input type="text" size="20" name="produto_id[<?php $i; ?>]" />
                            <br/><br/>
                        
                        Quantidade na encomenda: <br/>
                        <input type="text" size="20" name="qtd[<?php $i; ?>]" />
                            <br/><br/>

                    <?php
                    }
                    ?>

                    <br/><input type="submit" value="Finalizar registro" />
                </form>

        <?php
                }
            }
        ?>

    </BODY>
</HTML>