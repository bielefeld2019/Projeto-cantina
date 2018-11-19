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
			<a href="listar_clientes.php">Clientes</a>
			<a href="cadastro_funcionarios.php">Funcionários</a>
		</div>

<div class="conteudo" >
	<table width="90%" border="0" >
		<tr>
			<td width="75"><strong>Código</strong></td>
			<td width="300"><strong>Nome</strong></td>
			<td width="200"><strong>Preço de Compra</strong></td>
			<td width="150"><strong>Preço de Venda</strong></td>
			<td width="150"><strong>Qtde Estoque</strong></td>
			<td width="100"><strong>Categoria</strong></td>
		</tr>

		<h1>Produtos</h1>

		<?php

			include("mysql.php");
			mysqli_set_charset($conexao, "utf8");
			
			$sql = "select produtos.codigo 'codpro', produtos.nome 'prodnome', produtos.valor_compra, produtos.valor_venda, produtos.qtde_estoque, categorias.nome 'nomecat' from produtos left join categorias on (produtos.id_categoria = categorias.codigo)";
			$resultado = mysqli_query($conexao, $sql);
			$total_registros = mysqli_num_rows($resultado);

			if ($total_registros > 0){
				while ($linha = mysqli_fetch_assoc($resultado)){

					echo "<tr>";
					echo "<td>".$linha['codpro']."</td>";
					echo "<td>".$linha['prodnome']."</td>";
					echo "<td>".$linha['valor_compra']."</td>";
					echo "<td>".$linha['valor_venda']."</td>";
					echo "<td>".$linha['qtde_estoque']."</td>";
					echo "<td>".$linha['nomecat']."</td>";

					
					echo "<td><input type='button' name='editar' id='editar' value='Editar' class='botao_acao' onclick=javascript:location.href='cadastro_produtos.php?codigo=".$linha['codpro']."'></td>";
					echo "<td><input type='button' name='excluir' id='excluir' value='Excluir' class='botao_acao' onclick=javascript:location.href='excluir_produtos.php?codigo=".$linha['codpro']."'></td>";
					
					

					echo "</tr>";

				}
			}
		?>
	</table>
	<br>
	<input type="button" name="cadastrar" id="cadastrar" class="botao_acao" value="Cadastrar produto" onclick="javascript:location.href='cadastro_produtos.php';" style=" margin-right: 10%;">
</div>





	
	
	
	
	
	   	


</body>
</html>