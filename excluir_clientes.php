<?php

	include("mysql.php");
	
	if (isset($_GET['codigo'])){
		$sql = "delete from clientes
				where codigo = ".$_GET['codigo'];

		mysqli_query($conexao, $sql);

		echo "<script>window.location='listar_clientes.php'</script>";
		
	}

?>