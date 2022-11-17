<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Valores</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Valores</h2>
        
        <?php
        include "../conexao.php";
            $sql = "SELECT * FROM financas";
            $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="750" cellspacing="0">
        <tr bgcolor="#BBBBBB">
        <th>Mes</th><th>Ano</th><th>Despesas</th><th>Ganhos</th><th>Empresa</th>
        </tr>

        <?php
            $x = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $a=$linha["ano"];
                $m=$linha["mes"];
                $d=$linha["despesas"];
                $g=$linha["ganhos"];
                $e=$linha["empresa_id"];

                if($x % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $m; ?></td>
            <td><?php echo $a; ?></td>
            <td><?php echo $d; ?></td>
            <td><?php echo $g; ?></td>
            <td><?php echo $e; ?></td>
        </tr>
        
        <?php
                $x++;
            }
        ?>

        </table>
            <br/>

        <a href="../index.html">Voltar</a>
    </BODY>
</HTML>