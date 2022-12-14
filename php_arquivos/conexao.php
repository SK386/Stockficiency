<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "stockficiency";

	/*$servidor = "localhost";
	$usuario = "supre624_stockficiency";
	$senha = "stockficiency";
	$banco = "supre624_stockficiency";*/

	$mysqli = new mysqli($servidor,$usuario, $senha, $banco);

	$mysqli->set_charset("utf8");

?>