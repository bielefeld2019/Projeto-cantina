<!DOCTYPE html>
<html>
<head>
	<title>MENU | SGC</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos/estilos.css">



</head>
<body>

	<?php
		include("mysql.php");
		mysqli_set_charset($conexao, "utf8");

		session_start();

		if (isset($_SESSION['logado']) == false){
			//die('Conteúdo restrito!!!');
			echo "<script>alert('Impossível acessar esta página. Conteúdo restrito!')</script>";
			//header("location: home.php");
			echo "<script>window.location.href='home.php'</script>";
		}


	 ?>

	<a href="logout.php"><h1 style="font-size: 20px; margin-left: 90%; margin-bottom: -20px;">Logout</h1></a>
	<h1 class="text-center" style="font-family: 'Cabin Sketch', cursive; font-size: 100px;">MENU</h1>
		
		<div class="container">
		<div class="row">
		
		<!--team-1-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="vendas.php">
		<div class="team-front">
		<img src="imagens/venda.jpg" class="img-fluid" />
		<h3>Vendas</h3>
		<p>Registre aqui suas vendas</p>
		</div>
		
		<div class="team-back">
		<span>
		Registre aqui as vendas do seu estabelecimento
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-1-->
		
		<!--team-2-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="cadastro_produtos.php">
		<div class="team-front">
		<img src="imagens/cadastro_produtos.png" class="img-fluid" />
		<h3>Cadastro de Produtos</h3>
		<p>Cadastre aqui seus produtos</p>
		</div>
		
		<div class="team-back">
		<span>
		Cadastre aqui os produtos do seu estabelecimento 
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-2-->
		
		<!--team-3-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="cadastrar_clientes.php">
		<div class="team-front">
		<img src="imagens/cliente.png" class="img-fluid" />
		<h3>Clientes</h3>
		<p>Gerencie seus clientes aqui</p>
		</div>
		
		<div class="team-back">
		<span>
		Gerencie aqui os clientes do seu estabelecimento
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-3-->
		
		<!--team-4-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="lucro.php">
		<div class="team-front">
		<img src="imagens/lucro.png" class="img-fluid" />
		<h3>Lucro</h3>
		<p>Gerencie o lucro do seu estabelecimento</p>
		</div>
		
		<div class="team-back">
		<span>
		Veja aqui o lucro do seu estabelecimento
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-4-->
		
		<!--team-5-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="listar_produtos.php">
		<div class="team-front">
		<img src="imagens/produto.png" class="img-fluid" />
		<h3>Produtos</h3>
		<p>Gerencie aqui seus produtos</p>
		</div>
		
		<div class="team-back">
		<span>
		Veja aqui os produtos do seu estabelecimento
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-5-->
		
		<!--team-6-->
		<div class="col-lg-4">
		<div class="our-team-main">
		<a href="cadastro_funcionarios.php">
		<div class="team-front">
		<img src="imagens/funcionario.png" class="img-fluid" />
		<h3>Funcionários</h3>
		<p>Gerencie aqui seus funcionários</p>
		</div>
		
		<div class="team-back">
		<span>
		Veja aqui seus funcionários e o número de vendas de cada funcionário
		</span>
		</div>
		</a>
		</div>
		</div>
		<!--team-6-->
		
		
		
		</div>
		</div>


</body>
</html>