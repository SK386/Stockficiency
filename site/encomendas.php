<?php
session_start();
include('php_arquivos/conexao.php');
?>

<head>

     <title>Stockficiency</title>
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	 <meta charset="UTF-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="styles.css" rel="stylesheet" type="text/css">
     <link href="style_form.css" rel="stylesheet" type="text/css">

</head>

<body>

    <script src="encomendas.js"></script>
    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
	<script src='https://MomentJS.com/downloads/moment.js'></script>
	
	<?php
        readfile('side_bar.html');
	?>
	
	<div id="body" style="margin-left:45px;padding:5px 5px;height:100%;width:100%; overflow:hidden; position:fixed;">

<div class="alerta" id="Alert">
        <h3>Alerta</h3>
        <p style="text-align:center; padding-bottom:20px;" id="msg"></p>
        <button onClick="popup('',2)" class="btn popup-btn btn-outline-warning">close</button>
</div>

    <div id="table-div" class=" bg-light esto-tab" style="margin-left:8%; width:80%; border:1px solid black; padding:0; "> 
                <table  id="table" width=100%  >
                
                    <thead>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Horário do Envio</th>
                        <th>Observação</th>
                        <!--<th>Empresa</th>-->
                        <th>Produtos</th>
                    </thead>
                    
                    <tbody id="encomendas">
                    
                    <?php
                    /*if($_SESSION['table'] !=''){
                        echo $_SESSION['table'];
                        $_SESSION['table']='';
                    }*/
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
            ".'<tr id="'.$id.'" onClick="pre_modificar('.$i.')" data-bs-toggle="offcanvas" data-bs-target="#register-div">'."
            <td class='id' id='$i-id' >$i</td>
            <td id='$i-origem'>$o</td>
            <td id='$i-destino'>$d</td>
            <td>". date_format(date_create($linha['horario_do_envio']), "d/m/Y H:i:s") ."</td>
            <td id='$i-horario' class='id'>$h</td>
            <td id='$i-observacao'>$obs</td>
            <td class='id' id='$i-id_emp'>$e</td>
            <td style='z-index:70'>"."<button class='btn btn-success' onclick=".'"'."location.href='php_arquivos/encomendas/listarEncomendas2.php?encomenda_id=$i';".'"'.">...</button>"."</td>
        </tr>";

                $x++;
            }
            
            echo $tb;
                    ?>
                    
                    </tbody>
                    
                </table>
        </div>
  
            <button id="atualize-btn" class="btn func-btn btn-outline-warning" onclick="window.location.reload();" type="button">
			<span class="material-icons span-func">
				refresh
            </span>
		</button>
		<button id ="register-btn" class="btn func-btn btn-outline-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#register-div">
			<span style="font-size:25px" class="material-icons span-func">
				add
            </span>
		</button>

		<button id="lupinha"  class="btn func-btn btn-outline-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#pesquisa">
			<span class="material-icons span-func">
				search
			</span>
		</button>

		<div class="offcanvas offcanvas-end " id="register-div" style="background-color:rgb(0,0,0, 0.01); border:0px; width:100%; height: 100%;">
			<button onClick="normal()" id="funfa" style="width:100%; height:100%; background-color:rgb(0,0,0, 0.01); border: 0px;"></button>
            
            <?php
                
                    
                    echo $_SESSION['for'];
                    $_SESSION['for'] = '';
            
                    readfile("form_encomendas.html");
                    
            ?>
            
        </div>
            <button id="random" data-bs-toggle="offcanvas" data-bs-target="#register-div" style="display:none"></button>
    </div>

</div>

</body>
</html>   

<?php
if(isset($_SESSION['msg'])){    
    echo '<script>popup("'.$_SESSION['msg'].'", 1)</script>';
    echo "<script>console.log('".$_SESSION['msg']."')</script>";
    $_SESSION['msg'] = '';
}
?>
