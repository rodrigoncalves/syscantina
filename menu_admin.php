
    <!-- Inicio navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <!-- <a class="navbar-brand" href="administrativo">Pagina Administrativa</a>-->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="administrativo.php">Início</a></li>
            <!--<li><a href="#about">About</a></li>-->
            <!--<li><a href="#contact">Contact</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
			  <li class="dropdown-header">Acampantes</li>
                <li><a href="cadastrando.php">Cadastro de acampantes</a></li>
                <li><a href="listagem.php">Listagem de acampantes</a></li>
				<li role="separator" class="divider"></li>
				<li class="dropdown-header">Produtos</li>
                <li><a href="cadastrando_produtos.php">Cadastro de Produtos</a></li>
				<li><a href="listagem_produtos.php">Listagem de Produtos</a></li>
              <!--<li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>-->
              </ul>
            </li>
			<li><a href="byebye.php">Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<!-- Fim navbar -->
