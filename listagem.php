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

		<title>Acampantes</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/theme.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body role="document">
		<?php
			$resultado=mysql_query("SELECT * FROM acampantes ORDER BY equipe,nome");
			setlocale(LC_MONETARY, "pt_BR", "ptb");
			include_once("menu_admin.php");
		?>

		<div class="container theme-showcase" role="main">
			<?php if (isset($_GET["success"])) { ?>
				<div class="alert alert-success" role="alert">
					<center><strong>Sucesso!</strong> Opera&ccedil;&atilde;o realizada com sucesso!</center>
				</div>
			<?php } ?>

			<div class="page-header">
				<div class="row">
					<div class="col-sm-6">
						<h1>Lista de acampantes</h1>
					</div>
					<div class="col-sm-6 text-right h2">
						<a class="btn btn-primary" href="cadastrando.php"><i class="fa fa-plus"></i> Cadastrar novo</a>
						<a class="btn btn-default" href="listagem.php"><i class="fa fa-refresh"></i> Atualizar</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-bordered responsive-table">
						<thead>
							<tr class="active">
								<th style="text-align: center">#</th>
								<th style="text-align: center">Nome</th>
								<th style="text-align: center">Equipe</th>
								<th style="text-align: center">Saldo</th>
								<th style="text-align: center" colspan="4">A&ccedil;&otilde;es</th>
							</tr>
						</thead>

						<tbody>
							<?php $num=1; ?>
							<?php while($acampante = mysql_fetch_array($resultado)) { ?>
								<tr>
									<td align="center"><?=$num++?></td>
									<td align="center"><?=$acampante['nome']?></td>
									<td align="center"><?=$acampante['equipe']?></td>
									<td align="center"><?='R$ '.number_format($acampante['conta'], 2, ',', '.')?></td>
									<td align="center"><a href="comprando.php?id=<?=$acampante['id']?>">Comprar</a></td>
									<td align="center"><a href="historico.php?id=<?=$acampante['id']?>">Hist&oacute;rico</a></td>
									<td align="center"><a href="editando.php?id=<?=$acampante['id']?>">Editar</a></td>
									<td align="center"><a href="excluir_acampante.php?id=<?=$acampante['id']?>" onclick="return confirm('Deseja mesmo excluir?');">Excluir</a></td>
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
