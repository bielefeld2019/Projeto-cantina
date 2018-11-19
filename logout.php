<?php

	session_start();

	session_unset(); // apagar todas as variáveis da sessão

	session_destroy(); // encerrar a sessão

	header("location: home.php");
?>