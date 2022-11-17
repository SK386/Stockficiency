<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Alterar Produto</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $ano = $_POST['ano'];
            $mes = $_POST['mes'];
            $despesas = $_POST['despesas'];
            $ganhos = $_POST['ganhos'];
           

            if(strlen($empresa_id) == 0 || strlen($ano) == 0 || strlen($mes) == 0 ) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE ano=$ano AND mes=$mes AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    echo "Valores não encontrados!";
                
                } else {
                    
                    $coluna = mysqli_fetch_array($consulta);

                        if(strlen($ganhos) == 0) { $ganhos = $coluna["ganhos"]; }
                        if(strlen($despesas) == 0) { $despesas = $coluna["despesas"]; }
                        

                     $sql = "UPDATE financas SET ganhos=$ganhos, despesas=$despesas WHERE ano=$ano AND mes=$mes AND empresa_id=$empresa_id";
                    
                    mysqli_query($mysqli, $sql);

                    echo "Valores alterados com sucesso!";
                }
            }
        ?>
        
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>