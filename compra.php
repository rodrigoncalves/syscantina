<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$acampante_id = $_POST["acampante_id"];
	$descricao = $_POST["descricao"];

	$valor_compra = str_replace(',', '', str_replace(',','.',$valor_compra));

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysql_fetch_array($sql);

	$novo_saldo = $acampante["conta"] - $valor_compra;

	mysql_query("UPDATE acampantes SET conta=$novo_saldo WHERE id=$acampante_id");
	mysql_query("INSERT INTO historico (acampante_id, valor_compra, descricao) VALUES ('$acampante_id', '$valor_compra', '$descricao')");

	if (mysql_affected_rows() < 0) {
		header("location:comprando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&saldo=<?=$saldo?>&valor_compra=<?=$valor_compra?>&descricao=<?=$descricao?>&error");
	} else {
		header("location:historico.php?success");
	}
?>
