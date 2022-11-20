<?php
        include('../conexao.php');

            session_start();
                $_SESSION['origem'] = $_POST['origem'];
                $_SESSION['destino'] = $_POST['destino'];
                $_SESSION['horario'] = $_POST['horario'];
                $_SESSION['observacao'] = $_POST['observacao'];

            $id_encomenda = $_POST['id_encomenda'];
                $_SESSION['id_encomenda'] = $id_encomenda; 


            if(strlen($id_encomenda) == 0) {
                echo "Preencha todos os campos obrigatórios!";
            
            } else {
                $consulta1 = mysqli_query($mysqli, "SELECT * FROM encomendas WHERE id_encomenda='$id_encomenda'");
                $consulta2 = mysqli_query($mysqli, "SELECT * FROM encomendas_produtos WHERE encomenda_id='$id_encomenda'");

                if (mysqli_num_rows($consulta1) == 0 || mysqli_num_rows($consulta2) == 0) {
                    echo "Encomenda não existe ou não possui nenhum produto associado!";
                
                } else {
                    $x=0;
                    $content .= "<form class='form bg-light' method='POST' action='php_arquivos/encomendas/alterarEncomenda2.php' id='outro-form'>";

                    while($coluna = mysqli_fetch_array($consulta2)) { 
                    
                        $content.="
                            <div class='box'>
                            <input type='text' id='qtd[$x]' name='qtd[$x]'/>
                            <label for='qtd[$x]'>Produto $x</label>
                            </div>
                            ";
                                
                            $x++;
                    }     
                }
            }
            
                        $content .='
                        <div class="per"><a id="modificar2" class="button" onClick="modificar2()" type="button">Modificar</a></div>
                        <input id="submit-mod2" class="id" type="submit" value="Alterar encomenda" />
                                    </form>';
                                    
                        $_SESSION['for'] = $content;
                        echo $_SESSION['for'];
                        header("Location: ../../encomendas.php");
                    ?> 
