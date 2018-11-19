<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
	<meta charset="utf-8">

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

		session_start();

		if (isset($_SESSION['logado']) == false){
			//die('Conteúdo restrito!!!');
			echo "<script>alert('Impossível acessar esta página. Conteúdo restrito!')</script>";
			//header("location: home.php");
			echo "<script>window.location.href='home.php'</script>";
		}


	 ?>
	
	<div class="menu">
		<h1 style="color: white; margin-left: 5%;">Menu</h1>
		<a href="administrador.php">Início</a>
		<a href="vendas.php">Vendas</a>
		<a href="cadastro_produtos.php">Cadastrar Produto</a>
		<a href="cadastrar_clientes.php">Clientes</a>
		<a href="listar_funcionarios.php">Funcionários</a>
	</div>

	<div class="conteudo">

		<table width="90%" border="0">
		<tr>
    		<td width="500"><strong><h1>Clientes</h1></strong></td>
		</tr>
	</table>
	
	<table width="100%" border="0">
		<tr>
			<td width="100"><strong>Código</strong></td>
			<td width="500"><strong>Email</strong></td>
			<td width="500"><strong>Nome</strong></td>
			<td width="250"><strong>Cpf</strong></td>
			<td width="300"><strong>Data Nascimento</strong></td>
			<td width="100"><strong>Sexo</strong></td>
			<td width="220"><strong>Telefone</strong></td>
			<td width="300"><strong>Celular</strong></td>
			
			
		</tr>
		
		<?php

			//session_start();
			//if (isset($_SESSION['logado']) == false)
			//die("Impossível acessar esta página. Conteúdo restrito!");

			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");
			
			$sql = "select * from clientes";
			$resultado = mysqli_query($conexao, $sql);
			$total_registros = mysqli_num_rows($resultado);

			if ($total_registros > 0){
				while ($linha = mysqli_fetch_assoc($resultado)){

					echo "<tr>";
					echo "<td>".$linha['codigo']."</td>";
					echo "<td>".$linha['email']."</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$linha['cpf']."</td>";
					echo "<td>".date('d/m/Y', strtotime($linha['datanascimento']))."</td>";
					echo "<td>".$linha['sexo']."</td>";
					echo "<td>".$linha['telefone']."</td>";
					echo "<td>".$linha['celular']."</td>";
					

					echo "<td><input type='button' name='editar' id='editar' value='Editar' class='botao_acao' onclick=javascript:location.href='cadastrar_clientes.php?codigo=".$linha['codigo']."'></a></td>";
					echo "<td><input type='button' name='excluir' id='excluir' value='Excluir' class='botao_acao' onclick=javascript:location.href='excluir_clientes.php?codigo=".$linha['codigo']."'></a></td>";
					

					echo "</tr>";



				}
			}
		?>
			  

	</table>
	
	<br>
	<input type="button" name="cadastrar" id="cadastrar" class="botao_acao" value="Cadastrar Cliente" onclick="javascript:location.href='cadastrar_clientes.php';" style=" margin-right: 10%;">

	</div>


</body>
</html>