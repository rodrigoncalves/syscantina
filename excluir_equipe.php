<?php
	include_once("conexao.php");
	$id=$_GET["id"];
	mysqli_query($con, "DELETE FROM equipes WHERE id=".$id);

	echo "<script>";
	if (mysqli_affected_rows($con) > 0) {
		echo "alert('Equipe excluido com sucesso');";
		echo "window.location.replace('equipes.php')";
	} else {
		echo "window.location.replace('equipes.php?error')";
	}

	echo "</script>";
?>
