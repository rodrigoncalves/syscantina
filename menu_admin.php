<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button id="nav-btn" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?=strpos($_SERVER["REQUEST_URI"], "index.php")!==false?'class="active"':""?>><a href="index.php">Início</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "listagem.php")
					|| strpos($_SERVER["REQUEST_URI"], "editando.php")
					|| strpos($_SERVER["REQUEST_URI"], "cadastrando.php")
					|| strpos($_SERVER["REQUEST_URI"], "comprando.php") !== false?'class="active"':""?>><a href="listagem.php">Acampantes</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "historico.php")!==false?'class="active"':""?>><a href="historico.php">Histórico</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- Fim navbar -->
