<?php
	include_once("conexao.php");
	$id=$_GET["id"];
	mysql_query("DELETE FROM acampantes WHERE id=".$id);
	mysql_query("DELETE FROM historico WHERE acampante_id=".$id);

	echo "<script>";
	if (mysql_affected_rows() > 0) {
		echo "alert('Acampante excluido com sucesso');";
		echo "window.location.replace('listagem.php')";
	} else {
		echo "window.location.replace('listagem.php?error')";
	}

	echo "</script>";
?>
