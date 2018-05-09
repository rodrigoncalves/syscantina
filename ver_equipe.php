<?php
	include_once("conexao.php");
	include_once("header.php");

	// Report all errors except E_NOTICE
	error_reporting(E_ALL & ~E_NOTICE);

	if (!isset($_GET["id"])) {
		header("location:equipes.php");
	}

	$equipe_id = $_GET["id"];
	$res=mysqli_query($con, "SELECT * FROM equipes WHERE id=$equipe_id");
	$equipe=mysqli_fetch_array($res);

	$acampantes=mysqli_query($con, "SELECT * FROM acampantes WHERE equipe_id=$equipe_id ORDER BY quitado, nome");

	setlocale(LC_MONETARY, "pt_BR", "ptb");
	$titulo = "Equipe ".$equipe['nome'];
	$source = basename(__FILE__);

	include_once("listagem.php");
?>
