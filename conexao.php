<?php
$con = mysqli_connect("localhost","root","") or die ("Erro na conexão");
mysqli_select_db($con, "acampantes") or die ("Banco de dados não encontrado");
?>
