<HTML>
    <HEAD>
        <meta charset="utf-8">
        <TITLE>Listar Produtos</TITLE>
    </HEAD>

    <BODY>
        <h2>Listar Produtos</h2>
        
        <?php
        include "conexao.php";
            $sql = "SELECT * FROM produtos";
            $consulta = mysqli_query($mysqli, $sql);
        ?>

        <table border="1" width="600" cellspacing="0">
        <tr bgcolor="#BBBBBB">
        <th>Código</th><th>Nome</th><th>Quantidade</th><th>Preço</th>
        </tr>

        <?php
            $i = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $c=$linha["codigo_produto"];
                $n=$linha["nome_produto"];
                $q=$linha["qtd_estoque"];
                $p=$linha["preco"];

                if($i % 2 == 0){
                    $cor = "#DDDDDD";
                } else {
                    $cor = "#FFFFFF";
                }
        ?>
        <tr bgcolor="<?php echo $cor; ?>">
            <td><?php echo $c; ?></td>
            <td><?php echo $n; ?></td>
            <td><?php echo $q; ?></td>
            <td><?php echo $p; ?></td>
        </tr>
        
        <?php
                $i++;
            }
        ?>

        </table>
            <br/>

        <a href="index.html">Voltar</a>
    </BODY>
</HTML>