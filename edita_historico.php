<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$descricao = $_POST["descricao"];
	$acampante_id = $_POST["acampante_id"];
	$compra_id = $_POST["compra_id"];

	$valor_compra = str_replace(',', '', str_replace(',','.',$valor_compra));

	$sql=mysql_query("SELECT * FROM historico WHERE id=$compra_id");
	$compra=mysql_fetch_array($sql);

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysql_fetch_array($sql);

	$valor_antigo = $compra["valor_compra"];

	$novo_saldo = $acampante["conta"] + ($valor_antigo - $valor_compra);

	mysql_query("UPDATE historico SET acampante_id=$acampante_id, valor_compra=$valor_compra, descricao='$descricao' WHERE id=$compra_id");

	if (mysql_affected_rows() >= 0) {
		mysql_query("UPDATE acampantes SET conta=$novo_saldo WHERE id=".$compra['acampante_id']);
	}

	if (mysql_affected_rows() < 0) {
		header("location:editando_historico.php?acampante_id=$acampante_id&compra_id=$compra_id&error");
	} else {
		header("location:historico.php?success");
	}
?>
