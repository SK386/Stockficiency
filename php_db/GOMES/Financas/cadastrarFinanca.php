<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Cadastrar Produto</TITLE>
    </HEAD>

    <BODY>
        <?php
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $despesas = $_POST['despesas'];
            $ganhos = $_POST['ganhos'];
            $ano = $_POST['ano'];
            $mes = $_POST['mes']; 
            

            if(strlen($empresa_id) == 0 || strlen($despesas) == 0 || strlen($ganhos) == 0 || strlen($ano) == 0 || strlen($mes) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM empresas WHERE id_empresa=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);
            
                if (mysqli_num_rows($consulta) == 0) {
                    echo "O ID da empresa não foi encontrado!";
              
                
                } else {

                    $sql = "INSERT INTO financas (despesas, ganhos, ano, mes, empresa_id) VALUES ($despesas, $ganhos, $ano, $mes, $empresa_id)";}
        
                    mysqli_query($mysqli, $sql);

                echo "Valores declarados com sucesso!";
                }
            
        ?>

        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>