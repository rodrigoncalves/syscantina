<?php
	include_once("conexao.php");

	// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
	$nome = $_POST["nome"];
	$conta = $_POST["conta"];
	$equipe_id = $_POST["equipe_id"];

	$conta = str_replace(',', '', str_replace(',','.',$conta));

	// Gravando no banco de dados
	$sql = "INSERT INTO `acampantes` ( `nome` ,`conta` , `equipe_id` ) VALUES ('$nome', '$conta','$equipe_id')";
	mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) < 0) {
		header("location:cadastrando.php?nome=$nome&equipe_id=$equipe_id&conta=$conta&error");
	} else {
		header("location:listagem.php?success");
	}
?>
