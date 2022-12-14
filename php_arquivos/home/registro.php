<?php
session_start();
include('../conexao.php');

    $nome_e = $_POST['nome_e'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];

        $sql = "SELECT * FROM empresas WHERE email='$email' OR cnpj='$cnpj'";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) != 0) {
            $_SESSION["msg_e"] = "Email/CNPJ já cadastrado!";
            $_SESSION['email'] = $email;
                ?><script>window.location.replace("../../register.php");</script><?php
        
        } else {

        $senhaS = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO empresas (nome_empresa, email, cnpj, cep, senha) VALUES ('$nome_e', '$email', '$cnpj', '$cep', '$senhaS')";
                mysqli_query($mysqli, $sql);

            $_SESSION["msg_C"] = "Login criado com sucesso!";
            $_SESSION['email'] = $email;
                ?><script>window.location.replace("../../login.php");</script><?php
        }
?>