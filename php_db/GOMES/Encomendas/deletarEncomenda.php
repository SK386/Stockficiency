<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Concluir Encomenda</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $id_encomenda = $_POST['id_encomenda'];

            if(strlen($id_encomenda) == 0) {
                echo "Preencha o campo do ID!";
            
            } else {

                $sql = "SELECT * FROM encomendas WHERE id_encomenda=$id_encomenda";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "Encomenda não encontrada!";
                
                } else {
                    $sql = "DELETE FROM encomendas_produtos WHERE encomenda_id=$id_encomenda";
                        mysqli_query($mysqli, $sql);
                    
                    $sql = "DELETE FROM encomendas WHERE id_encomenda=$id_encomenda";
                        mysqli_query($mysqli, $sql);

                    echo "Encomenda concluída com sucesso!";
                }
            }
        ?>

        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>