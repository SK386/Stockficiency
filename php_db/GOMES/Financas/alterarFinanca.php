<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Alterar Registros</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $periodo = $_POST['periodo'];
            $ganhos = str_replace(",", ".", $_POST['ganhos']);
            $despesas = str_replace(",", ".", $_POST['despesas']);
           
            if(strlen($empresa_id) == 0 || strlen($periodo) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "Registro não encontrado!";
                
                } else {
                    
                    $coluna = mysqli_fetch_array($consulta);
                        if(strlen($ganhos) == 0) { $ganhos = $coluna["ganhos"]; }
                        if(strlen($despesas) == 0) { $despesas = $coluna["despesas"]; }
                        
                    $sql = "UPDATE financas SET ganhos=$ganhos, despesas=$despesas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                        mysqli_query($mysqli, $sql);

                    echo "Registro alterado com sucesso!";
                }
            }
        ?>
        
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>