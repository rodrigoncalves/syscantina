<?php
	include_once("conexao.php");
	include_once("header.php");

	$sql=mysqli_query($con, "SELECT * FROM equipes WHERE id=".$_GET["id"]);
	$equipe=mysqli_fetch_array($sql);

	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase">

	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao editar equipe no banco de dados!</center>
		</div>
	<?php } ?>

	<h2>Editar equipe</h2>

	<form id="form" name="form" method="post" action="salva_equipe.php" onsubmit="return validaCampo();">
		<div class="form-group">
			<label>Nome da equipe</label>
			<input name="nome" type="text" class="form-control" value="<?=$equipe['nome']?>">
		</div>

		<input type="hidden" name="equipe_id" value="<?=$_GET['id']?>">

		<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="historico.php" class="btn btn-default">Cancelar</a>

		</div>
	</form>

</div>
