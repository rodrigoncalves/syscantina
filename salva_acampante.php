<?php
    include_once("conexao.php");

    $nome = $_POST["nome"];
    $equipe_id = $_POST["equipe_id"];
    $conta = $_POST["conta"];
    if (isset($_POST["acampante_id"])) {
        $acampante_id = $_POST["acampante_id"];
        $sql="UPDATE acampantes SET nome='$nome', equipe_id='$equipe_id', conta='$conta' WHERE id=$acampante_id";
        mysqli_query($con, $sql);

        if (mysqli_affected_rows($con) < 0) {
            header("location:form_acampante.php?id=$acampante_id&error");
        } else {
            header("location:acampantes.php?success");
        }
    } else {
        mysqli_query($con, "INSERT INTO acampantes (nome, equipe_id, conta) VALUES ('$nome', '$equipe_id', '$conta')");
        if (mysqli_affected_rows($con) < 0) {
            header("location:form_acampante.php?nome=$nome&equipe_id=$equipe_id&conta=$conta&error");
        } else {
            header("location:acampantes.php?success");
        }

    }

?>
