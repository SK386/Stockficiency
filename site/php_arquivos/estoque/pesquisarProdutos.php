<?php
//require ('config.php');
session_start();
include("../conexao.php");
$id_emp=$_SESSION['empresa'];
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM produtos
	WHERE id_produto  LIKE '%".$search."%'AND empresa_id=$id_emp
	OR nome_produto LIKE '%".$search."%' AND empresa_id=$id_emp
	OR preco LIKE '%".$search."%' AND empresa_id=$id_emp
	OR qtd_estoque LIKE '%".$search."%' AND empresa_id=$id_emp
	
	";}
else
{
	$query = "SELECT * FROM produtos WHERE empresa_id=$id_emp";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row1 = mysqli_fetch_array($result))
	{
	$id=$row1["id_produto"];
		$return .= '
      <div class="products-row" onClick="pre_modificar('.$id.')" data-bs-toggle="offcanvas" data-bs-target="#register-div" >
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        
        <div class="product-cell stock"><span class="cell-label">Id:</span> <span id="'.$id.'-id">'.$id.'</span> </div>
        
          <div class="product-cell image">
           <span id="'.$id.'-name" >'.$row1['nome_produto'].'</span>
          </div>
       
        <div class="product-cell stock"><span class="cell-label">Stock:</span> <span id="'.$id.'-qtd">'.$row1['qtd_estoque'].'</span> </div>
        <div class="product-cell price"><span class="cell-label">Price:</span>$'.$row1['preco'].'</div>
        <span id="'.$id.'-preco" style="display:none">'.$row1['preco'].'</span>
        <span id="'.$id.'-garantia" style="display:none">'.$row1['garantia'].'</span>
        <span id="'.$id.'-validade" style="display:none">'.$row1['validade'].'</span>
      
		';
		
		if($row1['garantia']){
		$return .= '<div class="product-cell price"><span class="cell-label">Price:</span>'.date_format(date_create($row1['garantia']), "d/m/Y").'</div>';
		} else {
		$return .= '<div class="product-cell price"><span class="cell-label">Price:</span> </div>';
		}
		
		if($row1['validade']){
		$return .= '<div class="product-cell price"><span class="cell-label">Price:</span>'.date_format(date_create($row1['validade']), "d/m/Y").'</div>';
		} else {
		$return .= '<div class="product-cell price"><span class="cell-label">Price:</span> </div>';
		}
		
		$return .= '</div>';
	}
	echo $return;
	}

?>
