
        <?php
        include('../conexao.php');

            $id_encomenda = $_POST['id_encomenda'];

            if(strlen($id_encomenda) == 0) {
                $_SESSION['msg'] =  "Preencha o campo do ID!";
            
            } else {

                $sql = "SELECT * FROM encomendas WHERE id_encomenda=$id_encomenda";
                    $consulta = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($consulta) == 0) {
                    $_SESSION['msg'] = "Encomenda não encontrada!";
                
                } else {
                    $sql = "DELETE FROM encomendas_produtos WHERE encomenda_id=$id_encomenda";
                        mysqli_query($mysqli, $sql);
                    
                    $sql = "DELETE FROM encomendas WHERE id_encomenda=$id_encomenda";
                        mysqli_query($mysqli, $sql);

                    $_SESSION['msg'] = "Encomenda concluída com sucesso!";
                }
            }
?>
    <script>window.location.replace("../../encomenda.php");</script>