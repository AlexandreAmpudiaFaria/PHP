<?php 

    

    $conexao = mysql_connect("localhost","root",""); //abre a conexao com banco
    if(!$conexao){
    	echo "Erro ao se conectar ao banco";
    	exit;
    }

    $banco = mysql_select_db("trabalho"); // seleciona o banco a ser usado
    if(!$banco){
    	echo "Erro ao se conectar com o banco trabalho";
    	exit;
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Venda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/validator.min.js"></script>
    <meta charset="utf-8">
</head>
<body class="corpo">
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-primary teste">
       <a class="navbar-brand" href="home.html">Home <i class="fas fa-home"></i></a>
     </nav>
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="listarProdutos.php">Produtos <i class="fas fa-archive"></i></a>
    </nav>
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="cliente.html">Clientes <i class="fas fa-users"></i></a>
    </nav>
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="#">Vendas <i class="fas fa-shopping-cart"></i></a>
    </nav>
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="loginAdmin.html">Admin <i class="fas fa-user-tie"></i></a>
    </nav>
    <div class="corpoVenda">
        <h1>Vendas</h1>
    <form id="venda.html" name="venda.html" method="POST" action="carrinho.php">
     
        <label class="form-group" >ID:</label>
        <input type="text" id="txtid" name="txtid" class="form-group form-control col-md-3"  placeholder="Digite o codigo do produto">
 
    <div class="form-group">
      <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg" 
            value="Buscar">
    </div>
    <div>
        <? php if() ?>
    </div>


  </form>
    </div>

</body>
</html>