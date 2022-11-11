<?php

header("charset=utf-8");
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto";


$mysqli = new mysqli($servidor,$usuario, $senha, $banco);

$mysqli->set_charset("utf8");

if ($mysqli ->connect_errno) {
	echo "Falha na conexão: (" . mysqli->connect_errno . ")" . $mysqli->connect_error;
}

?>