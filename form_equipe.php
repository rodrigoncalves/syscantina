<?php
	include_once("conexao.php");
	include_once("header.php");

	if (isset($_GET["id"])) {
		$equipe_id = $_GET["id"];
		$sql=mysqli_query($con, "SELECT * FROM equipes WHERE id=".$equipe_id);
		$equipe=mysqli_fetch_array($sql);
	}

	if (isset($_GET["nome"])) {
		$equipe['nome'] = $_GET["nome"];
	}
?>

<div class="container theme-showcase">

	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao editar equipe no banco de dados!</center>
		</div>
	<?php } ?>

	<?php if (isset($equipe_id)) { ?>
		<h2>Editar equipe</h2>
	<?php } else { ?>
		<h2>Cadastrar equipe</h2>
	<?php } ?>

	<form id="form" name="form" method="post" action="salva_equipe.php" onsubmit="return validaCampo();">
		<div class="form-group">
			<label>Nome da equipe</label>
			<input name="nome" type="text" class="form-control" value="<?=isset($equipe)?$equipe['nome']:""?>">
		</div>

		<?php if(isset($equipe_id)) { ?>
			<input type="hidden" name="equipe_id" value="<?=$equipe?>">
		<?php } ?>

		<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="equipes.php" class="btn btn-default">Cancelar</a>

		</div>
	</form>

</div>
