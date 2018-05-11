<?php
    include_once("conexao.php");

    $nome = $_POST["nome"];
    $equipe_id = $_POST["equipe_id"];
    $conta = $_POST["conta"];
    $conta = str_replace(',', '', str_replace(',','.',$conta));

    if (isset($_POST["acampante_id"])) {
        $acampante_id = $_POST["acampante_id"];

        $res=mysqli_query($con, "SELECT conta, saldo FROM acampantes WHERE id=$acampante_id");
		$acampante=mysqli_fetch_array($res);

		// o saldo muda conforme a conta for alterada
		$saldo = $conta - $acampante["conta"] + $acampante["saldo"];

        mysqli_query($con, "UPDATE acampantes SET nome='$nome', equipe_id='$equipe_id', conta='$conta', saldo='$saldo' WHERE id=$acampante_id");

        if (mysqli_affected_rows($con) < 0) {
            header("location:form_acampante.php?id=$acampante_id&error");
        } else {
            header("location:acampantes.php?success");
        }
    } else {
        $saldo = $conta;
        mysqli_query($con, "INSERT INTO acampantes (nome, equipe_id, conta, saldo) VALUES ('$nome', '$equipe_id', '$conta', '$saldo')");
        if (mysqli_affected_rows($con) < 0) {
            header("location:form_acampante.php?nome=$nome&equipe_id=$equipe_id&conta=$conta&error");
        } else {
            header("location:acampantes.php?success");
        }

    }

?>
