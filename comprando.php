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
			include_once("conexao.php");
			include_once("menu_admin.php");

			$sql=mysql_query("SELECT * FROM acampantes WHERE id=".$_GET["id"]);
			$acampante=mysql_fetch_array($sql);

			setlocale(LC_MONETARY, "pt_BR", "ptb");
		?>

		<div class="container theme-showcase">

			<?php if ($acampante['conta']<=0) { ?>
				<div class="alert alert-danger" role="alert">
					<center><strong>Atenção: </strong><?=$acampante['nome']?> não tem saldo suficiente. Antes de realizar a compra, tenha certeza que deseja continuar.</center>
				</div>
			<?php } ?>

			<h2>Compra</h2>

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
					<label for="conta">Saldo dispon&iacute;vel</label>
					<input type="text" name="saldo" class="form-control" <?=$acampante['conta']<=0?" style='color:red';":""?>
						value="<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?>" disabled>
				</div>

				<div class="form-group">
					<label for="conta">Valor da compra</label>
					<input name="valor_compra" type="text" class="form-control" placeholder="0,00" onkeypress="return SomenteNumero(event);" onkeyup="return FormatCurrency(this)" maxlength="6">
				</div>

				<div class="form-group">
					<label for="conta">Descrição</label>
					<textarea class="form-control" form="form" placeholder="Insira os produtos" rows="4"></textarea>
				</div>

				<input type="hidden" name="acampante_id" value="<?=$acampante['id']?>">

				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="listagem.php" class="btn btn-default">Cancelar</a>
			</form>
		</div>

		<br><br><br><br><br><br><br><br>
		<?php include_once("footer.php"); ?>

	</body>
</html
