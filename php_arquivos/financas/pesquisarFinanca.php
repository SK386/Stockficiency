<?php
//require ('config.php');
session_start();
include("../conexao.php");
$id_emp=$_SESSION['empresa'];
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM financas
	WHERE periodo  LIKE '%".$search."%'AND empresa_id=$id_emp
	OR ganhos LIKE '%".$search."%' AND empresa_id=$id_emp
	OR despesas LIKE '%".$search."%' AND empresa_id=$id_emp
	";}
else
{
	$query = "SELECT * FROM financas WHERE empresa_id=$id_emp ORDER BY periodo";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
	while($row1 = mysqli_fetch_array($result))
	{
	$id=$row1["periodo"];
		$return .= '
      <div class="products-row" onClick="pre_modificar('."'".$id."'".')" data-bs-toggle="offcanvas" data-bs-target="#register-div" >
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        
        <div style="display:none" class="product-cell stock"><span class="cell-label">Id:</span> <span id="'.$id.'-id">'.$id.'</span> </div>
        
          <div class="product-cell image">
           <span id="'.$id.'-name" >'.date_format(date_create($row1['periodo']), "d/m/Y").'</span>
           <span style="display: none" id="'.$id.'-periodo">'.$row1['periodo'].'</span>
          </div>
       
        <div class="product-cell stock"><span class="cell-label">Stock:</span> <span>R$ '. $row1['ganhos'] .'</span> </div>
        <span id="'.$id.'-ganhos" style="display:none">'.$row1['ganhos'].'</span>
        <div class="product-cell price"><span class="cell-label">Price:</span>R$ '.$row1['despesas'].'</div>
        <span id="'.$id.'-gastos" style="display:none">'.$row1['despesas'].'</span>
      </div>
		';
	}
	echo $return;
	}

?>
