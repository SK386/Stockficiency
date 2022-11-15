<?php
include('conexao.php');

    $cod = $_POST['cod'];


        $sql = "SELECT * FROM produtos WHERE codigo_produto='$cod'";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            echo "Produto não encontrado!";
        
        } else {

            $sql = "DELETE FROM produtos WHERE codigo_produto='$cod'";
                mysqli_query($mysqli, $sql);

            echo "Produto deletado com sucesso!";
            
            header("Location: ../estoque.php");
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>
