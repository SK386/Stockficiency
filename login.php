<?php
    session_start();
    ini_set('display_errors', 0);
?>

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/form.css">
        <link rel="stylesheet" href="CSS/buttons.scss">
	    <link rel="stylesheet"  href="dependencias\Roboto.css">
        <link rel="icon" href="./imagens/icone.png">
        
        <title>Login</title>
    </head>

    <body style="background-image:url('imagens/login-bk.jpeg'); background-repeat:no-repeat; background-size: cover;">

        <div id="login">

             <form class="card" method = "POST"
                action="php_arquivos/home/login.php">

                <div class="card-header">
                    <h2>Login</h2>
                </div>
                
                <div class="card-content">

                    <div class="card-content-area">

                        <label for="usuario">E-mail</label>
                        <input type="email" name="email" id="usuario" autocomplete="off" placeholder="email@endereço.com"
                        <?php 
                            if($_SESSION['email']){
                                echo 'value="'.$_SESSION['email'].'"';
                                $_SESSION['email'] = '';
                            }
                        ?> required autofocus>

                    </div>

                    <div class="card-content-area">

                        <label for="password">Senha</label>
                        <input type="password" name="senha" id="password" autocomplete="off" placeholder="senha123" required>
                        
                    </div>

                </div>

                <div class="card-footer">
                    <?php 
                        if($_SESSION['msg_c']){
                            echo "<p style='color:red; text-align:center' class='recuperar_senha'>* ".$_SESSION['msg_c']." *</p>";
                            $_SESSION['msg_c'] = ''; 
                        }

                        if($_SESSION['msg_C']){
                            echo "<p style='color:green; text-align:center' class='recuperar_senha'>* ".$_SESSION['msg_C']." *</p>";
                            $_SESSION['msg_C'] = ''; 
                        }

                        if($_SESSION['msg_s']){
                            echo "<p style='color:red; text-align:center' class='recuperar_senha'>* ".$_SESSION['msg_s']." *</p>";
                            $_SESSION['msg_s'] = ''; 
                        }
                    ?>
                    
                    <input type="submit" value="Logar" class="submit">

                    <a href="register.php" class="recuperar_senha">Ainda não possui uma conta?</a>
                    <a href="./" style="margin-top:5px" class="recuperar_senha">Voltar para a home</a>
                </div>

            </form>
        </div>

    </body>
</html>
