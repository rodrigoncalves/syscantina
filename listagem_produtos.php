<?php
	session_start();
	//include_once("seguranca.php");
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Cesar">
    <link rel="icon" href="imagens/favicon.ico">

    <title>Listagem de Produtos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
 </head>
	<body role="document">
<?php
	$resultado=mysql_query("SELECT * FROM produtos ORDER BY descricao");
	$linhas=mysql_num_rows($resultado);
?>
	<?php
		include_once("menu_admin.php");
	?>	
<div class="container theme-showcase" role="main">      
      <div class="page-header">
        <h1>Lista de Produtos</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>            
                <th>Descri&ccedil;&atilde;o</th>
                <th>Valor</th>                
				<th>A&ccedil;&otilde;es</th>
              </tr>
            </thead>
            <tbody>
				<?php 
					while($linhas = mysql_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas['descricao']."</td>";
							echo "<td>R$".$linhas['valor']."</td>";
							echo "<td>Editar - Visualizar - Apagar</td>";
						echo "</tr>";
					}
				?>
            </tbody>
          </table>
        </div>
		</div>
    </div>
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