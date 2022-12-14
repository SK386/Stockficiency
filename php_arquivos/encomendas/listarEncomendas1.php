<?php
        session_start();
        include "../conexao.php";
        
            $sql = "SELECT * FROM encomendas";
                $consulta = mysqli_query($mysqli, $sql);
    
            $x = 0;
            
            while ($linha = mysqli_fetch_array($consulta)) {
                $i=$linha["id_encomenda"];
                $o=$linha["origem"];
                $d=$linha["destino"];
                $h=$linha["horario_do_envio"];
                $obs=$linha["observacao"];
                $e=$linha["empresa_id"];

                    
        $tb.="<tr>
            ".'<tr id="'.$i.'" onClick="pre_modificar('.$i.')" data-bs-toggle="offcanvas" data-bs-target="#register-div">'."
            <td class='id' id='$i-id'>$i</td>
            <td id='$i-origem'>$o</td>
            <td id='$i-destino'>$d</td>
            <td id='$i-horario'>$h</td>
            <td id='$i-observacao'>$obs</td>
            <td id='$i-id_emp'>$e</td>
            <td>"."<button class='btn btn-success' onclick=".'"'."location.href='php_arquivos/encomendas/listarEncomendas2.php?encomenda_id=$i';".'"'.">...</button>"."</td>
        </tr>";

                $x++;
            }
            
            $_SESSION['table']=$tb;
?>
    <script>window.location.replace("../../encomenda.php");</script>