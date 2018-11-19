<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Produtos</title>
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

					$sql = "select * from produtos where codigo = ".$_GET['codigo'];

					$resultado = mysqli_query($conexao, $sql);

					$linha = mysqli_fetch_assoc($resultado);

					$codigo = $linha['codigo'];
					$nome = $linha['nome'];
					$valor_compra = $linha['valor_compra'];
					$valor_venda = $linha['valor_venda'];
					$qtde_estoque = $linha['qtde_estoque'];
					$id_categoria = $linha['id_categoria'];
				}else{

				$codigo = '';
				$nome = '';
				$valor_compra = '';
				$valor_venda = '';
				$qtde_estoque = '';
				$id_categoria = '';
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
			<form class="form-horizontal" method="post" action="cadastro_produtos.php" id="formulario">
			<fieldset style="text-align: center;">

			<!-- Form Name -->
			

			<!-- Text input-->
			<div class="form-group" style="text-align: center;">
				
			  <label class="col-md-4 control-label" for="txtcodigo_produto_id">Cód. Produto : </label>  
			  <div class="col-md-2">
			  <input id="txtcodigo_produto_id" name="txtcodigo_produto_id" type="text" placeholder="Código" class="form-control input-md" readonly="true" value="<?php echo $codigo; ?>">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtproduto">Nome : </label>  
			  <div class="col-md-6">
			  <input id="txtproduto" name="txtproduto" type="text" placeholder="Descrição do Produto" class="form-control input-md" required="" value="<?php echo $nome; ?>">
			    
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtgrupo">Categoria : </label>
			  <button id="cadastro_categoria"  name="cadastro_categoria" style="margin-right: 20%;" class="btn btn-danger" onclick="javascript:location.href='cadastro_categoria.php';">Cadastro Categoria</button>
			  <div class="col-md-4">
			    <select id="txtgrupo" name="txtgrupo" class="form-control">
			      		<?php 
			      						include("mysql.php");
			      						mysqli_set_charset($conexao, "utf8");

			      						$sql = "select * from categorias";
			      						$resultado = mysqli_query($conexao, $sql);
			      						while ($linha = mysqli_fetch_assoc($resultado)){
			      							if($id_categoria == $linha['codigo']){
			      								echo "<option value=".$linha['codigo']." selected>".$linha['nome']."</option>";
			      							}
			      							else {
			      								echo "<option value=".$linha['codigo'].">".$linha['nome']."</option>";
			      							}
			      						}
			      					 ?>
			    </select>
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtcodigo_unidade_id">Quantidade em estoque : </label>
			  <div class="col-md-4">
			   		<input type="text" name="qtde_estoque" class="form-control input-md" value="<?php echo $qtde_estoque; ?>">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_minimo">Valor de compra : </label>  
			  <div class="col-md-2">
			  <input id="valor_compra" name="valor_compra" type="text" placeholder="" class="form-control input-md" required=""
			  value="<?php echo $valor_compra; ?>">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_atual">Preço de venda : </label>  
			  <div class="col-md-2">
			  <input id="valor_venda" name="valor_venda" type="text" placeholder="" class="form-control input-md" value=<?php echo $valor_venda; ?>>
			    
			  </div>
			</div>

	

				<div class="form-group" style="margin-right: 40%" >
  <label class="col-md-4 control-label" for="btnsalvar"></label>
  <div class="col-md-8">
    <button id="btnsalvar" name="btnsalvar" class="btn btn-primary">Gravar</button>
     <button id="cancelar" name="cancelar" class="btn btn-danger" onclick="javascript:location.href='listar_produtos.php';">Cancelar</button>
  </div>
</div>

			</fieldset>

			<?php 
				if (isset($_POST['btnsalvar'])) {				


					if ($_POST['txtcodigo_produto_id'] == 0 ) {

					$sql = "insert into produtos values (0,'".$_POST['txtproduto']."', '".$_POST['txtgrupo']."',".$_POST['qtde_estoque'].",".$_POST['valor_compra'].", ".$_POST['valor_venda'].")";
					
					
					$resultado = mysqli_query($conexao, $sql);
					//header("location: listar_produtos.php");
					
					}else {
						$sql = "update produtos
										set nome = '".$_POST['txtproduto']."', 
										valor_compra = ".$_POST['valor_compra'].",
										valor_venda = ".$_POST['valor_venda'].",
										qtde_estoque = ".$_POST['qtde_estoque'].",
										id_categoria = ".$_POST['txtgrupo']." 
										where codigo = ".$_POST['txtcodigo_produto_id'];		
								
							mysqli_query($conexao, $sql);
							//header("location: listar_produtos.php");
					}
					//header("location: listar_produtos.php");
					//echo "<script>window.location.href='listar_produtos.php'</script>";
				}



			?>

			</form>





		</div>

	

</body>
</html>