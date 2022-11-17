<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Deletar Registro</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $periodo = $_POST['periodo'];

            if(strlen($empresa_id) == 0 || strlen($periodo) == 0) {
                echo "Preencha todos os campos!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "Registro não encontrado!";
                
                } else {

                    $sql = "DELETE FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                        mysqli_query($mysqli, $sql);

                    echo "Registro deletado com sucesso!";
                }
            }
        ?>

        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>