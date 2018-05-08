<?php
	include_once("conexao.php");
	include_once("header.php");

	$sql=mysqli_query($con, "SELECT * FROM acampantes WHERE id=".$_GET["id"]);
	$acampante=mysqli_fetch_array($sql);

	$sql=mysqli_query($con, "SELECT nome FROM equipes WHERE id=".$acampante['equipe_id']);
	$acampante['equipe']=mysqli_fetch_array($sql)['nome'];

	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase">

	<?php if ($acampante['conta']<=0) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Atenção: </strong><?=$acampante['nome']?> não tem saldo suficiente. Antes de realizar a compra, tenha certeza que deseja continuar.</center>
		</div>
	<?php } ?>

	<h2>Compra</h2>

	<form id="form" name="form" method="post" action="compra.php" onsubmit="return validaCampo();">
		<div class="form-group">
			<label>Nome do acampante</label>
			<input name="nome" type="text" class="form-control" value="<?=$acampante['nome']?>" disabled>
		</div>

		<div class="form-group">
			<label for="equipe">Equipe</label>
			<input type="text" name="equipe" class="form-control" value="<?=$acampante['equipe']?>" disabled>
		</div>

		<div class="form-group">
			<label for="conta">Saldo disponível</label>
			<input type="text" name="saldo" class="form-control" <?=$acampante['conta']<=0?" style='color:red';":""?>
				value="<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?>" disabled>
		</div>

		<div class="form-group">
			<label for="conta">Valor da compra</label>
			<input name="valor_compra" type="text" class="form-control" placeholder="0,00" onkeypress="return SomenteNumero(event);" onkeyup="return FormatCurrency(this)" maxlength="6">
		</div>

		<div class="form-group">
			<label for="conta">Descrição</label>
			<textarea name="descricao" class="form-control" form="form" placeholder="Insira os produtos" rows="3"></textarea>
		</div>

		<input type="hidden" name="acampante_id" value="<?=$acampante['id']?>">

		<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="acampantes.php" class="btn btn-default">Cancelar</a>
	</form>
</div>

<br><br><br><br><br><br><br><br>
<?php include_once("footer.php"); ?>
