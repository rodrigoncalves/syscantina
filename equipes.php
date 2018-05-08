<?php
	include_once("conexao.php");
	include_once("header.php");
	$equipes=mysqli_query($con, "SELECT * FROM equipes");
	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

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
				<h1>Lista de equipes</h1>
			</div>
			<div class="col-sm-6 text-right h2">
				<a class="btn btn-primary" href="form_equipe.php"><i class="fa fa-plus"></i> Cadastrar novo</a>
				<a class="btn btn-default" href="equipes.php"><i class="fa fa-refresh"></i> Atualizar</a>
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
						<th style="text-align: center" colspan="3">Ações</th>
					</tr>
				</thead>

				<tbody>
					<?php $num=1; ?>
					<?php while($equipe = mysqli_fetch_array($equipes)) { ?>
						<tr>
							<td align="center"><?=$num++?></td>
							<td align="center"><?=$equipe['nome']?></td>]
							<td align="center"><a class="btn btn-primary btn-xs" title="Ver" href="historico.php?id=<?=$acampante['id']?>"><i class="fa fa-history"></i></a></td>
							<td align="center"><a class="btn btn-success btn-xs" title="Editar" href="form_equipe.php?id=<?=$equipe['id']?>"><i class="fa fa-pencil-square-o"></i></a></td>
							<td align="center"><a class="btn btn-danger btn-xs" title="Excluir" href="excluir_equipe.php?id=<?=$equipe['id']?>" onclick="return confirm('Deseja mesmo excluir?');"><i class="fa fa-trash-o"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once("footer.php") ?>
