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

	$res=mysqli_query($con, "SELECT SUM(conta) FROM acampantes WHERE equipe_id=$equipe_id");
	$total_arrecadado=mysqli_fetch_array($res)[0];
	$res=mysqli_query($con, "SELECT SUM(saldo) FROM acampantes WHERE quitado=0 AND equipe_id=$equipe_id");
	$total_quitar=mysqli_fetch_array($res)[0];

	setlocale(LC_MONETARY, "pt_BR", "ptb");
	$titulo = "Equipe ".$equipe['nome'];
	$source = basename(__FILE__);

	include_once("listagem.php");
?>
