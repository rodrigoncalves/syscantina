<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$acampante_id = $_POST["acampante_id"];

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysql_fetch_array($sql);

	$novo_saldo = $acampante["conta"] - $valor_compra;

	mysql_query("UPDATE acampantes SET conta=$novo_saldo WHERE id=$acampante_id");

	mysql_query("INSERT INTO historico (acampante_id, valor_compra) VALUES ('$acampante_id', '$valor_compra')");
?>

<script>
<?php if (mysql_affected_rows() > 0) { ?>
	window.location.replace("historico.php?success");
<?php } else { ?>
	window.location.replace("comprando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&saldo=<?=$saldo?>&valor_compra=<?=$valor_compra?>&error");
<?php } ?>
</script>
