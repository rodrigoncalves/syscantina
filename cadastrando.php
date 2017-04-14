<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Cadastrando">
	<meta name="author" content="Cesar">
	<link rel="icon" href="imagens/favicon.ico">

	<title>Cadastro de Acampantes</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/theme.css" rel="stylesheet">
	<script src="js/ie-emulation-modes-warning.js"></script>

	<script type="text/javascript">
		function validaCampo() {
			if (document.cadastro.nome.value == "") {
				alert("O Campo 'Nome do Acampante' é obrigatório!");
				return false;
			}

			if (document.cadastro.equipe.value == 'Selecione...') {
				alert("O Campo Equipe é obrigatório!");
				return false;
			}

			if (document.cadastro.conta.value == "") {
				alert("O Campo 'Valor a ser depositado' é obrigatório!");
				return false;
			}

			return true;
		}

		function SomenteNumero(e) {
		 	var tecla = window.event ? event.keyCode : e.which;

			if ((tecla > 47 && tecla < 58)) {
				return true;
			}

			if (tecla == 8 || tecla == 0) {
				return true;
			}

			return false;
		}

		function redirecionar() {
			window.location="listagem.php";
		}

	</script>
	<!-- Fim do JavaScript que validará os campos obrigatórios! -->

</head>
<body role="document">
	<?php include_once("menu_admin.php"); ?>
	<?php
		$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
		$equipe = isset($_GET["equipe"]) ? $_GET["equipe"] : "";
		$conta = isset($_GET["conta"]) ? $_GET["conta"] : "";
	?>

	<div class="container theme-showcase" role="main">
		<?php if (isset($_GET["error"])) { ?>
			<div class="alert alert-danger" role="alert">
				<center><strong>Erro</strong> ao salvar acampante no banco de dados!</center>
			</div>
		<?php } ?>

		<div class="page-header">
			<h1>Cadastrar Acampante</h1>
		</div>
		<div class="row">
			<div class="col-md-12">
				<form id="cadastro" name="cadastro" method="post" action="cadastro.php" onsubmit="return validaCampo(); return false;">
					<div class="form-group">
						<label for="nome">Nome do Acampante</label><span style='color:red;'>*</span>
						<input name="nome" type="text" class="form-control" id="nome" placeholder="Insira o nome do Acampante" maxlength="60" value="<?=$nome?>">
					</div>
					<div class="form-group">
						<label for="equipe">Equipe</label><span style='color:red;'>*</span>
						<select class="form-control" name="equipe" id="equipe">
							<option>Selecione...</option>
							<option<?=$equipe=="Adoratubers"?" selected":""?>>Adoratubers</option>
							<option<?=$equipe=="Kidscípulos"?" selected":""?>>Kidscípulos</option>
							<option<?=$equipe=="Discitubers"?" selected":""?>>Discitubers</option>
							<option<?=$equipe=="Youdiscípulos"?" selected":""?>>Youdiscípulos</option>
							<option<?=$equipe=="Discipuloucos por Cristo"?" selected":""?>>Discipuloucos por Cristo</option>
							<option<?=$equipe=="Likes para Jesus"?" selected":""?>>Likes para Jesus</option>
							<option<?=$equipe=="Discipulindas"?" selected":""?>>Discipulindas</option>
							<option<?=$equipe=="VEVO em Cristo"?" selected":""?>>VEVO em Cristo</option>
							<option<?=$equipe=="Loukinhas por Jesus"?" selected":""?>>Loukinhas por Jesus</option>
							<option<?=$equipe=="GraceTube"?" selected":""?>>GraceTube</option>
						</select>
					</div>
					<div class="form-group">
						<label for="conta">Valor a ser depositado</label><span style='color:red;'>*</span>
						<input name="conta" type="text" class="form-control" id="conta" placeholder="0.00" maxlength="6" value="<?=$conta?>">
					</div>

					<button type="submit" class="btn btn-primary">Salvar</button>
					<a href="listagem.php" class="btn btn-default">Cancelar</a>
				</form>
			</div>
		</div>
	</div>

	<br><br><br><br><br><br><br><br>
	<?php include_once("footer.php"); ?>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/docs.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>

</body>

</html>
