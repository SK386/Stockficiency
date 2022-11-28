<?php
//require ('config.php');
include("../conexao.php");
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM produtos
	WHERE id_produto  LIKE '%".$search."%'AND empresa_id=1
	OR nome_produto LIKE '%".$search."%' AND empresa_id=1
	OR preco LIKE '%".$search."%' AND empresa_id=1
	OR qtd_estoque LIKE '%".$search."%' AND empresa_id=1
	
	";}
else
{
	$query = "SELECT * FROM produtos WHERE empresa_id=1";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
	$return .='
	<div class="table-responsive">
	<table class="table table bordered">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Qtd</th>
		<th>Preço</th>
		<th>Validade</th>
		<th>Garantia</th>
	</tr>';
	while($row1 = mysqli_fetch_array($result))
	{
		$return .= '
		<tr>
		<td>'.$row1["id_produto"].'</td>
		<td>'.$row1["nome_produto"].'</td>
		<td>'.$row1["qtd_estoque"].'</td>
		<td>'.$row1["preco"].'</td>
		<td>'.$row1["validade"].'</td>
		<td>'.$row1["garantia"].'</td>
		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
?>
