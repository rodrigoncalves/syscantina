<div class="container theme-showcase" role="main">
	<?php if (isset($_GET["success"])) { ?>
		<div class="alert alert-success" role="alert">
			<center><strong>Sucesso!</strong> Operação realizada com sucesso!</center>
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
				<h1><?=$titulo?></h1>
			</div>
			<div class="col-sm-6 text-right h2">
				<a class="btn btn-primary" href="form_acampante.php"><i class="fa fa-plus"></i> Cadastrar novo</a>
				<a class="btn btn-default" href=<?=$source.(isset($_GET["id"])?"?id=".$_GET["id"]:"")?>><i class="fa fa-refresh"></i> Atualizar</a>
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
						<th style="text-align: center">Conta</th>
						<th style="text-align: center">Saldo</th>
						<th style="text-align: center" colspan="5">Ações</th>
					</tr>
				</thead>

				<tbody>
					<?php $num=1; ?>
					<?php while($acampante = mysqli_fetch_array($acampantes)) { ?>
						<?php
							$sql=mysqli_query($con, "SELECT * FROM equipes WHERE id=".$acampante['equipe_id']);
							$acampante['equipe']=mysqli_fetch_array($sql);
						?>
						<tr <?=$acampante['quitado']?'class="success"':''?>>
							<td align="center"><?=$num++?></td>
							<td align="center"><?=$acampante['nome']?></td>
							<td align="center">
								<?php if ($source=="acampantes.php") { ?>
									<a href="ver_equipe.php?id=<?=$acampante['equipe']['id']?>"><?=$acampante['equipe']['nome']?></a>
								<?php } else { ?>
									<?=$acampante['equipe']['nome']?>
								<?php } ?>
							</td>
							<td align="center"<?=$acampante['conta']<=0 ? " style='color:red;'" : ""?>>
								<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?></td>
							<td align="center"<?=$acampante['saldo']<=0 ? " style='color:red;'" : ""?>>
								<?='R$ '.number_format($acampante['saldo'], 2, ',', '.')?></td>
							<td align="center"><a class="btn btn-warning btn-xs" title="Comprar" <?=$acampante['quitado']?"disabled":"href=form_compra.php?id=".$acampante['id']?>><i class="fa fa-shopping-cart"></i></a></td>
							<td align="center"><a class="btn btn-success btn-xs" title="Histórico" href="historico.php?id=<?=$acampante['id']?>"><i class="fa fa-history"></i></a></td>
							<td align="center"><a class="btn btn-primary btn-xs" title="Editar" href="form_acampante.php?id=<?=$acampante['id']?>"><i class="fa fa-pencil-square-o"></i></a></td>
							<td align="center"><a class="btn btn-danger btn-xs" title="Excluir" href="excluir_acampante.php?id=<?=$acampante['id']?>" onclick="return confirm('Excluir um acampante implica em excluir tambem seus registros de compra. Tem certeza que deseja continuar?');"><i class="fa fa-trash-o"></i></a></td>
							<?php if ($acampante['quitado']) { ?>
								<td align="center"><a class="btn btn-danger btn-xs" title="Desfazer quitar" href="quitar_acampante.php?acampante_id=<?=$acampante['id']?>&equipe_id=<?=$acampante['equipe_id']?>&source=<?=$source?>" onclick="return confirm('Deseja desfazer a marcação de quitado deste acampante?');"><i class="fa fa-check"></i></a></td>
							<?php } else { ?>
								<td align="center"><a class="btn btn-success btn-xs" title="Finalizar" href="quitar_acampante.php?acampante_id=<?=$acampante['id']?>&equipe_id=<?=$acampante['equipe_id']?>&source=<?=$source?>" onclick="return confirm('Deseja marcar este acampante como quitado?');"><i class="fa fa-check"></i></a></td>
							<?php } ?>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr><th colspan="10">Total arrecadado: <?='R$ '.number_format($total_arrecadado, 2, ',', '.')?></th></tr>
					<tr><th colspan="10">Total a quitar: <?='R$ '.number_format($total_quitar, 2, ',', '.')?></th></tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<?php include_once("footer.php") ?>
