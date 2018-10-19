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

    $rs = mysql_query("SELECT * FROM movimentacoes;"); // rs = record set = conjunto de registros da tabela

    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title >Lista de Movimentaçoes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body class="corpo">

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
	 <h1 class="text-black">Lista de Movimentaçoes</h1>
	 <br>
	
	<input type="button" id="botaoVendas" name="botaoVendas" class="btn btn-light"
     value="Efetuar Venda" onclick="javascript:location.href='venda.html'">

     <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary" value="Adicionar Produto" onclick="javascript:location.href='frmInserirProduto.html'">
     
     <input type="button" id="botaoLogout" name="botaoLogout" class="btn btn-danger" value="Logout" onclick="javascript:location.href='logout.php'">
          	    	    	     	
     <br><br>
     <div class="table-responsive">
	 <table class="table table-striped">
		<tr>
		 <th class="col-1 text-center" >ID</th>
		 <th class="col-2 text-center">Cliente/Fornecedor</th>
		 <th class=" col-md-2 text-center" >Tipo</th>
		 <th class=" col-md-2 text-center" >Quant</th>
		 <th class=" col-md-2 text-center">Quant anterior</th>
		 <th class=" col-md-2 text-center">Data</th>
		
		 
		</tr>
		<?php while ($linha = mysql_fetch_array($rs)) {?>
			<tr>
				<td class="text-center"><?php echo $linha ['id']?></td>
				<td class="text-center"><?php echo $linha ['cliente']?></td>
				<td class="text-center"><?php echo $linha ['tipo']?></td>
				<td class="text-center"><?php echo $linha ['quant']?></td>
				<td class="text-center"><?php echo $linha ['quantAnterior']?></td>
				<td class="text-center"><?php echo $linha ['data']?></td>
				<td>
				<!--<button class="btn btn-info btn-sm" 
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
				</td>!-->

			</tr>
		<?php } ?>	

			
	 </table>
	 </div>
	</div>

</body>
</html>