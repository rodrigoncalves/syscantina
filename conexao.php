<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$db = "cantina_kids";
	$server = "localhost";
	$username = "root";
	$password = "";

	$con = mysqli_connect($server , $username, $password) or die ("Erro na conexão");
	mysqli_set_charset($con, 'utf8');
	mysqli_select_db($con, $db) or die ("Banco de dados não encontrado");
?>
