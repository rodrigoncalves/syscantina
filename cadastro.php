<?php
	include_once("conexao.php");

	// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
	$nome	= $_POST["nome"];
	$conta	= $_POST["conta"];
	$equipe	= $_POST["equipe"];

	$conta = str_replace(',', '', str_replace(',','.',$conta));

	// Gravando no banco de dados
	mysql_query("INSERT INTO `acampantes` ( `nome` ,`conta` , `equipe` , `id` ) VALUES ('$nome', '$conta','$equipe','')");

	if (mysql_affected_rows() < 0) {
		header("cadastrando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&conta=<?=$conta?>&error");
	} else {
		header("location:listagem.php?success");
	}
?>
