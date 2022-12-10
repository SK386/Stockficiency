<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "stockficiency";

	$mysqli = new mysqli($servidor,$usuario, $senha, $banco);

	$mysqli->set_charset("utf8");

?>