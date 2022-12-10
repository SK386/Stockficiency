        <?php
        session_start();
        include('../conexao.php');

            $empresa_id = $_POST['empresa_id'];
            $periodo = $_POST['periodo'];
            $ganhos = str_replace(",", ".", $_POST['ganhos']);
            $despesas = str_replace(",", ".", $_POST['gastos']);

            if(strlen($empresa_id) == 0 || strlen($periodo) == 0 || strlen($ganhos) == 0 || strlen($despesas) == 0) {
                $_SESSION['msg'] = "Preencha todos os campos!";
            
            } else {

                $sql = "SELECT * FROM empresas WHERE id_empresa=$empresa_id";
                    $consulta = mysqli_query($mysqli, $sql);
            
                if (mysqli_num_rows($consulta) == 0) {
                    $_SESSION['msg'] = "O ID da empresa não foi encontrado!";

                } else {

                    $sql = "INSERT INTO financas (periodo, ganhos, despesas, empresa_id) VALUES ('$periodo', $ganhos, $despesas, $empresa_id)";
                        mysqli_query($mysqli, $sql);

                    $_SESSION['msg'] = "Valor registrado com sucesso!";
                }
            }
            
            header("Location: ../../financa.php");
        ?>
