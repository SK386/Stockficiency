<?php
//require ('config.php');
session_start();
include("../conexao.php");
$id_emp= $_SESSION['empresa'];
$return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM encomendas
	WHERE id_encomenda  LIKE '%".$search."%'AND empresa_id=$id_emp
	OR origem LIKE '%".$search."%' AND empresa_id=$id_emp
	OR destino LIKE '%".$search."%' AND empresa_id=$id_emp
	OR observacao LIKE '%".$search."%' AND empresa_id=$id_emp
	OR horario_do_envio LIKE '%".$search."%' AND empresa_id=$id_emp
	";}
else
{
	$query = "SELECT * FROM encomendas WHERE empresa_id=$id_emp";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row1 = mysqli_fetch_array($result))
	{
                $i=$row1["id_encomenda"];
                $o=$row1["origem"];
                $d=$row1["destino"];
                $h=$row1["horario_do_envio"];
                $obs=$row1["observacao"];
                $e=$row1["empresa_id"];
		$return .='
        <div class="products-row" onClick="pre_modificar('.$i.')" data-bs-toggle="offcanvas" data-bs-target="#register-div" >
        <button class="cell-more-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        
        <div class="product-cell stock"><span class="cell-label">Id:</span> <span id="'.$i.'-origem">'.$o.'</span> </div>
        
          <div class="product-cell image">
           <span id="'.$i.'-destino" >'.$d.'</span>
           <span style="display: none" id="'.$i.'-id">'.$i.'</span>
          </div>
       
        <div class="product-cell stock"><span class="cell-label">Stock:</span> <span id="'.$i.'-observacao">'.$obs.'</span> </div>

        <div class="product-cell price"><span class="cell-label">Price:</span>'. date_format(date_create($h), "d/m/Y H:i").'</div>

        <span id="'.$i.'-horario" style="display:none">'.$h.'</span>
        <div class="product-cell price"><span class="cell-label" id="'.$i.'-obs">Price:</span>'."<button class=' app-content-headerButton' onclick=".'"'."location.href='php_arquivos/encomendas/listarEncomendas2.php?encomenda_id=$i';".'"'.">...</button>".'</div>
        <span id="'.$i.'-empresa" style="display:none">'.$e.'</span>
      </div>
        '."
        
        ";
	}
	echo $return;
	}
?>
