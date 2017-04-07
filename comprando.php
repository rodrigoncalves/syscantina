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
		<?php include_once("menu_admin.php") ?>
		<?php
			$resultado=mysql_query("SELECT * FROM acampantes WHERE id=".$_GET["id"]);
			$acampante=mysql_fetch_array($resultado);

			$resultado=mysql_query("SELECT * FROM produtos ORDER BY descricao");

			setlocale(LC_MONETARY, "pt_BR", "ptb");
		?>

		<div class="container theme-showcase">

			<h1><?=$acampante["nome"]?></h1>

			<form id="form" name="form" method="post" action="compra.php" onsubmit="return validaCampo();">
				<div class="form-group">
					<label>Nome do acampante</label>
					<input name="nome" type="text" class="form-control" value="<?=$acampante['nome']?>" disabled>
				</div>

				<div class="form-group">
					<label for="equipe">Equipe</label>
					<input type="text" name="equipe" class="form-control" value="<?=$acampante['equipe']?>" disabled>
				</div>

				<div class="form-group">
					<label for="conta">Saldo</label>
					<input type="text" class="form-control" value="<?=money_format("%n", $acampante['conta'])?>" disabled>
				</div>

				<div class="form-group">
					<label for="conta">Selecione o produto</label>

					<select class="form-control" name="produto_id">
						<option>Selecione...</option>
						<?php while ($produto = mysql_fetch_array($resultado)) { ?>
							<option value=<?=$produto["id"]?>><?=$produto["descricao"]." - ".money_format("%n", $produto["valor"])?></option>
						<?php } ?>
					</select>
				</div>

				<button type="submit" class="btn btn-default">Enviar</button>

				<input type="hidden" name="acampante_id" value="<?=$acampante['id']?>">

				</div>
			</form>

		</div>
	</body>

	<script>
		function validaCampo() {
			if (document.form.produto_id.value=="Selecione...") {
				alert("Selecione um produto!");
				return false;
			}
		}
	</script>
</html
