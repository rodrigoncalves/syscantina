<?php
	include_once("header.php");

	$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
	$equipe = isset($_GET["equipe"]) ? $_GET["equipe"] : "";
	$conta = isset($_GET["conta"]) ? $_GET["conta"] : "";
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
						<option<?=$equipe=="Adoratubers"?" selected":""?>>Adoratubers</option>
						<option<?=$equipe=="Kidscípulos"?" selected":""?>>Kidscípulos</option>
						<option<?=$equipe=="Discitubers"?" selected":""?>>Discitubers</option>
						<option<?=$equipe=="Youdiscípulos"?" selected":""?>>Youdiscípulos</option>
						<option<?=$equipe=="Discipuloucos por Cristo"?" selected":""?>>Discipuloucos por Cristo</option>
						<option<?=$equipe=="Likes para Jesus"?" selected":""?>>Likes para Jesus</option>
						<option<?=$equipe=="Discipulindas"?" selected":""?>>Discipulindas</option>
						<option<?=$equipe=="VEVO em Cristo"?" selected":""?>>VEVO em Cristo</option>
						<option<?=$equipe=="Loukinhas por Jesus"?" selected":""?>>Loukinhas por Jesus</option>
						<option<?=$equipe=="GraceTube"?" selected":""?>>GraceTube</option>
						<option<?=$equipe=="COLABORADOR"?" selected":""?>>COLABORADOR</option>
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
