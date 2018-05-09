<?php
	include_once("conexao.php");
	$id = $_GET['id'];

	$res=mysqli_query($con, "SELECT * FROM historico WHERE id=$id");
	$compra=mysqli_fetch_array($res);

	$res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
	$acampante=mysqli_fetch_array($res);

	$novo_saldo = $acampante["conta"] + $compra["valor_compra"];

	mysqli_query($con, "UPDATE acampantes SET conta=$novo_saldo WHERE id=$compra['acampante_id']");

	if (mysqli_affected_rows($con) >= 0) {
		mysqli_query($con, "DELETE FROM historico WHERE id=$id");
	}

	echo "<script>";
	if (mysqli_affected_rows($con) > 0) {
		echo "alert('Histórico excluído com sucesso. O valor foi restituído para a conta do acampante');";
	} else {
		echo "alert('Erro ao excluir histórico do banco de dados');";
	}

	echo "window.location.replace('historico.php?id=".$acampante['id']."');";
	echo "</script>";
?>
