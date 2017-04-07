<?php
	session_start();
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Página Administrativa">
		<meta name="author" content="Cesar">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Listagem de Acampantes</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">
		<?php
			$produto_id = $_POST["produto_id"];
			$acampante_id = $_POST["acampante_id"];

			mysql_query("INSERT INTO historico (acampante_id, produto_id) VALUES ('$produto_id', 'acampante_id')");


			$resultado=mysql_query("SELECT * FROM produtos WHERE id=$produto_id");
			$produto=mysql_fetch_array($resultado);

			$resultado=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
			$acampante=mysql_fetch_array($resultado);

			$novo_saldo = $acampante["conta"] - $produto["valor"];

			mysql_query("UPDATE acampantes SET conta=$novo_saldo WHERE id=$acampante_id");

			setlocale(LC_MONETARY, "pt_BR", "ptb");
		?>

		<div class="container theme-showcase">
			<div class="alert alert-success" role="alert">
				<center>
					<h4><strong>Sucesso!</strong> Opera&ccedil;&atilde;o realizada com sucesso!</h4>
					<h5>Novo saldo de <?=$acampante["nome"]?> &eacute; <?=money_format("%n", $acampante['conta'])?></h5>

				</center>
			</div>

			<center>
				<button class="btn btn-default" onclick="redirecionar();">Fazer uma nova compra</button>
				<button class="btn btn-default" onclick="redirecionar2();">Voltar para P&aacute;gina Inicial</button>
			</center>
		</div>

		<script>
			function redirecionar() {
				window.location="listagem.php";
			}

			function redirecionar2() {
				window.location="administrativo.php";
			}
		</script>

	</body>
</html>
