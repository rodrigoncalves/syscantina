<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="P�gina Administrativa">
    <meta name="author" content="FD">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>-->
<script type="text/javascript">
function redirecionar(){
	//alert("Clique em 'OK' para continuar!");
	window.location="cadastrando_produtos.php";
}
function redirecionar2(){
	//alert("Clique em 'OK' para continuar!");
	window.location="administrativo.php";
}
</script>
</head>

<body>
<?php
		include_once("menu_admin.php");
	?>	
<?php 
// RECEBENDO OS DADOS PREENCHIDOS DO FORMUL�RIO !
$desc	= $_POST ["desc_prd"];	//atribui��o do campo "nome" vindo do formul�rio para variavel	
//$email	= $_POST ["email"];	//atribui��o do campo "email" vindo do formul�rio para variavel
//$ddd	= $_POST ["ddd"];	//atribui��o do campo "ddd" vindo do formul�rio para variavel
$vlr	= $_POST ["vlr_prd"];	//atribui��o do campo "conta" vindo do formul�rio para variavel
//$endereco	= $_POST ["endereco"];	//atribui��o do campo "endereco" vindo do formul�rio para variavel
//$cidade	= $_POST ["cidade"];	//atribui��o do campo "cidade" vindo do formul�rio para variavel
//$equipe	= $_POST ["equipe"];	//atribui��o do campo "equipe" vindo do formul�rio para variavel
//$bairro = $_POST ["bairro"];	//atribui��o do campo "bairro" vindo do formul�rio para variavel
//$pais	= $_POST ["pais"];	//atribui��o do campo "pais" vindo do formul�rio para variavel
//$login	= $_POST ["login"];	//atribui��o do campo "login" vindo do formul�rio para variavel
//$senha	= $_POST ["senha"];	//atribui��o do campo "senha" vindo do formul�rio para variavel
//$news	= $_POST ["news"];	//atribui��o do campo "news" vindo do formul�rio para variavel
//$sexo	= $_POST ["sexo"];	//atribui��o do campo "sexo" vindo do formul�rio para variavel
//Gravando no banco de dados !

//conectando com o localhost - mysql
$conexao = mysql_connect("localhost","root","root");
if (!$conexao)
	die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
//conectando com a tabela do banco de dados
$banco = mysql_select_db("acampantes",$conexao);
if (!$banco)
	die ("Erro de conex�o com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
$query = "INSERT INTO `produtos` ( `descricao` ,`valor` , `id` ) 
VALUES ('$desc', '$vlr','')";
mysql_query($query,$conexao);
 

//echo "Seu cadastro foi realizado com sucesso!<br>Obrigado! =)";

?> 

	<div class="alert alert-success" role="alert">
		<center><strong>Sucesso!</strong> Opera&ccedil;&atilde;o realizada com sucesso!</center>
	</div>
<center><button class="btn btn-default" onclick="redirecionar();">Cadastrar novo produto</button>  <button class="btn btn-default" onclick="redirecionar2();">Voltar para P&aacute;gina Inicial</button></center>
</body>
</html>
