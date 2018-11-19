<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
</head>
<body>


	    <div id="login">
	        <h3 class="text-center text-white pt-5">Login form</h3>
	        <div class="container">
	            <div id="login-row" class="row justify-content-center align-items-center">
	                <div id="login-column" class="col-md-6">
	                    <div id="login-box" class="col-md-12">
	                        <form id="login-form" class="form" action="" method="post">
	                            <h3 class="text-center text-info">Login</h3>
	                            <div class="form-group">
	                                <label for="username" class="text-info">Usuário:</label><br>
	                                <input type="text" name="username" id="username" class="form-control">
	                            </div>
	                            <div class="form-group">
	                                <label for="password" class="text-info">Senha:</label><br>
	                                <input type="password" name="password" id="password" class="form-control">
	                            </div>
	                            <div class="form-group">	                                
	                                <input type="submit" name="entrar" class="btn btn-info btn-md" value="Entrar">
	                            </div>

	                            <?php
	                            	include("mysql.php");
	                            	mysqli_set_charset($conexao, "utf8");

	                            	if (isset($_POST['entrar'])) {

	                            		$sql = "select * from clientes
                                            	where email = '".$_POST['username']."'
                                           		and senha = '".$_POST['password']."'"; 

                                        $resultado = mysqli_query($conexao, $sql);
                                        $total_registro = mysqli_num_rows($resultado);
                                        $linha = mysqli_fetch_assoc($resultado);

                                        if ($total_registro <> 0 ) {
                                        	header("location: clientes.php");
                                        	
                                        	session_start(); // inicia a sessão

                                        	$_SESSION['logado'] = true;
                                        	$_SESSION['nome'] = $linha['nome'];

                                        }elseif($total_registro == 0) {
                                            $sql = "select * from funcionarios
                                            	where login = '".$_POST['username']."'
                                           		and senha = '".$_POST['password']."'"; 
                                        

                                        $resultado = mysqli_query($conexao, $sql);
                                        $total_registro = mysqli_num_rows($resultado);
                                        $linha = mysqli_fetch_assoc($resultado);
                                        if ($total_registro <> 0) {
                                        	header("location: administrador.php");
                                        	session_start(); // inicia a sessão

                                        	$_SESSION['logado'] = true;
                                        	$_SESSION['nome'] = $linha['nome'];
                                        	
                                        }else{
                                        	echo "<script>alert('Usuário ou Senha inválidos Por favor, tente novamente')</script>";

                                        }
                                        }
                                                                                    
                                    }


	                            	

	                             ?>                          
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	




</body>
</html>