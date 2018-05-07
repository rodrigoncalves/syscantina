<?php
	include_once("conexao.php");

	$nome = $_POST["nome"];
	$conta = $_POST["conta"];
	$equipe_id = $_POST["equipe_id"];
	$acampante_id = $_POST["acampante_id"];

	$conta = str_replace(',', '', str_replace(',','.',$conta));

	mysqli_query($con, "UPDATE acampantes SET nome='$nome', conta='$conta', equipe_id='$equipe_id' WHERE id='$acampante_id'");

	if (mysqli_affected_rows($con) < 0) {
		header("location:editando.php?id=$acampante_id&error");
	} else {
		header("location:listagem.php?success");
	}

?>
