<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Página Administrativa">
	<meta name="author" content="FD">
	<link rel="icon" href="imagens/favicon.ico">

	<title>Cadastro</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="css/theme.css" rel="stylesheet">
	<script src="js/ie-emulation-modes-warning.js"></script>

	<script type="text/javascript">
		function redirecionar() {
			window.location="cadastrando.php";
		}

		function redirecionar2() {
			window.location="administrativo.php";
		}

		function redirecionar3() {
			window.location="listagem.php";
		}
	</script>
</head>

<body>
	<?php
		include_once("menu_admin.php");
		include_once("conexao.php");

		// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
		$nome	= $_POST["nome"];
		$conta	= $_POST["conta"];
		$equipe	= $_POST["equipe"];

		// Gravando no banco de dados
		mysql_query("INSERT INTO `acampantes` ( `nome` ,`conta` , `equipe` , `id` ) VALUES ('$nome', '$conta','$equipe','')");
	?>

	<script>
	<?php if (mysql_affected_rows() > 0) { ?>
		window.location.replace("listagem.php?success");
	<?php } else { ?>
		window.location.replace("cadastrando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&conta=<?=$conta?>&error");
	<?php } ?>
	</script>

</body>
</html>
