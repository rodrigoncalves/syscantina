<?php
    include_once("conexao.php");
    $acampante_id=$_GET["acampante_id"];
    $equipe_id=$_GET["equipe_id"];
    $source=$_GET["source"];

    $res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$acampante_id");
    $acampante=mysqli_fetch_array($res);

    $quitado = ($acampante['quitado']+1)%2;
    mysqli_query($con, "UPDATE acampantes SET quitado=$quitado WHERE id=$acampante_id");

    echo "<script>";
    if (mysqli_affected_rows($con) > 0) {
        echo "window.location.replace('$source?id=$equipe_id')";
    } else {
        echo "window.location.replace('$source?id=$equipe_id&error')";
    }

    echo "</script>";
?>
