<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Registros</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Registros</h2>
        
        <?php
        include "../conexao.php";
            $sql = "SELECT * FROM financas";
            $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="500" cellspacing="0">
        <tr bgcolor="#BBBBBB">
        <th>Período</th><th>Ganhos</th><th>Despesas</th><th>Empresa</th>
        </tr>

        <?php
            $x = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $p= $linha["periodo"];
                $g=$linha["ganhos"];
                $d=$linha["despesas"];
                $e=$linha["empresa_id"];

                if($x % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $p; ?></td>
            <td><?php echo $g; ?></td>
            <td><?php echo $d; ?></td>
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