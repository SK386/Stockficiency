<?php
session_start();
include('../conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 || strlen($senha) == 0) {
        echo "Preencha todos os campos!";

    
    } else {

        $sql = "SELECT * FROM empresas WHERE email='$email'";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) != 0) {
            $_SESSION["msg_e"] = "Email já cadastrado!";
            $_SESSION['email'] = $email;
            header("Location: ../../register.php");
        
        } else {

        $senhaS = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO empresas (email, senha) VALUES ('$email', '$senhaS')";
                mysqli_query($mysqli, $sql);

            $_SESSION["msg_C"] = "Login criado com sucesso!";
            $_SESSION['email'] = $email;
            header("Location: ../../login.php");
        }
    }
    
    
?>
