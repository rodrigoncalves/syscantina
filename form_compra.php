<?php
	include_once("conexao.php");
	include_once("header.php");

	if (isset($_GET["id"])) {
		$acampante_id = $_GET["id"];
	} else if (isset($_GET["acampante_id"])) {
		$acampante_id = $_GET["acampante_id"];
	}

	$res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$acampante_id);
	$acampante=mysqli_fetch_array($res);
	$res=mysqli_query($con, "SELECT nome FROM equipes WHERE id=".$acampante['equipe_id']);
	$acampante['equipe']=mysqli_fetch_array($res)['nome'];

	$valor_compra = "";
	$descricao = "";
	if (isset($_GET["compra_id"])) {
		$compra_id = $_GET["compra_id"];
		$res=mysqli_query($con, "SELECT * FROM historico WHERE id=".$compra_id);
		$compra=mysqli_fetch_array($res);
		$valor_compra = number_format($compra['valor_compra'], 2, ',', '.');
		$descricao = $compra['descricao'];
	}

	if (isset($_GET["valor_compra"])) {
		$valor_compra = $_GET["valor_compra"];
	}
	if (isset($_GET["descricao"])) {
		$descricao = $_GET["descricao"];
	}

	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase">

	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao editar compra no banco de dados!</center>
		</div>
	<?php } ?>

	<?php if ($acampante['saldo']<=0) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Atenção: </strong><?=$acampante['nome']?> não tem saldo suficiente. Antes de realizar a compra, tenha certeza que deseja continuar.</center>
		</div>
	<?php } ?>

	<?php if (isset($compra_id)) { ?>
		<h2>Editar compra</h2>
	<?php } else { ?>
		<h2>Cadastrar compra</h2>
	<?php } ?>

	<form id="form" name="form" method="post" action="salva_compra.php" onsubmit="return validaCampo();">
		<div class="form-group">
			<label>Nome do acampante</label>
			<input name="nome" type="text" class="form-control" value="<?=$acampante['nome']?>" disabled>
		</div>

		<div class="form-group">
			<label for="equipe">Equipe</label>
			<input type="text" name="equipe" class="form-control" value="<?=$acampante['equipe']?>" disabled>
		</div>

		<div class="form-group">
			<label for="saldo">Saldo disponível</label>
			<input type="text" class="form-control" <?=$acampante['saldo']<=0?" style='color:red';":""?>
				value="<?='R$ '.number_format($acampante['saldo'], 2, ',', '.')?>" disabled>
		</div>

		<div class="form-group">
			<label for="valor_compra">Valor da compra</label>
			<input name="valor_compra" id="valor_compra" type="text" class="form-control" placeholder="0.00" onkeypress="return SomenteNumero(event);" maxlength="6" onkeyup="return FormatCurrency(this)" value=<?=$valor_compra?>>
		</div>

		<div class="form-group">
			<label for="descricao">Descrição</label>
			<textarea name="descricao" id="descricao" class="form-control" rows="3" maxlength="255"><?=$descricao?></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Salvar</button>
		<a href=<?=isset($compra_id)?"historico.php":"acampantes.php"?> class="btn btn-default">Cancelar</a>

		<input type="hidden" name="acampante_id" value="<?=$acampante_id?>">

		<?php if (isset($compra_id)) { ?>
			<input type="hidden" name="compra_id" value="<?=$compra_id?>">
		<?php } ?>

		</div>
	</form>

</div>

<br><br><br><br><br><br><br><br>
<?php include_once("footer.php"); ?>
