<?php
	include_once("conexao.php");
	$sql=mysql_query("SELECT * FROM historico WHERE id=".$_GET["id"]);
	$compra=mysql_fetch_array($sql);

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
	$acampante=mysql_fetch_array($sql);

	$novo_saldo = $acampante["conta"] + $compra["valor_compra"];

	mysql_query("UPDATE acampantes SET conta=$novo_saldo WHERE id=".$compra['acampante_id']);

	if (mysql_affected_rows() > 0 || $compra["valor_compra"] == 0) {
		mysql_query("DELETE FROM historico WHERE id=".$_GET['id']);
	}
?>

<script>
<?php if (mysql_affected_rows() > 0) { ?>
	alert('Historico exluido com sucesso. O valor foi restituido ao acampante');
<?php } else { ?>
	alert('Erro ao excluir historico do banco de dados');
<?php } ?>
	window.location.replace("historico.php");
</script>
