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
                    $content .= "<form class='form scroll' method='POST' action='php_arquivos/encomendas/alterarEncomenda2.php' id='outro-form'>";

                    while ($coluna = mysqli_fetch_array($consulta2)) {
                        $id_p = $coluna['produto_id'];
                        $qtd_p = $coluna['quantidade'];
                            $coluna2 = mysqli_fetch_array(mysqli_query($mysqli, "SELECT nome_produto FROM produtos WHERE id_produto=$id_p"));
                                    $nome_p = $coluna2['nome_produto'];

                            if($x == 0){
                                $content.="
                                <h4 class='app-content-headerText' >$nome_p:</h4>
                                    <div class='box'>
                                    <input class='outro-input' type='number' id='qtd[$x]' name='qtd[$x]' value='$qtd_p'/>
                                    <label for='qtd[$x]'>Quantidade</label>
                                    </div>
                                    "; 
                            }else{
                                $content.="
                                <hr>
                                 <h4 class='app-content-headerText' >$nome_p:</h4>
                                    <div class='box'>
                                    <input class='outro-input' type='number' id='qtd[$x]' name='qtd[$x]' value='$qtd_p'/>
                                    <label for='qtd[$x]'>Quantidade</label>
                                    </div>
                                    "; 
                            }
                    $x++;
                    }
                }
            }
            
                        $content .='
                        <div class="per"><a id="modificar2" class="button" onClick="modificar2()" type="button">Modificar</a></div>
                        <input id="submit2" style="display: none" type="submit" value="Alterar encomenda" />
                                    </form>';
                                    
                        $_SESSION['for'] = $content;
                        echo $_SESSION['for'];
                        header("Location: ../../encomenda.php");
                    ?> 
