<?php
include('conexao.php');

    $email = $_POST['usuario'];
    $senha = $_POST['password'];

    if(strlen($_POST['usuario']) == 0 || strlen($_POST['password']) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $consulta = mysqli_query($mysqli, $sql);
        $coluna = mysqli_fetch_array($consulta);

        if (mysqli_num_rows($consulta) == 0){
            echo "Cadastro não encontrado!";
   
        } else if ($senha == $coluna["senha"]){
            
           header('Location: inicial.php');
        
        } else {
            echo "Senha incorreta!";
        }

    } 
?>

