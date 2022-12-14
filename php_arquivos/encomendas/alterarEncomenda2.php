<?php
    include('../conexao.php');

        session_start();
            $id_encomenda = $_SESSION['id_encomenda']; 
            $origem = $_SESSION['origem'];
            $destino = $_SESSION['destino'];
            $horario = str_replace("T", " ", $_SESSION['horario']);
            $observacao = $_SESSION['observacao'];

        $qtd = $_POST['qtd'];

//TABELA ENCOMENDAS
        $sql = "SELECT * FROM encomendas WHERE id_encomenda=$id_encomenda";
            $consulta = mysqli_query($mysqli, $sql);
                $coluna = mysqli_fetch_array($consulta);

            if(strlen($origem) == 0)    { $origem =     $coluna["origem"]; }
            if(strlen($destino) == 0)   { $destino =    $coluna["destino"]; }
            if(strlen($horario) == 0)   { $horario =    $coluna["horario_do_envio"]; }
            if(strlen($observacao) == 0){ $observacao = $coluna["observacao"]; }

        $sql = "UPDATE encomendas SET origem='$origem', destino='$destino', horario_do_envio='$horario', observacao='$observacao' WHERE id_encomenda='$id_encomenda'";
            mysqli_query($mysqli, $sql);
    

//TABELA ENCOMENDAS_PRODUTOS
        $sql = "SELECT * FROM encomendas_produtos WHERE encomenda_id=$id_encomenda";
            $consulta = mysqli_query($mysqli, $sql);

        $x = 0;

        while($coluna = mysqli_fetch_array($consulta)) {
                
            if(strlen($qtd[$x]) != 0) {
                $sql = "UPDATE encomendas_produtos SET quantidade=$qtd[$x] WHERE produto_id=$coluna[produto_id] AND encomenda_id='$id_encomenda'";
                    mysqli_query($mysqli, $sql);
            }
                
            $x++;
        }

        $_SESSION['msg'] = "Encomenda alterada com sucesso!";
?>
    <script>window.location.replace("../../encomenda.php");</script>
