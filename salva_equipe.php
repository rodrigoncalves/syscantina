<?php
    include_once("conexao.php");

    $nome = $_POST["nome"];
    $equipe_id = $_POST["equipe_id"];

    if (isset($equipe_id)) {
        mysqli_query($con, "UPDATE equipes SET nome='$nome' WHERE id=$equipe_id");

        if (mysqli_affected_rows($con) < 0) {
            header("location:editando_equipe.php?id=$equipe_id&error");
        } else {
            header("location:equipes.php?success");
        }
    } else {
        mysqli_query($con, "INSERT INTO equipes VALUES ($nome)");
        if (mysqli_affected_rows($con) < 0) {
            header("location:cadastrando_equipe.php?nome=$nome&error");
        } else {
            header("location:equipes.php?success");
        }

    }

?>
