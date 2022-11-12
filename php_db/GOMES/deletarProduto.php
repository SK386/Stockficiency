<?php
include('conexao.php');

    $cod = $_POST['cod'];

    if(strlen($cod) == 0) {
        echo "Preencha o campo do código!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE codigo_produto='$cod'";
            $consulta = mysqli_query($mysqli, $sql);
                $cons_cod = mysqli_fetch_array($consulta);

        if ($cons_cod == false) {
            echo "Produto não encontrado!";
        
        } else {

            $sql = "DELETE FROM produtos WHERE codigo_produto='$cod'";
                mysqli_query($mysqli, $sql);

            echo "Produto deletado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>