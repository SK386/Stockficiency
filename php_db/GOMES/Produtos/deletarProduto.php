<?php
include('../conexao.php');

    $id_p = $_POST['id_produto'];

    if(strlen($id_p) == 0) {
        echo "Preencha o campo do ID!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE id_produto=$id_p";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            echo "Produto não encontrado!";
        
        } else {

            $sql = "DELETE FROM produtos WHERE id_produto=$id_p";
                mysqli_query($mysqli, $sql);

            echo "Produto deletado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="../index.html">Voltar</a>
    </BODY>
</HTML>