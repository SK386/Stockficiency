<?php 
   
   session_start();
   include('../conexao.php');

            if(strlen($_POST['empresa_id']) == 0 || strlen($_POST['origem']) == 0 || strlen($_POST['destino']) == 0 || strlen($_POST['horario']) == 0 || strlen($_POST['qtd_produtos']) == 0 || $_POST['qtd_produtos'] < 1) {
                $_SESSION['msg'] = "Nem todos os campos obrigatórios foram preenchidos ou um número inválido de produtos foi inserido!";

            } else {

                $id_empresa = $_POST['empresa_id'];
                    $sql = "SELECT * FROM empresas WHERE id_empresa=$id_empresa";
                        $consulta = mysqli_query($mysqli, $sql);
                
                if (mysqli_num_rows($consulta) == 0) {
                    $_SESSION['msg'] = "O ID da empresa não foi encontrado!";
        
                } else {

                    session_start();
                        $_SESSION['empresa_id'] = $_POST['empresa_id'];
                        $_SESSION['origem'] = $_POST['origem'];
                        $_SESSION['destino'] = $_POST['destino'];
                        $_SESSION['horario'] = $_POST['horario'];
                        $_SESSION['observacao'] = $_POST['observacao'];

                        $qtd_p = $_POST['qtd_produtos'];
                            $_SESSION['qtd_produtos'] = $qtd_p;

                            $content='<form style="display:block; overflow:scroll" class="form bg-light" method="POST" action="php_arquivos/encomendas/cadastrarEncomenda2.php" id="outro-form">';
                            
                    for ($i = 0; $i < $qtd_p; $i++) {
                    
                    $content .= "<br><hr>
                <h4>Produto n°".($i+1)."</h4>
                <div class='box'>
					<input type='text' id='id_prod$i' name='produto_id[$i]' />
					<label for='id_prod$i'>ID do produto</label>
				</div>
				
				<div class='box'>
					<input type='text' id='qtd_enc$i' name='qtd[$i]' />
					<label for='qtd_enc$i'>Quantidade</label>
				</div>
                ";

                    }
                    $content .='
                    <div class="per"><a id="adicionar2" class="button" onClick="adicionar2()" type="button">Modificar</a></div>
                    <br/><input class="id" type="submit" id="submit2" value="Finalizar registro" />
                    </form>';
                    $_SESSION['for'] = $content;
                    echo $_SESSION['for'];
                    }
            }
            header("Location: ../../encomendas.php");
        ?>
