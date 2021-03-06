<?php 

   session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./Index.html");

    

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

    $rs = mysql_query("SELECT * FROM produto;"); // rs = record set = conjunto de registros da tabela
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title >Listagem de Produtos</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
</head>
<body class="corpo">

	<script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="node_modules/popper.js/dist/popper.js"></script>
	<script type="text/javascript" src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

	<!-- As a link -->
    <nav class="navbar navbar-light bg-primary teste">
       <a class="navbar-brand" href="home.html">Home <i class="fas fa-home"></i></a>
     </nav>

    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="listarProdutos.php">Produtos <i class="fas fa-archive"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="cliente.html">Clientes <i class="fas fa-users"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="venda.html">Vendas <i class="fas fa-shopping-cart"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="loginAdmin.html">Admin <i class="fas fa-user-tie"></i></a>
    </nav>
     
     <div class="table-responsive container table ">
	 <br>
	 <h1 class="text-black container col-md-5">Lista de Produtos</h1>
	 <br>

     <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary" value="Adicionar Produto" onclick="javascript:location.href='frmInserirProduto.html'">
     
     <input type="button" id="botaoLogout" name="botaoLogout" class="btn btn-danger" value="Logout" onclick="javascript:location.href='logout.php'">
          	    	    	     	
     <br><br>
     <div class="container col-md-11 tabelaProdutos">
	 <table class="table table-striped ">
		<tr>
		 <th class="col-md-1 text-center">ID</th>
		 <th class="col-md-1">Desc</th>
		 <th class="col-md-1">Valor</th>
		 <th class="col-md-1">Quantidade</th>
		 <th class="col-md-1">Altura</th>
		 <th class="col-md-1">Largura</th>
		 <th class="col-md-1">Obs</th>
		 <th colspan="4" class="text-center col-md-1">Operações</th>
		 
		</tr>
		<?php while ($linha = mysql_fetch_array($rs)) {?>
			<tr>
				<td class="text-center"><?php echo $linha ['id']?></td>
				<td><?php echo $linha ['descricao']?></td>
				<td><?php echo number_format($linha['valor'],2,',','.') ?></td>
				<td><?php echo $linha ['quantidade']?></td>
				<td><?php echo number_format($linha['altura'],2,',','.') ?></td>
				<td><?php echo number_format($linha['largura'],2,',','.') ?></td>
				<td><?php echo $linha ['observacao']?></td>
				<td>
					<button class="btn btn-info btn-sm" 
					onclick="javascript:location.href='frmMovimentacao.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-plus-circle"></i></button>
				</td>
				<td>
					<button class="btn btn-success btn-sm" 
					onclick="javascript:location.href='frmMovimentacaoSaida.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-arrow-alt-circle-down"></i></button>
				</td>
				<td>
					<button class="btn btn-warning btn-sm" 
					onclick="javascript:location.href='frmEditarProduto.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-pen-square"></i></button>
				</td>
				<td>
					<button class="btn btn-danger btn-sm" 
					onclick="javascript:location.href='frmRemoverProduto.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-eraser"></i></button>
				</td>

			</tr>
		<?php } ?>	

			
	 </table>
	 </div>
	 </div>
	</div>

</body>
</html>