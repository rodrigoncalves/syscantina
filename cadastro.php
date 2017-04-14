<?php
	include_once("conexao.php");

	// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
	$nome	= $_POST["nome"];
	$conta	= $_POST["conta"];
	$equipe	= $_POST["equipe"];

	// Gravando no banco de dados
	mysql_query("INSERT INTO `acampantes` ( `nome` ,`conta` , `equipe` , `id` ) VALUES ('$nome', '$conta','$equipe','')");
?>

<script>
<?php if (mysql_affected_rows() < 0) { ?>
	window.location.replace("cadastrando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&conta=<?=$conta?>&error");
<?php } else { ?>
	window.location.replace("listagem.php?success");
<?php } ?>
</script>
