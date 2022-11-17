<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Produtos</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Produtos</h2>
        
        <?php
        include "../conexao.php";
            $sql = "SELECT * FROM produtos";
            $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="1050" cellspacing="0">
        <tr bgcolor="#BBBBBB">
        <th>ID</th><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Validade</th><th>Garantia</th><th>Empresa</th>
        </tr>

        <?php
            $x = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $i=$linha["id_produto"];
                $n=$linha["nome_produto"];
                $q=$linha["qtd_estoque"];
                $p=$linha["preco"];
                $v=$linha["validade"];
                $g=$linha["garantia"];
                $e=$linha["empresa_id"];

                if($x % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $i; ?></td>
            <td><?php echo $n; ?></td>
            <td><?php echo $q; ?></td>
            <td><?php echo $p; ?></td>
            <td><?php echo $v; ?></td>
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