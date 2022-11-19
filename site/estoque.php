<?php
session_start();
include('php_arquivos/conexao.php');


?>

<head>

     <title>Stokficiency</title>
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	 <meta charset="UTF-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="styles.css" rel="stylesheet" type="text/css">
     <link href="style_form.css" rel="stylesheet" type="text/css">

</head>

<body>

    <script src="estoque.js"></script>
    
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
	
		<h3 id="estoque">Estoque:</h3>

		<div style="height:55px" class="offcanvas offcanvas-end" id="pesquisa">
			<div style="margin-top:-10px" class="offcanvas-body bg-dark">
			  	<form class="d-flex">
		        	<input class="form-control me-2 bg-dark" type="text" placeholder="Search"  >
		        	<button class="btn btn-success" type="button">Search</button>
		      	</form>
		    </div>
		</div>
			

	 	<div id="table-div" class="container-fluid bg-light esto-tab" style="margin-left:8%; width:80%; border:1px solid black; padding:0; "> 
			<table  id="table" width=100%  >
			
				<thead>
					<th style="width:50%">Nome</th>
					<th >Quantidade</th>
					<th >Preço</th>
					<th >Validade</th>
					<th >Garantia</th>
				</thead>
				
				<tbody id="produtes">
				
				<?php
                    $sql = "SELECT * FROM produtos ";//WHERE empresa_id=";
                    $consulta = mysqli_query($mysqli, $sql);
                    
                    $i = 0;
                    $table_content = "";
                    while ($linha = mysqli_fetch_array($consulta)) {
                        $id=$linha["id_produto"];
                        $name=$linha["nome_produto"];
                        $qtd=$linha["qtd_estoque"];
                        $preco=$linha["preco"];
                            
                            if(isset($linha["validade"])){
                            
                                $validade=date_format(date_create($linha['validade']), "d/m/Y");
                        
                            }else{
                            
                                $validade="indefinido";
                            
                            }
                            
                            if(isset($linha["garantia"])){
                            
                                $garantia=date_format(date_create($linha['garantia']), "d/m/Y");
                        
                            }else{
                            
                                $garantia="indefinido";
                            
                            }
                            
                        $table_content .= '<tr id="'.$id.'" onClick="pre_modificar('.$id.')" data-bs-toggle="offcanvas" data-bs-target="#register-div">';
                        $table_content .= "
                                <td id='$id-id' class='id'>$id</td>\n
                                <td id='$id-name'>$name</td>\n
                                <td id='$id-qtd'>$qtd</td>\n
                                <td id='$id-preco'>$preco</td>\n
                                <td>$validade</td>\n
                                <td class='id' id='$id-validade'>".$linha['validade']."</td>\n
                                <td>$garantia</td>\n
                                <td class='id' id='$id-garantia'>".$linha['garantia']."</td>\n
                            </tr>\n";
                    }
                    echo $table_content;
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
			
			<form class="form bg-light" method="POST" action="estoque.php" id="register-form">
				<input name="id_produto" type="hidden" id="id" value="" />
				
				<input name="id_empresa" type="hidden" id="id" value="1" />
				

				<div class="box">
					<input type="text" id="name" name="nome"/>
					<label for="name">Nome</label>
				</div>

				<div id="name_" style="display:none; color:red; text-align: center; margin-top:-15px">* nome inválido *</div>
				
				<div class="box">
					<input type="text" id="qtd" name="qtd"/>
					<label for="qtd">Quantidade</label>
				</div>
				
				<div id="qtd_" style="display:none; color:red; text-align: center; margin-top:-15px">* quantidade inválida *</div>

				<div class="box">
					<input type="text" id="preco" name="preco"/>
					<label for="preco">Preço</label>
				</div>
				
				<div class="box">
					<input type="date" id="validade" name="validade"/>
					<label for="validade">Validade</label>
				</div>
				
				<div class="box">
					<input type="date" id="garantia" name="garantia"/>
					<label for="garantia">Garantia</label>
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
    
<?php
if(isset($_SESSION['msg'])){    
    echo '<script>popup("'.$_SESSION['msg'].'", 1)</script>';
    echo "<script>console.log('".$_SESSION['msg']."')</script>";
    $_SESSION['msg'] = '';
}
?>
