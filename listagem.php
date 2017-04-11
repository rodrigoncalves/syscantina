<?php
	session_start();
	//include_once("seguranca.php");
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
		$resultado=mysql_query("SELECT * FROM acampantes ORDER BY equipe,nome");
		$linhas=mysql_num_rows($resultado);
	?>

	<?php include_once("menu_admin.php");?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Acampantes</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-striped table-bordered responsive-table">
				<thead>
					<tr>
						<th style="text-align: center">Nome</th>
						<th style="text-align: center">Equipe</th>
						<th style="text-align: center">Saldo</th>
						<th style="text-align: center" colspan="3">A&ccedil;&otilde;es</th>
					</tr>
				</thead>

				<tbody>
					<?php setlocale(LC_MONETARY, "pt_BR", "ptb")?>
					<?php while($linhas = mysql_fetch_array($resultado)) { ?>
						<tr>
							<td align="center"><?=$linhas['nome']?></td>
							<td align="center"><?=$linhas['equipe']?></td>
							<!-- a linha abaixo deixa no formato de dinheiro (R$)  -->
							<!--<td align="center"><=money_format('%n', $linhas['conta'])?></td>-->
							<td align="center"><?='R$'.number_format($linhas['conta'], 2, ',', '.')?></td>
							<td align="center">Editar</td>
							<td align="center"><a href="comprando.php?id=<?=$linhas['id']?>">Comprar</a></td>
							<td align="center">Apagar</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

		<?php include_once("footer.php") ?>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/docs.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>

</html>
