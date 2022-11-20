<?php
        session_start();
        include "../conexao.php";

            $encomenda_id = htmlspecialchars($_GET["encomenda_id"]);

            $sql = "SELECT * FROM encomendas_produtos WHERE encomenda_id=$encomenda_id";
                $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="200" cellspacing="0">
        <tr bgcolor="#BBBBBB">
        <th>ID do Produto</th><th>Quantidade</th>
        </tr>

        <?php
            $x = 0;
            $content="<div id='outro-form' class='list2'>
                        <div id='table-div' style='border:1px solid black; padding:0'>
                        <table>
                            <thead>
                                <th>ID do produto</th>
                                <th>Quantidade</th>
                            </thead>
                            <tbody>
            ";
            while ($linha = mysqli_fetch_array($consulta)) {
                $p=$linha["produto_id"];
                $q=$linha["quantidade"];

                $content .= "<tr>
                                    <td>$p</td>
                                    <td>$q</td>
                            </tr>";
        
                $x++;
            }
            $content .= "</tbody>
                         </table>
                         </div>
                         </div>";
            $_SESSION['for'] = $content;
            echo $_SESSION['for'];
            header("Location: ../../encomendas.php");
        ?>
        </table>
