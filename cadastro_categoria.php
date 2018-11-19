<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Categoria</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos/estilos_cad_produtos.css">

	<style type="text/css">
			body{
				font-family: Arial;
				background-color: #fff;
				color: black;

			}

			

			.conteudo{
				margin-left: 15%;
				margin-top: 20px;

			}

			.menu{
				height: 100%;
				width: 190px;
				position: fixed;
				top:0;
				left:0;
				background-color: #3366FF;
			}

			.menu a{
				color: white;
				padding: 10px;
				text-decoration: none;
				display: block;

			}

			.menu a:hover{
				background-color: white;
				color: black;
			}

			.botao_acao{
				background-color: black;
				border: none;
				color: white;
				padding: 5px 10px;
				display: inline-block;
				text-align: center;
				font-size: 14px;
				margin: 1px 1px;
				cursor: pointer;
			}
	</style>

</head>
<body>

		<?php 
			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");


					include("mysql.php");
					mysqli_set_charset($conexao, "utf8");

					session_start();

					if (isset($_SESSION['logado']) == false){
						//die('Conteúdo restrito!!!');
						echo "<script>alert('Impossível acessar esta página. Conteúdo restrito!')</script>";
						//header("location: home.php");
						echo "<script>window.location.href='home.php'</script>";
					}


				


				if (isset($_GET['codigo'])){

					$sql = "select * from categorias where codigo = ".$_GET['codigo'];

					$resultado = mysqli_query($conexao, $sql);

					$linha = mysqli_fetch_assoc($resultado);

					$codigo = $linha['codigo'];
					$nome = $linha['nome'];
					
				}else{

				$codigo = '';
				$nome = '';
				
			}

		?>

		<div class="menu">
			<h1 style="color: white; margin-left: 5%;">Menu</h1>
				<a href="administrador.php">Início</a>
				<a href="vendas.php">Vendas</a>
				<a href="listar_produtos.php">Produtos</a>
				<a href="cadastrar_clientes.php">Clientes</a>
				<a href="cadastro_funcionarios.php">Funcionários</a>
			</div>

		<div class="conteudo">
			
			<h1 style="text-align: center;"><strong>Cadastro de Produtos</strong></h1>
			<br>
			<form class="form-horizontal" method="post" action="cadastro_categoria.php" id="formulario">
			<fieldset style="text-align: center;">

			<!-- Form Name -->
			

			<!-- Text input-->
			<div class="form-group" style="text-align: center;">
				
			  <label class="col-md-4 control-label" for="txtcodigo_categoria_id">Cód. Produto : </label>  
			  <div class="col-md-2">
			  <input id="txtcodigo_categoria_id" name="txtcodigo_categoria_id" type="text" placeholder="" class="form-control input-md" readonly="true" value="<?php echo $codigo; ?>">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtproduto">Nome : </label>  
			  <div class="col-md-6">
			  <input id="txtcategoria" name="txtcategoria" type="text" placeholder="Nome da Categoria" class="form-control input-md" required="" value="<?php echo $nome; ?>">
			    
			  </div>
			</div>

			
			    <input type="submit" id="btnsalvar"  name="btnsalvar" class="btn btn-primary" value="Gravar">
			    
			    <button id="cancelar" name="cancelar"  class="btn btn-danger" onclick="javascript:location.href='cadastrar_produtos.php';">Cancelar</button>
			  </div>
			</div>

			</fieldset>

			<?php 
				if (isset($_POST['btnsalvar'])) {

				


					if ($_POST['txtcodigo_categoria_id'] == 0 ) {

					$sql = "insert into categorias values (0,'".$_POST['txtcategoria']."')";
					

					
					$resultado = mysqli_query($conexao, $sql);
					
					
					}else {
						$sql = "update categorias
										set nome = '".$_POST['txtcategoria']."', 
										
										where codigo = ".$_POST['txtcodigo_categoria_id'];		
								
							mysqli_query($conexao, $sql);
							
					}
					header("location: cadastro_produtos.php");
					echo "<script>window.location.href='cadastro_produtos.php'</script>";
				}



			?>

			</form>





		</div>

	

</body>
</html>