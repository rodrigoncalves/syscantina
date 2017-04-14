<?php
	include_once("conexao.php");
	$sql=mysql_query("DELETE FROM acampantes WHERE id=".$_GET["id"]);
?>

<script>
<?php if (mysql_affected_rows() > 0) { ?>
	alert('Acampante exluido com sucesso');
<?php } else { ?>
	alert('Erro ao excluir acampante do banco de dados');
<?php } ?>
	window.location.replace("listagem.php");
</script>
