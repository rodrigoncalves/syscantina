<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$descricao = $_POST["descricao"];
	$acampante_id = $_POST["acampante_id"];
	$compra_id = $_POST["compra_id"];

	$valor_compra = str_replace(',', '', str_replace(',','.',$valor_compra));

	$sql=mysqli_query($con, "SELECT * FROM historico WHERE id=$compra_id");
	$compra=mysqli_fetch_array($sql);

	$sql=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysqli_fetch_array($sql);

	$valor_antigo = $compra["valor_compra"];

	$novo_saldo = $acampante["conta"] + ($valor_antigo - $valor_compra);

	mysqli_query($con, "UPDATE historico SET acampante_id=$acampante_id, valor_compra=$valor_compra, descricao='$descricao' WHERE id=$compra_id");

	if (mysqli_affected_rows($con) >= 0) {
		mysqli_query($con, "UPDATE acampantes SET conta=$novo_saldo WHERE id=".$compra['acampante_id']);
	}

	if (mysqli_affected_rows($con) < 0) {
		header("location:editando_historico.php?acampante_id=$acampante_id&compra_id=$compra_id&error");
	} else {
		header("location:historico.php?success");
	}
?>
