
        <?php
        include "conexao.php";
        /*
        $search = $_POST["query"];
                    
                    $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%".$search."%' OR preco  LIKE '%".$search."%' OR qtd_estoque  LIKE '%".$search."%'";
                    $consulta = mysqli_query($mysqli, $sql);
                    
                    $return = '
                    <div id="table-div" class="container-fluid bg-light esto-tab" style="margin-left:8%; width:80%; border:1px solid black; padding:0; ">
                    <table>';
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
                            
                        $return .= '<tr id="'.$id.'" onClick="pre_modificar('.$id.')" data-bs-toggle="offcanvas" data-bs-target="#register-div">';
                        $return .= "
                                <td id='$id-id' class='id'>$id</td>\n
                                <td id='$id-name'>$name</td>\n
                                <td id='$id-qtd'>$qtd</td>\n
                                <td>R$$preco</td>\n
                                <td class='id' id='$id-preco'>$preco</td>\n
                                <td>$validade</td>\n
                                <td class='id' id='$id-validade'>".$linha['validade']."</td>\n
                                <td>$garantia</td>\n
                                <td class='id' id='$id-garantia'>".$linha['garantia']."</td>\n
                            </tr>\n";
                    }
                    $return .= "</table>";
                    echo $return;*/
                    
                    $return = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($mysqli, $_POST["query"]);
	$query = "SELECT * FROM employee
	WHERE id  LIKE '%".$search."%'
	OR emp_name LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR phone LIKE '%".$search."%' 
	";}
else
{
	$query = "SELECT * FROM employee";
}
$result = mysqli_query($mysqli, $query);
if(mysqli_num_rows($result) > 0)
{
	$return .='
	<div class="table-responsive">
	<table class="table table bordered">
	<tr>
		<th>ID</th>
		<th>Emp Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Created Date</th>
	</tr>';
	while($row1 = mysqli_fetch_array($result))
	{
		$return .= '
		<tr>
		<td>'.$row1["id"].'</td>
		<td>'.$row1["emp_name"].'</td>
		<td>'.$row1["email"].'</td>
		<td>'.$row1["phone"].'</td>
		<td>'.$row1["created_date"].'</td>
		</tr>';
	}
	echo $return;
	}
else
{
	echo 'No results containing all your search terms were found.';
}
				?>
