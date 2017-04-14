<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Página Administrativa">
		<meta name="author" content="Cesar">
		<link rel="icon" href="imagens/favicon.ico">

		<title>Lista de Acampantes</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
		<script src="js/validacao_campos.js"></script>
	</head>

	<body role="document">
		<?php
			include_once("menu_admin.php");
			include_once("conexao.php");

			$sql=mysql_query("SELECT * FROM acampantes WHERE id=".$_GET["acampante_id"]);
			$acampante=mysql_fetch_array($sql);

			$sql=mysql_query("SELECT * FROM historico WHERE id=".$_GET["compra_id"]);
			$compra=mysql_fetch_array($sql);

			setlocale(LC_MONETARY, "pt_BR", "ptb");
		?>

		<div class="container theme-showcase">

			<?php if (isset($_GET["error"])) { ?>
				<div class="alert alert-danger" role="alert">
					<center><strong>Erro</strong> ao editar compra no banco de dados!</center>
				</div>
			<?php } ?>

			<h2>Editar compra</h2>

			<form id="form" name="form" method="post" action="edita_historico.php" onsubmit="return validaCampo();">
				<div class="form-group">
					<label>Nome do acampante</label>
					<input name="nome" type="text" class="form-control" value="<?=$acampante['nome']?>" disabled>
				</div>

				<div class="form-group">
					<label for="equipe">Equipe</label>
					<input type="text" name="equipe" class="form-control" value="<?=$acampante['equipe']?>" disabled>
				</div>

				<div class="form-group">
					<label for="conta">Saldo dispon&iacute;vel</label>
					<input type="text" class="form-control" value="<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?>" disabled>
				</div>

				<div class="form-group">
					<label for="conta">Valor da compra</label>
					<input name="valor_compra" type="text" class="form-control" placeholder="0.00" onkeypress="return SomenteNumero(event);" maxlength="6" onkeyup="return FormatCurrency(this)" value=<?=number_format($compra['valor_compra'], 2, ',', '.')?>>
				</div>

				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="historico.php" class="btn btn-default">Cancelar</a>

				<input type="hidden" name="acampante_id" value="<?=$_GET['acampante_id']?>">
				<input type="hidden" name="compra_id" value="<?=$_GET['compra_id']?>">

				</div>
			</form>

		</div>
	</body>
</html
