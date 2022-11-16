<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Encomendas</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Encomendas</h2>
        
        <?php
        include "../conexao.php";
        
            $sql = "SELECT * FROM encomendas";
                $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="800" cellspacing="0"> <!--150-->
        <tr bgcolor="#BBBBBB">
        <th>ID</th><th>Origem</th><th>Destino</th><th>Horário do Envio</th><th>Observação</th><th>Empresa</th><th>Produtos</th>
        </tr>

        <?php
            $x = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $i=$linha["id_encomenda"];
                $o=$linha["origem"];
                $d=$linha["destino"];
                $h=$linha["horario_do_envio"];
                $obs=$linha["observacao"];
                $e=$linha["empresa_id"];

                if($x % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $i; ?></td>
            <td><?php echo $o; ?></td>
            <td><?php echo $d; ?></td>
            <td><?php echo $h; ?></td>
            <td><?php echo $obs; ?></td>
            <td><?php echo $e; ?></td>
            <td><?php echo "<button onclick=\"location.href='listarEncomendas2.php?encomenda_id=$i';\">Visualizar</button>";?></td>
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