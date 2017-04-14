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
			include_once("conexao.php");

			// Report all errors except E_NOTICE
			error_reporting(E_ALL & ~E_NOTICE);

			$acampante_id = isset($_GET["id"]) ? $_GET["id"] : 0;

			if ($acampante_id > 0) {
				$sql=mysql_query("SELECT * FROM acampantes WHERE id=$acampante_id");
				$acampante=mysql_fetch_array($sql);
				$compras=mysql_query("SELECT * FROM historico WHERE acampante_id=$acampante_id");
			} else {
				$compras=mysql_query("SELECT * FROM historico");
			}

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
				<h1>Histórico de compras</h1>
				<?php if ($acampante_id > 0) { ?>
					<h3><b>Acampante: </b><?=$acampante["nome"]?> - <?=$acampante["equipe"]?></h3>
					<a href="historico.php">Histórico de todos os acampantes</a>
				<?php } else { ?>
					<h3><b>Todos acampantes</b></h3>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-bordered responsive-table">
						<thead>
							<tr class="active">
								<th style="text-align: center">#</th>
								<?php if ($acampante_id == 0) { ?>
								<th style="text-align: center">Nome</th>
								<th style="text-align: center">Equipe</th>
								<?php } ?>
								<th style="text-align: center">Valor</th>
								<th style="text-align: center" colspan="2">A&ccedil;&otilde;es</th>
							</tr>
						</thead>

						<tbody>
						<?php $num=1; ?>
						<?php while ($compra = mysql_fetch_array($compras)) { ?>
							<tr>
								<td align="center"><?=$num++?></td>
								<?php if ($acampante_id == 0) { ?>
								<?php
									$sql=mysql_query("SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
									$acampante=mysql_fetch_array($sql);
								?>
								<td style="text-align: center"><a href="historico.php?id=<?=$acampante['id']?>"><?=$acampante['nome']?></a></td>
								<td align="center"><?=$acampante["equipe"]?></td>
								<?php } ?>
								<td align="center"><?='R$ '.number_format($compra["valor_compra"], 2, ',', '.')?></td>
								<td align="center"><a href=<?="editando_historico.php?acampante_id=".$compra['acampante_id']."&compra_id=".$compra['id']?>>Editar</a></td>
								<td align="center"><a href="excluir_historico.php?id=<?=$compra['id']?>" onclick="return confirm('Deseja mesmo excluir?');">Excluir</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
