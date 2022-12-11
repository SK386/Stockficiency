<?php
session_start();
include('../conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 || strlen($senha) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM empresas WHERE email = '$email'";
            $consulta = mysqli_query($mysqli, $sql);
                $coluna = mysqli_fetch_array($consulta);

        if (mysqli_num_rows($consulta) == 0){
            $_SESSION['msg_c'] =  "Cadastro não encontrado!";
            $_SESSION['email'] = $email;
            header('Location: ../../login.php');
   
        } else if (!(password_verify($senha, $coluna["senha"]))){
            $_SESSION['msg_s'] = "Senha incorreta!";
            $_SESSION['email'] = $email;
            header('Location: ../../login.php');

        } else {
            $_SESSION["empresa"] = $coluna["id_empresa"];
            header('Location: ../../produtos.php');
        }
    }
?>
