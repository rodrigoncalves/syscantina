<?php
	include_once("conexao.php");

	$nome 	= $_POST["nome"];
	$conta 	= $_POST["conta"];
	$equipe	= $_POST["equipe"];
	$acampante_id = $_POST["acampante_id"];

	$conta = str_replace(',', '', str_replace(',','.',$conta));

	mysqli_query($con, "UPDATE acampantes SET nome='$nome', conta='$conta', equipe='$equipe' WHERE id='$acampante_id'");

	if (mysqli_affected_rows($con) < 0) {
		header("location:editando.php?id=<?=$acampante_id?>&error");
	} else {
		header("location:listagem.php?success");
	}

?>
