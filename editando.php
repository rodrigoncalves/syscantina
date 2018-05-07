<?php
	if (!isset($_GET["id"])) {
		header("location:listagem.php");
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
					<select class="form-control" name="equipe" id="equipe">
						<option>Selecione...</option>
						<?php while($eq = mysqli_fetch_array($equipes)) { ?>
							<option <?=$eq['id']==$equipe_id?"selected":""?>><?=$eq['nome']?></option>
						<?php } ?>
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
					<label for="conta">Saldo da conta</label><span style='color:red;'>*</span>
					<input name="conta" type="text" class="form-control" id="conta" placeholder="0,00" onkeypress="return SomenteNumero(event);" onkeyup="return FormatCurrency(this)" maxlength="6" value=<?=number_format($conta, 2, ',', '.')?>>
				</div>

				<input type="hidden" name="acampante_id" value="<?=$_GET['id']?>">

				<button type="submit" class="btn btn-primary">Salvar</button>
				<a href="listagem.php" class="btn btn-default">Cancelar</a>
			</form>
		</div>
	</div>
</div>

<br><br><br><br><br><br><br><br>
<?php include_once("footer.php"); ?>
