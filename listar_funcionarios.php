<!DOCTYPE html>
<html>
<head>
	<title>Funcionários</title>
	<meta charset="utf-8">

	<style type="text/css">
		
		body{
				font-family: Arial;
				background-color: #fff;
				color: black;

			}

			

			.conteudo{
				margin-left: 12%;
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
		<a href="cadastro_funcionarios.php">Funcionários</a>
	</div>

	<div class="conteudo">

		<table width="90%" border="0">
		<tr>
    		<td width="500"><strong><h1>Funcionários</h1></strong></td>
    		
		</tr>
	</table>
	
	<table width="100%" border="0">
		<tr>
			<td width="100"><strong>Código</strong></td>
			<td width="350"><strong>Nome</strong></td>
			<td width="250"><strong>Data de nascimento</strong></td>
			<td width="250"><strong>Data Contratacao</strong></td>
			<td width="250"><strong>CPF</strong></td>
			<td width="200"><strong>Celular</strong></td>
			<td width="220"><strong>Cargo</strong></td>
			
			
		</tr>

		<?php

			//session_start();
			//if (isset($_SESSION['logado']) == false)
			//die("Impossível acessar esta página. Conteúdo restrito!");

			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");
			
			$sql = "select funcionarios.codigo 'cod', funcionarios.nome 'nome', funcionarios.data_nascimento 'dt_nasc', funcionarios.data_contratacao 'dt_con', funcionarios.cpf 'cpf', funcionarios.celular 'cel', funcoes.nome 'cargo' from funcionarios
				left join funcoes on (funcionarios.id_funcao = funcoes.codigo)";
			$resultado = mysqli_query($conexao, $sql);
			$total_registros = mysqli_num_rows($resultado);

			if ($total_registros > 0){
				while ($linha = mysqli_fetch_assoc($resultado)){

					echo "<tr>";
					echo "<td>".$linha['cod']."</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".date('d/m/Y', strtotime($linha['dt_nasc']))."</td>";
					echo "<td>".date('d/m/Y', strtotime($linha['dt_con']))."</td>";
					echo "<td>".$linha['cpf']."</td>";
					echo "<td>".$linha['cel']."</td>";
					echo "<td>".$linha['cargo']."</td>";
					
					


					echo "<td><input type='button' name='editar' id='editar' value='Editar' class='botao_acao' onclick=javascript:location.href='cadastro_funcionarios.php?codigo=".$linha['cod']."'></td>";
					echo "<td><input type='button' name='excluir' id='excluir' value='Excluir' class='botao_acao' onclick=javascript:location.href='excluir_funcionarios.php?codigo=".$linha['cod']."'></td>";
					

					echo "</tr>";

				}
			}
		?>
	</table>
	
	<br>
	<input type="button" name="cadastrar" id="cadastrar" class="botao_acao" value="Cadastrar Funcionário" onclick="javascript:location.href='cadastro_funcionarios.php';" style=" margin-right: 10%;">

	</div>


</body>
</html>