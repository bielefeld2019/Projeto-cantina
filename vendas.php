<!DOCTYPE html>
<html>
<head>
  <title>Vendas</title>
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
      #produtos {
        margin-top: 100px;
        margin-right: 300px;

      }



  </style>
</head>
<body>
    <div class="menu">
      <h1 style="color: white; margin-left: 5%;">Menu</h1>
      <a href="administrador.php">Início</a>
      <a href="vendas.php">Vendas</a>
      <a href="cadastro_produtos.php">Cadastrar Produto</a>
      <a href="cadastrar_clientes.php">Clientes</a>
      <a href="listar_funcionarios.php">Funcionários</a>
    </div>

    <h1 style="text-align: center;"><strong>Registro de vendas</strong></h1>

    <div id="conteudo">
    <form class="form-horizontal" method="post" action="vendas.php" id="formulario">
      <fieldset style="text-align: center;">

      <!-- Form Name -->
      

      <!-- Text input-->
      <div class="form-group" style="text-align: center;">
        
        <label class="col-md-4 control-label" for="txtcodigo_produto_id">Cód. Venda : </label>  
        <div class="col-md-2">
        <input id="codigo" name="codigo" type="text" placeholder="Código" class="form-control input-md" readonly="true" value="">
          
        </div>
      </div>

      <div class="form-group">
        <label class="col-md-4 control-label" for="txtgrupo">Cliente : </label>
        <div class="col-md-4">
          <select id="cliente" name="cliente" class="form-control">
                <?php 
                        include("mysql.php");
                        mysqli_set_charset($conexao, "utf8");

                        $sql = "select * from clientes";
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

      <div class="form-group">
        <label class="col-md-4 control-label" for="txtgrupo">Vendedor : </label>
        <div class="col-md-4">
          <select id="vendedor" name="vendedor" class="form-control">
                <?php 
                        include("mysql.php");
                        mysqli_set_charset($conexao, "utf8");

                        $sql = "select * from funcionarios";
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


      

      <div class="form-group">
        <label class="col-md-4 control-label" for="data">Data</label>  
        <div class="col-md-4">
          <input type="date" name="data" id="data" class="form-control input-md" style="height: 35px;
          width: 250px; border-radius: 5px; text-align: left;">
          
        
          
        </div>
      </div>
    
      <div id="produtos">
        
          <div class="form-group">
            <label class="col-md-4 control-label" for="produto">Produtos : </label>
            <div class="col-md-4">
              <select id="produto" name="produto" class="form-control">
                    <?php 
                            include("mysql.php");
                            mysqli_set_charset($conexao, "utf8");

                            $sql = "select * from produtos";
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
         
         <div class="form-group">
           <label class="col-md-4 control-label" for="telefone">Valor unitário:</label>  
           <div class="col-md-4">
           <input id="valor" name="valor" value="" type="text" placeholder="" class="form-control input-md">
             
           </div>
         </div>
         <div class="form-group">
           <label class="col-md-4 control-label" for="telefone">Quantidade :</label>  
           <div class="col-md-4">
           <input id="quantidade" name="quantidade" value="" type="text" placeholder="" class="form-control input-md">
             
           </div>
         </div>

          <div class="form-group">
           <label class="col-md-4 control-label" for="telefone">Total :</label>  
           <div class="col-md-4">
           <input id="total" name="total" value="<?php $valor_total; ?>" type="text" placeholder="" class="form-control input-md">
             
           </div>
         </div>
          
          
            <input id="adicionar" name="adicionar" class="btn btn-danger" value="Vender" type="submit">

            <?php 
              include("funcoes.php");
              if (isset($_POST['adicionar'])) {
                $data_venda =  converterDataGravar($_POST['data']);
               $sql = "insert into vendas values (0, ".$_POST['cliente'].", ".$_POST['vendedor'].", '".$data_venda."', ".$_POST['produto'].", ".$_POST['total'].")";
               mysqli_query($conexao, $sql);

                /*
                $produtos = array(array('produto'    => $_POST['produto'],
                                        'valor'      => $_POST['valor'],
                                        'quantidade' => $_POST['quantidade'],
                                        'total'      => $_POST['quantidade'] * $_POST['valor']));
                
                
                foreach ($produtos as $produto) {
                  echo $produto['produto'];
                  echo $produto['valor'];
                  echo $produto['quantidade'];
                  //echo $produto['total'];
                }
                           

      
            */
              }

            ?>
          
          </div>

          
     




      </div>


    </form>
    </div> 
</body>
</html>