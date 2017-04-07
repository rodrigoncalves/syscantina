<?php
	session_start();
	//include_once("seguranca.php");
	//include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cadastrando">
    <meta name="author" content="FD">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Cadastro de Produtos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
	
	<script type="text/javascript">
function validaCampo()
{
if(document.cadastro_produtos.desc_prd.value=="")
	{
	alert("O Campo 'Descrição' é obrigatório!");
	return false;
	}

else
	if(document.cadastro_produtos.vlr_prd.value=="")
	{
	alert("O Campo 'Valor do Produto' é obrigatório!");
	return false;
	}
else
return true;
}

function SomenteNumero(e){
 var tecla=(window.event)?event.keyCode:e.which;
 if((tecla>47 && tecla<58)) return true;
 else{
 if (tecla==8 || tecla==0) return true;
 else  return false;
 }
}

function redirecionar(){
	//alert("Clique em 'OK' para continuar!");
	window.location="listagem.php";
}

<!-- Fim do JavaScript que validará os campos obrigatórios! -->
</script>
 </head>
	<body role="document">
	<?php
		include_once("menu_admin.php");
	?>	
<div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Cadastrar Produtos</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
		
		<form id="cadastro_produtos" name="cadastro_produtos" method="post" action="cadastro_produtos.php" onsubmit="return validaCampo(); return false;">
			<div class="form-group">
				<label for="desc">Descrição do Produto</label><span style='color:red;'>*</span>
				<input name="desc_prd" type="text" class="form-control" id="desc_prd" placeholder="Informe a descrição do produto" maxlength="60">
			</div>
					
			<div class="form-group">
				<label for="vlr">Valor do produto</label><span style='color:red;'>*</span>
				<input name="vlr_prd" type="text" class="form-control" id="vlr_prd" placeholder="Informe o valor do produto R$" onkeypress="return SomenteNumero(event);" maxlength="6">
			</div>
			<button type="submit" class="btn btn-default">Enviar</button> <button name="limpar" type="reset" id="limpar" class="btn btn-default">Limpar Campos preenchidos!</button>
			
			<tr>
      <td colspan="2"><p>		 
          		  
          <span class="style1" style='color:red'> Campos com * são obrigatórios!          </span></p>
      </td>
    </tr>
		</form>
		
		
		
        </div>
		</div>
    </div>
	<br><br><br><br><br><br><br><br><br><br><br>
	<?php
		//include_once("menu_admin.php");
		include_once("footer.php");
	?>	
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