<?php
	include_once("conexao.php");
	include_once("header.php");

	$sql=mysql_query("SELECT * FROM acampantes WHERE id=".$_GET["acampante_id"]);
	$acampante=mysql_fetch_array($sql);

	$sql=mysql_query("SELECT * FROM historico WHERE id=".$_GET["compra_id"]);
	$compra=mysql_fetch_array($sql);

	setlocale(LC_MONETARY, "pt_BR", "ptb");
?>

<div class="container theme-showcase">

	<?php if (isset($_GET["error"])) { ?>
		<div class="alert alert-danger" role="alert">
			<center><strong>Erro</strong> ao editar compra no banco de dados!</center>
		</div>
	<?php } ?>

	<h2>Editar compra</h2>

	<form id="form" name="form" method="post" action="edita_historico.php" onsubmit="return validaCampo();">
		<div class="form-group">
			<label>Nome do acampante</label>
			<input name="nome" type="text" class="form-control" value="<?=$acampante['nome']?>" disabled>
		</div>

		<div class="form-group">
			<label for="equipe">Equipe</label>
			<input type="text" name="equipe" class="form-control" value="<?=$acampante['equipe']?>" disabled>
		</div>

		<div class="form-group">
			<label for="conta">Saldo dispon&iacute;vel</label>
			<input type="text" class="form-control" <?=$acampante['conta']<=0?" style='color:red';":""?>
				value="<?='R$ '.number_format($acampante['conta'], 2, ',', '.')?>" disabled>
		</div>

		<div class="form-group">
			<label for="conta">Valor da compra</label>
			<input name="valor_compra" type="text" class="form-control" placeholder="0.00" onkeypress="return SomenteNumero(event);" maxlength="6" onkeyup="return FormatCurrency(this)" value=<?=number_format($compra['valor_compra'], 2, ',', '.')?>>
		</div>

		<div class="form-group">
			<label for="conta">Descrição</label>
			<textarea name="descricao" class="form-control" rows="3" maxlength="255"><?=$compra['descricao']?></textarea>
		</div>

		<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="historico.php" class="btn btn-default">Cancelar</a>

		<input type="hidden" name="acampante_id" value="<?=$_GET['acampante_id']?>">
		<input type="hidden" name="compra_id" value="<?=$_GET['compra_id']?>">

		</div>
	</form>

</div>
