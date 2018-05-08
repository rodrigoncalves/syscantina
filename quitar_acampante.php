<?php
    include_once("conexao.php");
    $id=$_GET["id"];
    $res=mysqli_query($con, "SELECT * FROM acampantes WHERE id=$id");
    $acampante=mysqli_fetch_array($res);

    $quitado = ($acampante['quitado']+1)%2;
    mysqli_query($con, "UPDATE acampantes SET quitado=$quitado WHERE id=$id");

    echo "<script>";
    if (mysqli_affected_rows($con) > 0) {
        echo "window.location.replace('acampantes.php')";
    } else {
        echo "window.location.replace('acampantes.php?error')";
    }

    echo "</script>";
?>
