<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Encomendas</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Encomendas</h2>
        
        <?php
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
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $p=$linha["produto_id"];
                $q=$linha["quantidade"];

                if($x % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $p; ?></td>
            <td><?php echo $q; ?></td>
        </tr>
        
        <?php
                $x++;
            }
        ?>

        </table>
            <br/>

        <a href="listarEncomendas1.php">Voltar</a>
    </BODY>
</HTML>