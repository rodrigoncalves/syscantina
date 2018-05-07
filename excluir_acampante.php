<?php
	include_once("conexao.php");
	$id=$_GET["id"];
	mysqli_query($con, "DELETE FROM acampantes WHERE id=".$id);
	mysqli_query($con, "DELETE FROM historico WHERE acampante_id=".$id);

	echo "<script>";
	if (mysqli_affected_rows($con) > 0) {
		echo "alert('Acampante excluido com sucesso');";
		echo "window.location.replace('listagem.php')";
	} else {
		echo "window.location.replace('listagem.php?error')";
	}

	echo "</script>";
?>
