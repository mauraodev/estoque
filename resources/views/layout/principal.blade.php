<html>
<head>
    <title>Controle de estoque</title>
    <link href="{{ asset("/css/app.css") }}" rel="stylesheet">
    <link href="{{ asset("/css/custom.css") }}" rel="stylesheet">
</head>
<body>
   <div class="container">

	  	<nav class="navbar navbar-default">
	    	<div class="container-fluid">

	    		<div class="navbar-header">
	      			<a class="navbar-brand" href="{{ url('/produtos') }}">Estoque Laravel</a>
	    		</div>

	      		<ul class="nav navbar-nav navbar-right">
	        		<li><a href="{{ url('produtos') }}">Listagem</a></li>
	        		<li><a href="{{ url('/produtos/novo') }}">Novo</a></li>
	      		</ul>
	    	</div>
	  	</nav>

    	@yield('conteudo')

		<footer class="footer">
      		<p>© Livro de Laravel do Alura.</p>
  		</footer>
  	</div>
</body>
</html>
