<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$acampante_id = $_POST["acampante_id"];
	$compra_id = $_POST["compra_id"];

	$sql=mysql_query("SELECT * FROM historico WHERE id=$compra_id");
	$compra=mysql_fetch_array($sql);

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysql_fetch_array($sql);

	$valor_antigo = $compra["valor_compra"];

	$novo_saldo = $acampante["conta"] + ($valor_antigo - $valor_compra);

	mysql_query("UPDATE historico SET acampante_id=$acampante_id, valor_compra=$valor_compra WHERE id=$compra_id");
?>

<script>
<?php if (mysql_affected_rows() < 0) { ?>
	window.location.replace("editando_historico.php?acampante_id=<?=$acampante_id?>&compra_id=<?=$compra_id?>&error");
<?php } else { ?>
	window.location.replace("historico.php?success");
<?php } ?>
</script>
