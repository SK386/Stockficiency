<?php
ini_set('display_errors', 0);
    session_start();
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

        <script src="dependencias/jquery-1.2.6.pack.js" type="text/javascript"></script>
        <script src="dependencias/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>

            <script type="text/javascript">
                $(document).ready(function(){	
                    $("#cnpj").mask("99.999.999/9999-99");
                    $("#cep").mask("99999-999");
                });
            </script>

        <title>Cadastro</title>
    </head>

    <body style="background-image:url('imagens/registro-bk.jpg'); background-repeat:no-repeat; background-size: cover;">

        <div id="login">

           <form class="card" method = "POST" action="php_arquivos/home/registro.php">
                
                <div class="card-header">
                    <h2>Cadastre-se</h2>
                </div>

                <div class="card-content">

                    <div class="card-content-area">

                        <label for="usuario">Nome da Empresa</label>
                        <input name="nome_e" id="usuario" autocomplete="off" placeholder="StockFiciency" required>

                    </div>

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

                        <label for="cnpj">CNPJ</label>
                        <input name="cnpj" id="cnpj" autocomplete="off" placeholder="00.000.000/0000-00" required>

                    </div>

                    <div class="card-content-area">

                        <label for="cep">CEP</label>
                        <input name="cep" id="cep" autocomplete="off" placeholder="00000-00" required>

                    </div>

                    <div class="card-content-area">

                        <label for="password">Senha</label>
                        <input type="password" name="senha" id="password" autocomplete="off" placeholder="senha123" required>

                    </div>
                </div>

                <div class="card-footer">
                    <?php 
                        if($_SESSION['msg_e']){
                            echo "<p style='color:red; text-align:center' class='recuperar_senha'>* ".$_SESSION['msg_e']." *</p>";
                            $_SESSION['msg_e'] = ''; 
                        }
                    ?>

                    <input type="submit" value="Cadastrar" class="submit">

                    <a href="./login.php" class="recuperar_senha">Já tem uma conta?</a>
                    <a href="./" style="margin-top:5px" class="recuperar_senha">Voltar para a home</a>
                </div>

            </form>
        </div>

    </body>
</html>
