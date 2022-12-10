<?php
        session_start();
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $periodo = $_POST['periodo'];

            if(strlen($empresa_id) == 0 || strlen($periodo) == 0) {
                $_SESSION['msg'] = "Preencha todos os campos!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    $_SESSION['msg'] = "Registro não encontrado!";
                
                } else {

                    $sql = "DELETE FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                        mysqli_query($mysqli, $sql);

                    $_SESSION['msg'] = "Registro deletado com sucesso!";
                }
            }
            
            header("Location: ../../financa.php");
        ?>
