<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Funcionários</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos/estilos_cad_produtos.css">

	<style type="text/css">
			body{
				font-family: Arial;
				
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
			include("funcoes.php");


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

					$sql = "select * from funcionarios where codigo = ".$_GET['codigo'];

					$resultado = mysqli_query($conexao, $sql);

					$linha = mysqli_fetch_assoc($resultado);

					$codigo = $linha['codigo'];
					$nome = $linha['nome'];
					$data_nascimento =  date('d/m/Y', strtotime($linha['data_nascimento']));
					$data_contratacao = date('d/m/Y', strtotime($linha['data_contratacao']));
					$cpf = $linha['cpf'];
					$celular = $linha['celular'];
					$id_funcao = $linha['id_funcao'];
					$login = $linha['login'];
					$senha = $linha['senha'];
				}else{

				$codigo = '';
				$nome = '';
				$data_nascimento = '';
				$data_contratacao = '';
				$cpf = '';
				$celular = '';
				$id_funcao ='';
				$login = '';
				$senha = '';
			}

		?>

		<div class="menu">
			<h1 style="color: white; margin-left: 5%;">Menu</h1>
				<a href="administrador.php">Início</a>
				<a href="vendas.php">Vendas</a>
				<a href="listar_produtos.php">Produtos</a>
				<a href="cadastrar_clientes.php">Clientes</a>
				<a href="listar_funcionarios.php">Funcionários</a>
			</div>

		<div class="conteudo">
			
			<h1 style="text-align: center;"><strong>Cadastro de Funcionários</strong></h1>
			<br>
			<form class="form-horizontal" method="post" action="cadastro_funcionarios.php" id="formulario">
			<fieldset style="text-align: center;">

			<!-- Form Name -->
			

			<!-- Text input-->
			<div class="form-group" style="text-align: center;">
				
			  <label class="col-md-4 control-label" for="txtcodigo_produto_id">Cód. Funcionário : </label>  
			  <div class="col-md-2">
			  <input id="txtcodigo_funcionario_id" name="txtcodigo_funcionario_id" type="text" placeholder="Código" class="form-control input-md" readonly="true" value="<?php echo $codigo; ?>">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtproduto">Nome : </label>  
			  <div class="col-md-6">
			  <input id="txtnome" name="txtnome" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $nome; ?>">
			    
			  </div>
			</div>

			<!-- Select Basic -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtgrupo">Função : </label>
			  <button id="cadastro_cargo"  name="cadastro_cargo" style="margin-right: 22%;" class="btn btn-danger" onclick="javascript:location.href='cadastro_cargo.php';">Cadastrar Cargos</button>
			  <div class="col-md-4">
			    <select id="txtgrupo" name="txtfuncao" class="form-control">
			      		<?php 
			      						include("mysql.php");
			      						mysqli_set_charset($conexao, "utf8");

			      						$sql = "select * from funcoes";
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
			  <label class="col-md-4 control-label" for="txtcodigo_unidade_id">Data de nascimento : </label>
			  <div class="col-md-4">
			   		<input type="text" name="data_nascimento" class="form-control input-md" value=<?php echo $data_nascimento; ?>>
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_minimo">Data de contratacao : </label>  
			  <div class="col-md-2">
			  <input id="data_contratacao" name="data_contratacao" type="text" placeholder="" class="form-control input-md" required=""
			  value=<?php echo $data_contratacao; ?>>
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_atual">CPF : </label>  
			  <div class="col-md-2">
			  <input id="cpf" name="cpf" type="text" placeholder="" class="form-control input-md" value=<?php echo $cpf; ?>>
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_atual">Celular : </label>  
			  <div class="col-md-2">
			  <input id="celular" name="celular" type="text" placeholder="" class="form-control input-md" value=<?php echo $celular; ?>>
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_atual">Login : </label>  
			  <div class="col-md-2">
			  <input id="login" name="login" type="text" placeholder="" class="form-control input-md" value=<?php echo $login; ?>>
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="txtestoque_atual">Senha : </label>  
			  <div class="col-md-2">
			  <input id="senha" name="senha" type="text" placeholder="" class="form-control input-md" value=<?php echo $senha; ?>>
			    
			  </div>
			</div>

			

						<div class="form-group" style="margin-right: 40%" >
  <label class="col-md-4 control-label" for="btnsalvar"></label>
  <div class="col-md-8">
    <button id="btnsalvar" name="btnsalvar" class="btn btn-primary">Gravar</button>
     <button id="cancelar" name="cancelar" class="btn btn-danger" onclick="javascript:location.href='listar_funcionarios.php';">Cancelar</button>
  </div>
</div>

			</fieldset>

			<?php 
				if (isset($_POST['btnsalvar'])) {

				
					$data_contratacao = converterDataGravar($_POST['data_contratacao']);
					$data_nascimento = converterDataGravar($_POST['data_nascimento']);



					if ($_POST['txtcodigo_funcionario_id'] == 0 ) {

					$sql = "insert into funcionarios values (0, '".$_POST['txtnome']."', '".$data_nascimento."', '".$data_contratacao."', ".$_POST['cpf'].", '".$_POST['celular']."', ".$_POST['txtfuncao'].", '".$_POST['login']."', '".$_POST['senha']."')";
					

					
					$resultado = mysqli_query($conexao, $sql);
					//header("location: listar_produtos.php");
					
					}else {
						$sql = "update funcionarios
										set nome = '".$_POST['txtnome']."', 
										data_nascimento = '".converterDataGravar($_POST['data_nascimento'])."',
										data_contratacao = '".converterDataGravar($_POST['data_contratacao'])."',
										cpf = ".$_POST['cpf'].",
										celular = '".$_POST['celular']."',
										id_funcao = ".$_POST['txtfuncao']." 
										where codigo = ".$_POST['txtcodigo_funcionario_id'];		
								
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