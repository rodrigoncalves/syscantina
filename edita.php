<?php
	include_once("conexao.php");

	$nome	= $_POST["nome"];
	$conta	= $_POST["conta"];
	$equipe	= $_POST["equipe"];

	mysql_query("UPDATE acampantes SET nome=$nome, conta=$novo_saldo, equipe=$equipe WHERE id=$acampante_id");

	$sql=mysql_query("UPDATE acampantes WHERE id=".$_GET["id"]);
?>

<script>
<?php if (mysql_affected_rows() > 0) { ?>
	alert('Acampante exluido com sucesso');
<?php } else { ?>
	alert('Erro ao excluir acampante do banco de dados');
<?php } ?>
	window.location.replace("listagem.php");
</script>
