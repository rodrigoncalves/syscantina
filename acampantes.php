<?php
	include_once("conexao.php");
	include_once("header.php");
	$acampantes=mysqli_query($con, "SELECT * FROM acampantes ORDER BY quitado, nome");

    $res=mysqli_query($con, "SELECT SUM(conta) FROM acampantes");
    $total_arrecadado=mysqli_fetch_array($res)[0];
    $res=mysqli_query($con, "SELECT SUM(saldo) FROM acampantes WHERE quitado=0");
    $total_quitar=mysqli_fetch_array($res)[0];

	setlocale(LC_MONETARY, "pt_BR", "ptb");

	$titulo = "Lista de acampantes";
	$source = basename(__FILE__);

	include_once("listagem.php");
?>
