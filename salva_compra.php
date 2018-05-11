<?php
	include_once("conexao.php");

	$acampante_id = $_POST["acampante_id"];
	$valor_compra = $_POST["valor_compra"];
	$descricao = $_POST["descricao"];

	$res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$acampante_id");
	$acampante=mysqli_fetch_array($res);
	$valor_compra = str_replace(',', '', str_replace(',','.',$valor_compra));

	if (isset($_POST["compra_id"])) {
		$compra_id = $_POST["compra_id"];

		$res=mysqli_query($con, "SELECT * FROM historico WHERE id=$compra_id");
		$compra=mysqli_fetch_array($res);

		$valor_antigo = $compra["valor_compra"];
		$novo_saldo = $acampante["saldo"] + ($valor_antigo - $valor_compra);

		mysqli_query($con, "UPDATE historico SET acampante_id=$acampante_id, valor_compra=$valor_compra, descricao='$descricao' WHERE id=$compra_id");

		if (mysqli_affected_rows($con) >= 0) {
			mysqli_query($con, "UPDATE acampantes SET saldo=$novo_saldo WHERE id=".$compra['acampante_id']);
		}

		if (mysqli_affected_rows($con) < 0) {
			header("location:form_compra.php?acampante_id=$acampante_id&compra_id=$compra_id&error");
		} else {
			header("location:historico.php?id=$acampante_id&success");
		}
	} else {
		$novo_saldo = $acampante["saldo"] - $valor_compra;

		mysqli_query($con, "INSERT INTO historico (acampante_id, valor_compra, descricao) VALUES ('$acampante_id', '$valor_compra', '$descricao')");

		if (mysqli_affected_rows($con) >= 0) {
			mysqli_query($con, "UPDATE acampantes SET saldo=$novo_saldo WHERE id=$acampante_id");
		}

		if (mysqli_affected_rows($con) < 0) {
			header("location:form_compra.php?id=$acampante_id&valor_compra=$valor_compra&descricao=$descricao&error");
		} else {
			header("location:historico.php?id=$acampante_id&success");
		}
	}
?>
