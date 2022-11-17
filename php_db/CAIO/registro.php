<?php
include('conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(strlen($email) == 0 || strlen($senha) == 0) {
        echo "Preencha todos os campos!";
    
    } else {

        $sql = "SELECT * FROM empresas WHERE email='$email'";
            $consulta = mysqli_query($mysqli, $sql);

        if (mysqli_num_rows($consulta) != 0) {
            echo "Email já cadastrado!";
        
        } else {

            $sql = "INSERT INTO empresas (email, senha) VALUES ('$email', '$senha')";
                mysqli_query($mysqli, $sql);

            echo "Login criado com sucesso!";
        }
    }
?>

<HTML>
    <BODY>
        <p><a href="index.html">Ir para à Página de Login</a>
    </BODY>
</HTML>