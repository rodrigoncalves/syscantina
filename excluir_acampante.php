<?php
	include_once("conexao.php");
	$id=$_GET["id"];
	mysqli_query($con, "DELETE FROM historico WHERE acampante_id=".$id);
	mysqli_query($con, "DELETE FROM acampantes WHERE id=".$id);

	echo "<script>";
	if (mysqli_affected_rows($con) > 0) {
		echo "alert('Acampante excluído com sucesso');";
		echo "window.location.replace('acampantes.php')";
	} else {
		echo "window.location.replace('acampantes.php?error')";
	}

	echo "</script>";
?>
