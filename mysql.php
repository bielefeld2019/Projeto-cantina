<?php

	$conexao = mysqli_connect("localhost", "root", "", "cantina");

	if($conexao == false){
		die("Erro ao conectar ao banco de dados!");
	}
	

?>