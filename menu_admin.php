<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?=strpos($_SERVER["REQUEST_URI"], "administrativo.php")!==false?'class="active"':""?>><a href="index.php">Início</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "listagem.php")!==false?'class="active"':""?>><a href="listagem.php">Acampantes</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "historico.php")!==false?'class="active"':""?>><a href="historico.php">Histórico</a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- Fim navbar -->
