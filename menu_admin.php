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
				<li <?=strpos($_SERVER["REQUEST_URI"], "index.php")
					!==false?'class="active"':""?>><a href="index.php">Início</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "acampantes.php")
					|| strpos($_SERVER["REQUEST_URI"], "form_acampante.php")
					|| strpos($_SERVER["REQUEST_URI"], "form_compra.php?id")
					!==false?'class="active"':""?>><a href="acampantes.php">Acampantes</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "equipes.php")
					|| strpos($_SERVER["REQUEST_URI"], "form_equipe.php")
					|| strpos($_SERVER["REQUEST_URI"], "ver_equipe.php")
					!==false?'class="active"':""?>><a href="equipes.php">Equipes</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "historico.php")
					|| strpos($_SERVER["REQUEST_URI"], "form_compra.php?acampante_id")
					!==false?'class="active"':""?>><a href="historico.php">Histórico</a></li>
				<li <?=strpos($_SERVER["REQUEST_URI"], "relatorio.php")
					!==false?'class="active"':""?>><a href="relatorio.php">Relatório</a></li>
			</ul>
		</div>
	</div>
</nav>
<!-- Fim navbar -->
