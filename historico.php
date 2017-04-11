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
			// Report all errors except E_NOTICE
			error_reporting(E_ALL & ~E_NOTICE);

			$acampante_id = isset($_GET["id"]) ? $_GET["id"] : 0;

			if ($acampante_id > 0) {
				$resultado=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
				$acampante=mysql_fetch_array($resultado);
				$compras=mysql_query("SELECT * FROM historico WHERE acampante_id=$acampante_id");
			} else {
				$compras=mysql_query("SELECT * FROM historico");
			}

			setlocale(LC_MONETARY, "pt_BR", "ptb");
			include_once("menu_admin.php");
		?>

		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Histórico de compras</h1>
				<?php if ($acampante_id > 0) { ?>
					<h3><b>Acampante: </b><?=$acampante["nome"]?> - <?=$acampante["equipe"]?></h3>
				<?php } else { ?>
					<h3><b>Todos acampantes</b></h3>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-striped table-bordered responsive-table">
						<thead>
							<tr>
								<th style="text-align: center">#</th>
								<?php if ($acampante_id == 0) { ?>
								<th style="text-align: center">Nome</th>
								<?php } ?>
								<th style="text-align: center">Valor</th>
								<th style="text-align: center" colspan="2">A&ccedil;&otilde;es</th>
							</tr>
						</thead>

						<tbody>
							<?php $num=1; ?>
							<?php while($compra = mysql_fetch_array($compras)) { ?>
								<tr>
									<td align="center"><?=$num++?></td>
									<?php if ($acampante_id == 0) { ?>
									<?php
										$resultado=mysql_query("SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
										$acampante=mysql_fetch_array($resultado);
									?>
									<th style="text-align: center"><?=$acampante["nome"]?></th>
									<?php } ?>
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
