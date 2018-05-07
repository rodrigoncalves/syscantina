<?php
	include_once("conexao.php");
	include_once("header.php");
	$acampantes=mysqli_query($con, "SELECT * FROM acampantes ORDER BY nome");
	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase" role="main">
	<?php if (isset($_GET["success"])) { ?>
		<div class="alert alert-success" role="alert">
			<center><strong>Sucesso!</strong> Opera&ccedil;&atilde;o realizada com sucesso!</center>
		</div>
	<?php } ?>

	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro!</strong> Houve algum erro com banco de dados! Consulte o administrador.</center>
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
					<?php while($acampante = mysqli_fetch_array($acampantes)) { ?>
						<?php
							$sql=mysqli_query($con, "SELECT nome FROM equipes WHERE id=".$acampante['equipe_id']);
							$acampante['equipe']=mysqli_fetch_array($sql)['nome'];
						?>
						<tr>
							<td align="center"><?=$num++?></td>
							<td align="center"><?=$acampante['nome']?></td>
							<td align="center"><?=$acampante['equipe']?></td>
							<td align="center"<?=$acampante['conta']<=0 ? " style='color:red;'" : ""?>>
								<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?></td>
							<td align="center"><a class="btn btn-warning btn-xs" title="Comprar" href="comprando.php?id=<?=$acampante['id']?>"><i class="fa fa-shopping-cart"></i></a></td>
							<td align="center"><a class="btn btn-success btn-xs" title="Hist&oacute;rico" href="historico.php?id=<?=$acampante['id']?>"><i class="fa fa-history"></i></a></td>
							<td align="center"><a class="btn btn-primary btn-xs" title="Editar" href="editando.php?id=<?=$acampante['id']?>"><i class="fa fa-pencil-square-o"></i></a></td>
							<td align="center"><a class="btn btn-danger btn-xs" title="Excluir" href="excluir_acampante.php?id=<?=$acampante['id']?>" onclick="return confirm('Excluir um acampante implica em excluir tambem seus registros de compra. Tem certeza que deseja continuar?');"><i class="fa fa-trash-o"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once("footer.php") ?>
