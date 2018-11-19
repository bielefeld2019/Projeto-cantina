<!DOCTYPE html>
<html>
<head>
  <title>Cadastrar Clientes</title>
  <meta charset="utf-8">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
      include("funcoes.php"); 
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
        $sql = "select * from clientes where codigo = ".$_GET['codigo'];
        $resultado = mysqli_query($conexao, $sql);
        $linha = mysqli_fetch_assoc($resultado);

        $codigo = $linha['codigo'];
        $email = $linha['email'];
        $nome = $linha['nome'];
        $cpf = $linha['cpf'];
        $datanascimento = date('d/m/Y', strtotime($linha['datanascimento']));
        $sexo = $linha['sexo'];
        $telefone = $linha['telefone'];
        $celular = $linha['celular'];
        $senha = $linha['senha']; 
          
          
        
      }
      else{
        $codigo = "";
        $email = "";
        $nome = "";
        $cpf = "";
        $datanascimento = "";
        $sexo = "";
        $telefone = "";
        $celular = "";
        $senha = ""; 
      }
      
    ?>


<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
-->


<div class="menu">
      <h1 style="color: white; margin-left: 5%;">Menu</h1>
        <a href="administrador.php">Início</a>
        <a href="vendas.php">Vendas</a>
        <a href="listar_produtos.php">Produtos</a>
        <a href="listar_clientes.php">Clientes</a>
        <a href="cadastro_funcionarios.php">Funcionários</a>
      </div>

<h1 style="text-align: center;"><strong>Cadastro de clientes</strong></h1>

<form class="form-horizontal" method="post" action="cadastrar_clientes.php">
<fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="codigo">Codigo</label>  
  <div class="col-md-5">
  <input id="codigo" name="codigo" value="<?php echo $codigo; ?>" type="text" placeholder="Código" class="form-control input-md" readonly>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="identificacao">Email</label>  
  <div class="col-md-5">
  <input id="email" name="email" value="<?php echo $email; ?>" type="text" placeholder="Email Cliente" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" value="<?php echo $nome; ?>" type="text" placeholder="Entre com o Nome" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="cpf">CPF</label>  
  <div class="col-md-5">
  <input id="cpf" name="cpf" value="<?php echo $cpf; ?>" type="text" placeholder="Numero do CPF" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="datanascimento">Data de Nascimento</label>  
  <div class="col-md-4">
  <input id="datanascimento" name="datanascimento" value="<?php echo $datanascimento; ?>"  type="text" placeholder="dd/mm/yyyy" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="sexo">Sexo</label>
  <div class="col-md-4">
    <select id="sexo" name="sexo" class="form-control">
     <option value="F" <?php if ($sexo == "F") echo "<selected>"?>>Feminino</option>
    <option value="M" <?php if ($sexo == "M") echo "<selected>"?>>Masculino</option>
    </select>
  </div>
</div>




<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" value="<?php echo $telefone; ?>" type="text" placeholder="(99)999999999" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="celular">Celular</label>  
  <div class="col-md-4">
  <input id="celular" name="celular" value="<?php echo $celular; ?>" type="text" placeholder="(99)999999999" class="form-control input-md">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha</label>
  <div class="col-md-4">
    <input id="senha" name="senha" value="<?php echo $senha; ?>" type="password" placeholder="Entre com a Senha" class="form-control input-md" required>
    
  </div>
</div>

<div class="form-group" style="margin-right: 0%;">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="gravar" name="gravar" class="btn btn-primary">Gravar</button>
    <button id="voltar" name="voltar" onclick=javascript:location.href='listar_clientes.php?' class="btn btn-danger">Voltar</button>
  </div>
</div>

</fieldset>
<?php
      
      if (isset($_POST["gravar"])){


        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $datanascimento = converterDataGravar($_POST['datanascimento']);
        $sexo = $_POST['sexo'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $senha = $_POST['senha']; 
        


        if ($_POST['codigo'] == ""){
          $sql = "insert into clientes values (0, 
                            '".$email."' , 
                            '".$nome."', 
                            ".$cpf." ,
                            '".$datanascimento."' ,
                            '".$sexo."' ,
                            ".$telefone." , 
                            ".$celular." , 
                            '".$senha."')";

          $resultado = mysqli_query($conexao, $sql);

          if (!$resultado){
            echo "Erro ao gravar!";
            exit;
          }
          
        }
        else{         
          $sql = "update clientes
              set email = '".$email."' , 
                nome = '".$nome."' , 
                cpf = ".$cpf." ,
                datanascimento = '".$datanascimento."' ,
                sexo = '".$sexo."' ,
                telefone = ".$telefone.",
                celular = ".$celular.",
                senha = '".$senha."'
              where codigo = ".$_POST['codigo'];
              
          mysqli_query($conexao, $sql);
        }
        

        echo "<script>window.location='listar_clientes.php'</script>";

      }     
    ?>
</form>

</body>
</html>
