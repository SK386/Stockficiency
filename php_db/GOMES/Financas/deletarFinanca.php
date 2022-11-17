<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Deletar Produto</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $ano = $_POST['ano'];
            $mes = $_POST['mes'];

            if(strlen($empresa_id) == 0 || strlen($ano) == 0 || strlen($mes) == 0 ) {
                echo "Preencha todos os campos!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE empresa_id=$empresa_id AND ano=$ano AND mes=$mes";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "Valores não encontrados!";
                
                } else {


                    $sql = "DELETE FROM financas WHERE empresa_id=$empresa_id AND ano=$ano AND mes=$mes";
                        mysqli_query($mysqli, $sql);

                    echo "Valores deletados com sucesso!";
                }
            }
        ?>

        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>