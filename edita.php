<?php
	include_once("conexao.php");

	$nome = $_POST["nome"];
	$conta = $_POST["conta"];
	$equipe = $_POST["equipe"];
	$acampante_id = $_POST["acampante_id"];

	mysql_query("UPDATE acampantes SET nome='$nome', conta='$conta', equipe='$equipe' WHERE id='$acampante_id'");
?>

<script>
<?php if (mysql_affected_rows() < 0) { ?>
	window.location.replace("editando.php?id=<?=$acampante_id?>&error");
<?php } else { ?>
	window.location.replace("listagem.php?success");
<?php } ?>
</script>
