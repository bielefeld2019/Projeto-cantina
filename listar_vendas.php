<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
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
			<a href="cadastro_clientes.php">Clientes</a>
			<a href="cadastro_funcionarios.php">Funcionários</a>
		</div>

<div class="conteudo" >
	<table width="90%" border="0" >
		<tr>
			<td width="75"><strong>Código</strong></td>
			<td width="300"><strong>Cliente</strong></td>
			<td width="200"><strong>Vendedor</strong></td>
			<td width="150"><strong>Data da Venda</strong></td>
			<td width="150"><strong>Produto</strong></td>
			<td width="150"><strong>Valor Total</strong></td>
			
		</tr>

		<h1>Vendas</h1>

		<?php

			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");
			
			$sql = "select vendas.codigo 'codven', clientes.nome 'clinome', funcionarios.nome'funnome', produtos.nome'pronome', vendas.data'vendata', vendas.valor'valor' from vendas 
			left join produtos on (vendas.id_produto = produtos.codigo)
			left join clientes on (vendas.id_cliente = clientes.codigo)
            left join funcionarios on (vendas.id_funcionario = funcionarios.codigo)		
			";	

			$resultado = mysqli_query($conexao, $sql);
			$total_registros = mysqli_num_rows($resultado);

			if ($total_registros > 0){
				while ($linha = mysqli_fetch_assoc($resultado)){

					echo "<tr>";
					echo "<td>".$linha['codigo']."</td>";
					echo "<td>".$linha['clinome']."</td>";
					echo "<td>".$linha['funnome']."</td>";
					echo "<td>".$linha['pronome']."</td>";
					echo "<td>".$linha['vendata']."</td>";
					echo "<td>".$linha['vendas']."</td>";

					
					echo "<td><input type='button' name='editar' id='editar' value='Editar' class='botao_acao' onclick=javascript:location.href='vendas.php?codigo=".$linha['codigo']."'></td>";
					echo "<td><input type='button' name='excluir' id='excluir' value='Excluir' class='botao_acao' onclick=javascript:location.href='excluir_vendas.php?codigo=".$linha['codigo']."'></td>";
					
					

					echo "</tr>";

				}
			}
		?>
	</table>
	<br>
	<input type="button" name="cadastrar" id="cadastrar" class="botao_acao" value="Cadastrar Venda" onclick="javascript:location.href='vendas.php';" style=" margin-right: 10%;">
</div>





	
	
	
	
	
	   	


</body>
</html>