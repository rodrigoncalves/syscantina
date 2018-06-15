<?php
	include_once("conexao.php");
	include_once("header.php");

	$res=mysqli_query($con, "SELECT SUM(conta) FROM acampantes");
	$total_arrecadado=mysqli_fetch_array($res)[0];
	$res=mysqli_query($con, "SELECT SUM(saldo) FROM acampantes WHERE quitado=0");
	$total_quitar=mysqli_fetch_array($res)[0];
	$res=mysqli_query($con, "SELECT SUM(saldo) FROM acampantes WHERE quitado=1");
	$total_quitado=mysqli_fetch_array($res)[0];
	$res=mysqli_query($con, "SELECT SUM(valor_compra) FROM historico");
	$total_vendas=mysqli_fetch_array($res)[0];
	$total_caixa = $total_arrecadado - $total_quitado;
?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-6">
				<h1>Relatório</h1>
			</div>
			<div class="col-sm-6 text-right h2">
				<a class="btn btn-default" href="relatorio.php"><i class="fa fa-refresh"></i> Atualizar</a>
			</div>
		</div>
		<h4><b>Valores para conferência</b></h4>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-bordered responsive-table">
				<tbody>
					<tr>
						<th style="text-align: center">Total arrecadado:</th>
						<th style="text-align: center"><?='R$ '.number_format($total_arrecadado, 2, ',', '.')?></th>
					</tr>
					<tr>
						<th style="text-align: center">Total a quitar:</th>
						<th style="text-align: center"><?='R$ '.number_format($total_quitar, 2, ',', '.')?></th>
					</tr>
					<tr>
						<th style="text-align: center">Total a quitado:</th>
						<th style="text-align: center"><?='R$ '.number_format($total_quitado, 2, ',', '.')?></th>
					</tr>
					<tr>
						<th style="text-align: center">Total de vendas:</th>
						<th style="text-align: center"><?='R$ '.number_format($total_vendas, 2, ',', '.')?></th>
					</tr>
					<tr class="active">
						<th style="text-align: center">Total em caixa:</th>
						<th style="text-align: center"><?='R$ '.number_format($total_caixa, 2, ',', '.')?></th>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
