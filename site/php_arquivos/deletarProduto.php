<?php
session_start();
include('conexao.php');

       $id_p = $_POST['id_produto'];

    if(strlen($id_p) == 0) {
        $_SESSION['msg'] = "Preencha o campo do ID!";
    
    } else {

        $sql = "SELECT * FROM produtos WHERE id_produtos=$id_p";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) == 0) {
            $_SESSION['msg'] = "Produto não encontrado!";
        
        } else {

            $sql = "DELETE FROM encomendas_produtos WHERE produto_id=$id_p";
                mysqli_query($mysqli, $sql);

            $sql = "DELETE FROM produtos WHERE id_produtos=$id_p";
                mysqli_query($mysqli, $sql);

            $_SESSION['msg'] = "Produto deletado com sucesso!";
        }
    }
    header("Location: ../estoque.php");
?>

<HTML>
    <BODY>
        <p><a href="index.html">Voltar</a>
    </BODY>
</HTML>
