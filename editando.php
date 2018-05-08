<?php
	if (!isset($_GET["id"])) {
		header("location:acampantes.php");
	}

	include_once("conexao.php");
	include_once("header.php");

	$resultado=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$_GET["id"]);
	$acampante=mysqli_fetch_array($resultado);

	$nome=$acampante["nome"];
	$equipe_id=$acampante["equipe_id"];
	$conta=$acampante["conta"];

	$equipes = mysqli_query($con, "SELECT * FROM equipes");

	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase" role="main">
	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao salvar acampante no banco de dados!</center>
		</div>
	<?php } ?>

	<div class="page-header">
		<h1>Editar Acampante</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form id="cadastro" name="cadastro" method="post" action="edita.php" onsubmit="return validaCampo(); return false;">
				<div class="form-group">
					<label for="nome">Nome do Acampante</label><span style='color:red;'>*</span>
					<input name="nome" type="text" class="form-control" id="nome" placeholder="Insira o nome do Acampante" maxlength="60" value="<?=$nome?>">
				</div>
				<div class="form-group">
					<label for="equipe">Equipe</label><span style='color:red;'>*</span>
					<select class="form-control" name="equipe_id" id="equipe">
						<option>Selecione...</option>
						<?php while($equipe = mysqli_fetch_array($equipes)) { ?>
							<option value=<?=$equipe['id']?> <?=$equipe['id']==$equipe_id?"selected":""?>><?=$equipe['nome']?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="conta">Saldo da conta</label><span style='color:red;'>*</span>
					<input name="conta" type="text" class="form-control" id="conta" placeholder="0,00" onkeypress="return SomenteNumero(event);" onkeyup="return FormatCurrency(this)" maxlength="6" value=<?=number_format($conta, 2, ',', '.')?>>
				</div>

				<input type="hidden" name="acampante_id" value="<?=$_GET['id']?>">

				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="acampantes.php" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>

<br><br><br><br><br><br><br><br>
<?php include_once("footer.php"); ?>
