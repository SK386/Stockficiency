<?php
session_start();
 include "conexao.php";
            $sql = "SELECT * FROM financas";
            $consulta = mysqli_query($mysqli, $sql);
            
$dataPoints1 = array();
$dataPoints2 = array();

while ($linha = mysqli_fetch_array($consulta)) {
                $p= date_format(date_create($linha['periodo']), "d/M");
                $g=$linha["ganhos"];
                $d=$linha["despesas"];
                $e=$linha["empresa_id"];
                
                //for ($x = 0; $x <= 10; $x++) {
                    array_push($dataPoints1, array("label"=> "$p","y"=>"$d"));
                    array_push($dataPoints2, array("label"=> "$p","y"=>"$g"));
                //}
                
    }


?> 

<html>
<head>  


	 <title>Stockficiency</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
     <link href="style_form.css" rel="stylesheet" type="text/css">
     <link href="styles.css" rel="stylesheet" type="text/css">

     
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	backgroundColor: "#e3e4e4",
	theme: "light2",
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Despesas",
		indexLabel: "{y}",
		yValueFormatString: "R$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Ganhos",
		indexLabel: "{y}",
		yValueFormatString: "R$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<script src="financas.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
        readfile('side_bar.html');
?>



<div id="body" style="margin-left:45px;padding:5px 5px;height:100%;width:100%; overflow:hidden; position:fixed;">

<div class="alerta" id="Alert">
        <h3>Alerta</h3>
        <p style="text-align:center; padding-bottom:20px;" id="msg"></p>
        <button onClick="popup('',2)" class="btn popup-btn btn-outline-warning">close</button>
</div>

    <div id="chartContainer" class="grafico"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <div id="table-div" class=" bg-light finan-tab" style="border:1px solid black;"> 
                <table  id="table" width=100%  >
                
                    <thead>
                        <th style="width:50%">Data</th>
                        <th >Ganhos</th>
                        <th >Despesas</th>
                    </thead>
                    
                    <tbody id="financas">
                    
                    <?php
                        $sql = "SELECT * FROM financas ";//WHERE empresa_id=";
                        $consulta = mysqli_query($mysqli, $sql);
                        
                        $i = 0;
                        $table_content = "";
                        while ($linha = mysqli_fetch_array($consulta)) {
                        
                            $periodo= date_format(date_create($linha['periodo']), "d/m/Y");
                            $ganhos=$linha["ganhos"];
                            $gastos=$linha["despesas"];
                            $id=$linha["id"];
                                
                                    //$validade=date_format(date_create($linha['validade']), "d/m/Y");
                                
                                
                            $table_content .= '<tr id="'.$linha["periodo"].'" onClick="pre_modificar('."'".$linha["periodo"]."'".')" data-bs-toggle="offcanvas" data-bs-target="#register-div">';
                            $table_content .= "
                                    <td id='".$linha['periodo']."-id' class='id'>".$linha['periodo']."</td>\n
                                    <td>$periodo</td>\n
                                    <td style='color:green'>R$$ganhos</td>\n
                                    <td style='color:red'>R$$gastos</td>\n
                                    <td class='id' id='".$linha['periodo']."-gastos'>$gastos</td>\n
                                    <td class='id' id='".$linha['periodo']."-ganhos'>$ganhos</td>\n
                                    <td class='id' id='".$linha['periodo']."-periodo'>".$linha['periodo']."</td>\n
                                </tr>\n";
                        }
                        echo $table_content;
                    ?>
                    
                    </tbody>
                    
                </table>
            </div>
            
            <button style="bottom:3%" id="atualize-btn" class="btn func-btn btn-outline-warning" onclick="window.location.reload();" type="button">
			<span class="material-icons span-func">
				refresh
            </span>
		</button>
		<button style="right:10%; bottom:3%" id ="register-btn" class="btn func-btn btn-outline-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#register-div">
			<span style="font-size:25px" class="material-icons span-func">
				add
            </span>
		</button>


		<div class="offcanvas offcanvas-end " id="register-div" style="background-color:rgb(0,0,0, 0.01); border:0px; width:100%; height: 100%;">
			<button onClick="normal()" id="funfa" style="width:100%; height:100%; background-color:rgb(0,0,0, 0.01); border: 0px;"></button>
			
			<form class="form bg-light" method="POST" action="financas.php" id="register-form">
				
				<input name="empresa_id" type="hidden" id="id" value="1" />

				<div class="box">
					<input type="date" id="periodo" name="periodo" required/>
					<label for="periodo">Periodo</label>
				</div>
				
				<div class="box">
					<input type="number" id="ganhos" name="ganhos"/>
					<label for="ganhos">Ganhos</label>
				</div>
				
				<div class="box">
					<input type="number" id="gastos" name="gastos"/>
					<label for="gastos">Gastos</label>
				</div>
				
				
				
				<div id="preco_" style="display:none; color:red; text-align: center; margin-top:-15px">* preço inválido *</div>

				<div class="per"><a id="salvar" name="adicionar" class="button" onClick="adicionar()" type="button" value="adicionar">Adicionar</a></div>
				<input name="adicionar" class="id" id="submit-add" type="submit"/>
				<div class="per"><a id="modificar" class="button"  type="button">Modificar</a></div>
				<input name="modificar" class="id" id="submit-mod" type="submit"/>
				<div class="per"><a id="deletar" class="button"  type="button"  data-bs-toggle="offcanvas" data-bs-target="#register-div">Deletar</a></div>
				<input name="deletar" class="id" id="submit-del" type="submit"/>
			</form>
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
