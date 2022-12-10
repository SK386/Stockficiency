<?php
        session_start();
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $periodo = $_POST['periodo'];
            $ganhos = str_replace(",", ".", $_POST['ganhos']);
            $despesas = str_replace(",", ".", $_POST['gastos']);
           
            if(strlen($empresa_id) == 0 || strlen($periodo) == 0) {
                $_SESSION['msg'] = "Preencha todos os campos obrigatórios!";
            
            } else {

                $sql = "SELECT * FROM financas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    $_SESSION['msg'] = "Registro não encontrado!";
                
                } else {
                    
                    $coluna = mysqli_fetch_array($consulta);
                        if(strlen($ganhos) == 0) { $ganhos = $coluna["ganhos"]; }
                        if(strlen($despesas) == 0) { $despesas = $coluna["despesas"]; }
                        
                    $sql = "UPDATE financas SET ganhos=$ganhos, despesas=$despesas WHERE periodo='$periodo' AND empresa_id=$empresa_id";
                        mysqli_query($mysqli, $sql);

                    $_SESSION['msg'] = "Registro alterado com sucesso!";
                }
            }
            
            header("Location: ../../financa.php");
        ?>
