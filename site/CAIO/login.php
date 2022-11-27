<?php
session_start();
include('../php_arquivos/conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 || strlen($senha) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM empresas WHERE email = '$email'";
            $consulta = mysqli_query($mysqli, $sql);
                $coluna = mysqli_fetch_array($consulta);

        if (mysqli_num_rows($consulta) == 0){
            echo "Cadastro não encontrado!";
   
        } else if ($senha != $coluna["senha"]){
            echo "Senha incorreta!";

        } else {
        
            $_SESSION["empresa"]=$coluna["id_empresa"];
            header('Location: ../');
            
        }
    }
?>
