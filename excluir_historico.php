<?php
	include_once("conexao.php");
	$sql=mysqli_query($con, "SELECT * FROM historico WHERE id=".$_GET["id"]);
	$compra=mysqli_fetch_array($sql);

	$sql=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
	$acampante=mysqli_fetch_array($sql);

	$novo_saldo = $acampante["conta"] + $compra["valor_compra"];

	mysqli_query($con, "UPDATE acampantes SET conta=$novo_saldo WHERE id=".$compra['acampante_id']);

	if (mysqli_affected_rows($con) >= 0) {
		mysqli_query($con, "DELETE FROM historico WHERE id=".$_GET['id']);
	}

	echo "<script>";
	if (mysqli_affected_rows($con) > 0) {
		echo "alert('Historico excluido com sucesso. O valor foi restituido para a conta do acampante');";
	} else {
		echo "alert('Erro ao excluir historico do banco de dados');";
	}

	echo "window.location.replace('historico.php?id=".$acampante['id']."');";
	echo "</script>";
?>
