
<?php

//include('conexao.php');

    //header("charset=utf-8");
	$servidor = "localhost";
	$usuario = "site";
	$senha = "dev";
	$banco = "Stockficiency";


	$mysqli = new mysqli($servidor,$usuario, $senha, $banco);

	$mysqli->set_charset("utf8");

	if ($mysqli->connect_errno){
		echo '<script>console.log("Falha na conexão: '.$mysqli->connect_error.'")</script>';
    }
    
    function listar(){
    
    
    
    }
    
    function modificar(){
    
        $id= $_POST['id'];
        $nome = $_POST['name'];
        $cod_a = $_POST['cod'];
        $qtd = $_POST['qtd'];
        $preco =  $_POST['preco'];

        if(strlen($nome) == 0 || strlen($cod_a) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
            echo "<script>console.log('Preencha todos os campos!')</script>";
        
        } else {

            $sql = "SELECT * FROM produtos WHERE id=$id";
                $consulta = mysqli_query($mysqli, $sql);
                    $cons_cod = mysqli_fetch_array($consulta);

            if ($cons_cod == false) {
                echo "<script>console.log('Id($id) não encontrado!')</script>";
            
            } else {    
                $sql = "UPDATE produtos SET name='$nome', qtd=$qtd, preco=$preco WHERE id=$id";
                    mysqli_query($mysqli, $sql);

                echo "<script>console.log('Produto alterado com sucesso!')</script>";
            }
        }
        
    }
    
    function adicionar(){
    
        $nome = $_POST['name'];
        $cod = $_POST['cod'];
        $qtd = $_POST['qtd'];
        $preco =  $_POST['preco'];

        if(strlen($nome) == 0 || strlen($cod) == 0 || strlen($qtd) == 0 || strlen($preco) == 0) {
            echo "<script>console.log('Preencha todos os campos!')</script>";
        
        } else {

            $sql = "SELECT * FROM produtos WHERE cod=$cod";
                $consulta = mysqli_query($mysqli, $sql);
                    $cons_cod = mysqli_fetch_array($consulta);

            if ($cons_cod == true) {
                echo "<script>console.log('Código já cadastrado! Por favor, insira um código diferente.')</script>";
            
            } else {

                $sql = "INSERT INTO produtos(cod,name,qtd,preco) VALUES ($cod, '$nome', $qtd, $preco);";
                    mysqli_query($mysqli, $sql);

                echo "<script>console.log('Produto cadastrado com sucesso!')</script>";
            }
        }
    }
    
    function deletar(){
    
        $cod = $_POST['cod'];

        if(strlen($cod) == 0) {
            echo "<script>console.log('Preencha o campo do código!')</script>";
        
        } else {

            $sql = "SELECT * FROM produtos WHERE cod=$cod;";
                $consulta = mysqli_query($mysqli, $sql);
                    $cons_cod = mysqli_fetch_array($consulta);

            if ($cons_cod == false) {
                echo "<script>console.log('Produto não encontrado!')</script>";
            
            } else {

                $sql = "DELETE FROM produtos WHERE cod=$cod";
                    mysqli_query($mysqli, $sql);

                echo "<script>console.log('Produto deletado com sucesso!')</script>";
            }
        }
    }
?>

<head>

     <title>Stokficiency</title>
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	 <meta charset="UTF-8">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link href="style.css" rel="stylesheet" type="text/css">
     <link href="style_form.css" rel="stylesheet" type="text/css">

</head>

<body>

    <script src="tabela.js"></script>
    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<?php
        echo(readfile('side_bar.html'));
	?>
	
	<div id="body" style="margin-left:45px;padding:5px 5px;height:100%;width:100%; overflow:hidden; position:fixed;">

		<h3 id="estoque">Estoque:</h3>

		<div style="height:55px" class="offcanvas offcanvas-end" id="pesquisa">
			<div style="margin-top:-10px" class="offcanvas-body bg-dark">
			  	<form class="d-flex">
		        	<input class="form-control me-2 bg-dark" type="text" placeholder="Search"  >
		        	<button class="btn btn-success" type="button">Search</button>
		      	</form>
		    </div>
		</div>
			

	 	<div id="table-div" class="container-fluid bg-light" style="margin-left:8%; width:80%; border:1px solid black; padding:0; "> 
			<table  id="table" width=100%  >
			
				<thead>
					<th style="width:20%">Código</th>
					<th>Nome</th>	
					<th style="width:17%">Quantidade</th>
					<th style="width:17%">Preço</th>
				</thead>
				
				<tbody id="produtes">
				
				<?php
                    $sql = "SELECT * FROM produtos";
                    $consulta = mysqli_query($mysqli, $sql);
                    
                    $i = 0;
                    $table_content = "";
                    while ($linha = mysqli_fetch_array($consulta)) {
                        $id=$linha["id"];
                        $cod=$linha["cod"];
                        $name=$linha["name"];
                        $qtd=$linha["qtd"];
                        $preco=$linha["preco"];
                        $table_content .= '<tr id="'.$id.'" onClick="pre_modificar('.$id.')" data-bs-toggle="offcanvas" data-bs-target="#register-div">';
                        $table_content .= "
                                <td id='$id-id' class='id'>$id</td>\n
                                <td id='$id-cod'>$cod</td>\n
                                <td id='$id-name'>$name</td>\n
                                <td id='$id-qtd'>$qtd</td>\n
                                <td id='$id-preco'>$preco</td>\n
                            </tr>\n";
                    }
                    echo $table_content;
				?>
				
				</tbody>
				
			</table>
		</div>

		<?php 

    if(isset($_POST['adicionar'])){
        adicionar();
    }
    
    if(isset($_POST['modificar'])){
        modificar();
    }
    
    if(isset($_POST['deletar'])){
        deletar();
    }

?>
		
		<button id="atualize-btn" class="btn func-btn btn-outline-warning" onclick="addTR()" type="button">
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
				<input name="id" type="hidden" id="id" value="" />
				<div class="box">
					<input type="text" name="cod" id="cod" required />
					<label for="cod">Codigo</label>
				</div>
				
				<div id="cod_" style="display:none; color:red; text-align: center; margin-top:-15px">* código inválido *</div>

				<div class="box">
					<input type="text" id="name" name="name" required/>
					<label for="name">Nome</label>
				</div>

				<div id="name_" style="display:none; color:red; text-align: center; margin-top:-15px">* nome inválido *</div>
				
				<div class="box">
					<input type="text" id="qtd" name="qtd" required/>
					<label for="qtd">Quantidade</label>
				</div>				
				
				<div id="qtd_" style="display:none; color:red; text-align: center; margin-top:-15px">* quantidade inválida *</div>

				<div class="box">
					<input type="text" id="preco" name="preco" required/>
					<label for="preco">Preço</label>
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
    
