<?php
	include_once("conexao.php");
	include_once("header.php");

	// Report all errors except E_NOTICE
	error_reporting(E_ALL & ~E_NOTICE);

	// Paginação
	$quantidade=30;
	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
	if ($pagina <= 0) $pagina = 1;
	$inicio = ($quantidade * $pagina) - $quantidade;

	// Verifica se foi passado id do acampante no GET
	$acampante_id = isset($_GET["id"]) ? $_GET["id"] : 0;
	if ($acampante_id > 0) {
		$res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$acampante_id");
		$acampante=mysqli_fetch_array($res);
		$res=mysqli_query($con, "SELECT nome FROM equipes WHERE id=".$acampante['equipe_id']);
		$acampante['equipe']=mysqli_fetch_array($res)['nome'];
	}

	$compras=mysqli_query($con, "SELECT * FROM historico " . ($acampante_id > 0 ? "WHERE acampante_id=$acampante_id " : "") . "ORDER BY timestamp DESC LIMIT $inicio, $quantidade");

	$sem_paginamento=isset($_GET["all"]);
	if ($sem_paginamento) {
		$compras=mysqli_query($con, "SELECT * FROM historico " . ($acampante_id > 0 ? "WHERE acampante_id=$acampante_id " : "") . "ORDER BY timestamp");
	}

	$res=mysqli_query($con, "SELECT id FROM historico");
	$total_compras=mysqli_num_rows($res);

	$res=mysqli_query($con, "SELECT SUM(valor_compra) FROM historico");
	$total_vendas=mysqli_fetch_array($res)[0];

	$res=mysqli_query($con, "SELECT SUM(valor_compra) FROM historico WHERE acampante_id=$acampante_id");
	$total_valor_compras=mysqli_fetch_array($res)[0];

	setlocale(LC_MONETARY, "pt_BR", "ptb");
	setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
	date_default_timezone_set('America/Sao_Paulo');
?>

<div class="container theme-showcase" role="main">
	<?php if (isset($_GET["success"])) { ?>
		<div class="alert alert-success" role="alert">
			<center><strong>Sucesso!</strong> Operação realizada com sucesso!</center>
		</div>
	<?php } ?>

	<div class="page-header">

		<div class="row">
			<div class="col-sm-6">
				<h1>Histórico de compras</h1>
			</div>
			<div class="col-sm-6 text-right h2">
			<?php if ($total_compras > $quantidade && $acampante_id == 0) { ?>
				<?php if ($sem_paginamento) { ?>
					<a class="btn btn-default" href="historico.php"><i class="fa fa-file-text-o"></i> Com paginamento</a>
				<?php } else { ?>
					<a class="btn btn-default" href="historico.php?all"><i class="fa fa-file-text-o"></i> Sem paginamento</a>
				<?php } ?>
				<a class="btn btn-default" href="historico.php"><i class="fa fa-refresh"></i> Atualizar</a>
			<?php } ?>
			</div>
		</div>

		<?php if ($acampante_id > 0) { ?>
			<h3><b>Acampante: </b><?=$acampante["nome"]?> - <?=$acampante["equipe"]?></h3>
			<h4 <?=$acampante['saldo']<=0?" style='color:red';":""?>><b>Saldo: </b><?='R$ '.number_format($acampante["saldo"], 2, ',', '.')?></h4>
			<?=$acampante['quitado']?"":"<a href=form_compra.php?id=".$acampante['id'].">Comprar</a><br>"?>
			<?=$acampante['quitado']?"<h5 style='color:green'>Acampante Finalizado</h5>":""?>
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
						<th style="text-align: center">Data - Horário</th>
						<?php if ($acampante_id == 0) { ?>
						<th style="text-align: center">Nome</th>
						<th style="text-align: center">Equipe</th>
						<?php } ?>
						<th style="text-align: center">Valor</th>
						<th style="text-align: center">Descrição</th>
						<th style="text-align: center" colspan="2">Ações</th>
					</tr>
				</thead>

				<tbody>
				<?php $num=1; ?>
				<?php while ($compra = mysqli_fetch_array($compras)) { ?>
					<tr>
						<td align="center"><?=$num++?></td>
						<td align="center"><?=strftime('%d/%m (%a) - %H:%M', strtotime($compra["timestamp"]));?></td>
						<?php if ($acampante_id == 0) {
							$res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$compra['acampante_id']);
							$acampante=mysqli_fetch_array($res);
							$res=mysqli_query($con, "SELECT nome FROM equipes WHERE id=".$acampante['equipe_id']);
							$acampante['equipe']=mysqli_fetch_array($res)['nome'];
						?>
						<td align="center"><a href="historico.php?id=<?=$acampante['id']?>"><?=$acampante['nome']?></a></td>
						<td align="center"><?=$acampante["equipe"]?></td>
						<?php } ?>
						<td align="center"><?='R$ '.number_format($compra["valor_compra"], 2, ',', '.')?></td>
						<td align="center"><?=$compra["descricao"]?></td>
						<td align="center"><a class="btn btn-primary btn-xs" title="Editar" href=<?="form_compra.php?acampante_id=".$compra['acampante_id']."&compra_id=".$compra['id']?>><i class="fa fa-pencil-square-o"></i></a></td>
						<td align="center"><a class="btn btn-danger btn-xs" title="Excluir" href="excluir_historico.php?id=<?=$compra['id']?>" onclick="return confirm('Deseja mesmo excluir?');"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php } ?>
				</tbody>
				<tfoot>
				<?php if ($acampante_id == 0) { ?>
					<tr><th colspan="9">Total de vendas: <?='R$ '.number_format($total_vendas, 2, ',', '.')?></th></tr>
				<?php } else { ?>
					<tr><th colspan="9">Total de compras: <?='R$ '.number_format($total_valor_compras, 2, ',', '.')?></th></tr>
				<?php } ?>
				</tfoot>
			</table>
		</div>
	</div>

	<?php
		$total_pagina=ceil($total_compras/$quantidade);

		// Define o valor máximo a ser exibido na página tanto para direita quanto pra esquerda
		$exibir=$quantidade;

		$prev = (($pagina-1) == 0) ? 1 : $pagina-1;
		$prox = (($pagina+1) >= $total_pagina) ? $total_pagina : $pagina+1;
	?>

	<?php if ($prev != $prox && $prox > 0 && !$sem_paginamento && $acampante_id == 0) { ?>
		<div id="navegacao" align="center">
			<a href="?pagina=1"><<</a> | <a href="?pagina=<?=$anterior?>"><</a>
			<?=" | "?>
			<?php for ($i=$pagina-$exibir; $i<=$pagina-1; $i++) { ?>
				<?php if ($i>0) { ?>
					<a href="?pagina=<?=$i?>"><?=$i?></a>
				<?php } ?>
			<?php } ?>

			<a href="?pagina=<?=$pagina?>"><strong><?=$pagina?></strong></a>

			<?php for ($i=$pagina+1; $i<$pagina+$exibir; $i++) { ?>
				<?php if ($i<=$total_pagina) { ?>
					<a href="?pagina=<?=$i?>"><?=$i?></a>
				<?php } ?>
			<?php } ?>

			<?=" | "?>
			<a href="?pagina=<?=$prox?>">></a>
			<?=" | "?>
			<a href="?pagina=<?=$total_pagina?>">>></a>
		</div>
	<?php } ?>
</div>
<?php include_once("footer.php");?>
