<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Alterar Encomenda</TITLE>
    </HEAD>
    
    <BODY>
        <form method="POST" action="alterarEncomenda2.php">

        <?php
        include('../conexao.php');

            session_start();
                $_SESSION['origem'] = $_POST['origem'];
                $_SESSION['destino'] = $_POST['destino'];
                $_SESSION['horario'] = $_POST['horario'];
                $_SESSION['observacao'] = $_POST['observacao'];

            $id_encomenda = $_POST['id_encomenda'];
                $_SESSION['id_encomenda'] = $id_encomenda; 


            if(strlen($id_encomenda) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {
                $consulta1 = mysqli_query($mysqli, "SELECT * FROM encomendas WHERE id_encomenda='$id_encomenda'");
                $consulta2 = mysqli_query($mysqli, "SELECT * FROM encomendas_produtos WHERE encomenda_id='$id_encomenda'");

                if (mysqli_num_rows($consulta1) == 0 || mysqli_num_rows($consulta2) == 0) {
                    echo "Encomenda não existe ou não possui nenhum produto associado!";
                
                } else {
                    $x=0;

                    while($coluna = mysqli_fetch_array($consulta2)) { 
                    ?>  
                        <hr>
                        <h4>Produto de ID <?php echo $coluna['produto_id']; ?></h4>
                            
                            Nova quantidade na encomenda*: <br/>
                            <input type="text" size="20" name="qtd[<?php $x; ?>]" />
                                <br/><br/>                
                    <?php
                        $x++;
                    }     
                    ?> 

                <h5>* - Campo opcional</h5>

                <input type="submit" value="Alterar encomenda" />
            </form>
            
        <?php 
                }
            }
        ?>

        <p><a href="alterarEncomenda.html">Voltar</a>
    </BODY>
</HTML>