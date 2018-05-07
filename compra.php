<?php
	include_once("conexao.php");

	$valor_compra = $_POST["valor_compra"];
	$acampante_id = $_POST["acampante_id"];
	$descricao = $_POST["descricao"];

	$valor_compra = str_replace(',', '', str_replace(',','.',$valor_compra));

	$sql=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysqli_fetch_array($sql);

	$novo_saldo = $acampante["conta"] - $valor_compra;

	mysqli_query($con, "UPDATE acampantes SET conta=$novo_saldo WHERE id=$acampante_id");
	mysqli_query($con, "INSERT INTO historico (acampante_id, valor_compra, descricao) VALUES ('$acampante_id', '$valor_compra', '$descricao')");

	if (mysqli_affected_rows($con) < 0) {
		header("location:comprando.php?nome=<?=$nome?>&equipe=<?=$equipe?>&saldo=<?=$saldo?>&valor_compra=<?=$valor_compra?>&descricao=<?=$descricao?>&error");
	} else {
		header("location:listagem.php?success");
	}
?>
