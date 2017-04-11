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
			$acampante_id = $_GET["id"];

			$resultado=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
			$acampante=mysql_fetch_array($resultado);

			$compras=mysql_query("SELECT * FROM historico WHERE acampante_id=$acampante_id");

			setlocale(LC_MONETARY, "pt_BR", "ptb");
			include_once("menu_admin.php");
		?>

		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Histórico de compras</h1>
				<h3><b>Acampante: </b><?=$acampante["nome"]?> - <?=$acampante["equipe"]?></h3>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-striped table-bordered responsive-table">
						<thead>
							<tr>
								<th style="text-align: center">#</th>
								<th style="text-align: center">Valor</th>
								<th style="text-align: center" colspan="2">A&ccedil;&otilde;es</th>
							</tr>
						</thead>

						<tbody>
							<?php $num=1; ?>
							<?php while($compra = mysql_fetch_array($compras)) { ?>
								<tr>
									<td align="center"><?=$num++?></td>
									<td align="center"><?='R$ '.number_format($compra["valor_compra"], 2, ',', '.')?></td>
									<td align="center">Editar</td>
									<td align="center">Apagar</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
