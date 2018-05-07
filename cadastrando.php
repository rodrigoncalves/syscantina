<?php
	include_once("header.php");
	include_once("conexao.php");

	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
	$equipe_id = isset($_GET["equipe_id"]) ? $_GET["equipe_id"] : "";
	$conta = isset($_GET["conta"]) ? $_GET["conta"] : "";

	$equipes = mysqli_query($con, "SELECT * FROM equipes");
?>

<div class="container theme-showcase" role="main">
	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao salvar acampante no banco de dados!</center>
		</div>
	<?php } ?>

	<div class="page-header">
		<h1>Cadastrar Acampante</h1>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;">
				<div class="form-group">
					<label for="nome">Nome do Acampante</label><span style='color:red;'>*</span>
					<input name="nome" type="text" class="form-control" id="nome" placeholder="Insira o nome do Acampante" maxlength="60" value="<?=$nome?>">
				</div>
				<div class="form-group">
					<label for="equipe">Equipe</label><span style='color:red;'>*</span>
					<select class="form-control" name="equipe" id="equipe">
						<option>Selecione...</option>
						<?php while($eq = mysqli_fetch_array($equipes)) { ?>
							<option <?=$eq['id']==$equipe_id?"selected":""?>><?=$eq['nome']?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="conta">Valor a ser depositado</label><span style='color:red;'>*</span>
					<input name="conta" type="text" class="form-control" id="conta" placeholder="0,00" onkeypress="return SomenteNumero(event);" onkeyup="return FormatCurrency(this)" maxlength="6" value="<?=$conta?>">
				</div>

				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="listagem.php" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>

<br><br><br><br><br><br><br><br>
<?php include_once("footer.php"); ?>
