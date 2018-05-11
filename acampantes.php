<?php
	include_once("conexao.php");
	include_once("header.php");
	$acampantes=mysqli_query($con, "SELECT * FROM acampantes ORDER BY quitado, nome");

	setlocale(LC_MONETARY, "pt_BR", "ptb");

	$titulo = "Lista de acampantes";
	$source = basename(__FILE__);

	include_once("listagem.php");
?>
