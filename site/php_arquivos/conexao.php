<?php

	//header("charset=utf-8");
	$servidor = "stockficiency.cljvgkc6ypdt.us-east-1.rds.amazonaws.com";
	$usuario = "site";
	$senha = "123qwe";
	$banco = "stockficiency";


	$mysqli = new mysqli($servidor,$usuario, $senha, $banco);

	$mysqli->set_charset("utf8");

	//if ($mysqli ->connect_errno) {
	//	echo "Falha na conexão: (" . mysqli->connect_errno . ")" . $mysqli->connect_error;
	//}else{
    //    echo "Sucesso na conexao!";
	//}
?>
