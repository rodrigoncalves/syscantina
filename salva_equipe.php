<?php
	include_once("conexao.php");

	$nome = $_POST["nome"];
	if (isset($_POST["equipe_id"])) {
		$equipe_id = $_POST["equipe_id"];
		mysqli_query($con, "UPDATE equipes SET nome='$nome' WHERE id=$equipe_id");

		if (mysqli_affected_rows($con) < 0) {
			header("location:form_equipe.php?id=$equipe_id&error");
		} else {
			header("location:equipes.php?success");
		}
	} else {
		mysqli_query($con, "INSERT INTO equipes (nome) VALUES ('$nome')");
		if (mysqli_affected_rows($con) < 0) {
			header("location:form_equipe.php?nome=$nome&error");
		} else {
			header("location:equipes.php?success");
		}

	}

?>
