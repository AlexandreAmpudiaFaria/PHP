<?php 

    session_start();
    if(!isset($_SESSION['user'])){
    	Header("Location:Index.html");

    }

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

    $rs = mysql_query("SELECT * FROM cliente;"); // rs = record set = conjunto de registros da tabela
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title >Listagem de Clientes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="listarProdutos.css">
</head>
<body id="LoginForm">
     
     <div class="table-responsive container col-md-9 ">
	 <br>
	 <h1 class="text-black container col-md-5">Lista de Clientes</h1>
	 <br>

	 <input type="button" id="botaoHome" name="botaoHome" class="btn btn-success"
          	value="Home" onclick="javascript:location.href='listarProdutos.php'">
	 
     <input type="button" id="botaoCliente" name="botaoCliente" class="btn btn-info"
          	value="Clientes" onclick="javascript:location.href='cliente.html'">     	

	 <input type="button" id="botaoAdicionar" name="botaoAdicionar" class="btn btn-primary"
          	value="Adicionar Cliente" onclick="javascript:location.href='frmInserirCliente.html'">
     
     <input type="button" id="botaoLogout" name="botaoLogout" class="btn btn-danger"
          	value="Logout" onclick="javascript:location.href='logout.php'">
          	    	    	     	
           	
     <br>
     <br>
     <div class="table-responsive">
	 <table class="table table-striped">
		<tr>
		 <th class="text-center col-sm-1" >ID</th>
		 <th class=" col-md-1" >Nome</th>
		 <th class=" col-md-1" >Telefone</th>
		 <th class=" col-md-4">Endereço</th>
		 <th class=" col-md-1">Cidade</th>
		 <th class=" col-md-1">Email</th>
		 <th class=" col-md-1">Observação</th>
		 <th colspan="2" class="text-center col-md-1">Operações</th>
		 
		</tr>
		<?php while ($linha = mysql_fetch_array($rs)) {?>
			<tr>
				<td><?php echo $linha ['id']?></td>
				<td><?php echo $linha ['nome']?></td>
				<td><?php echo $linha ['telefone']?></td>
				<td><?php echo $linha ['endereco']?></td>
				<td><?php echo $linha ['cidade']?></td>
				<td><?php echo $linha ['email']?></td>
				<td><?php echo $linha ['observacao']?></td>
				<td>
					<button class="btn btn-warning btn-sm" 
					onclick="javascript:location.href='frmEditarCliente.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-pen-square"></i></button>
				</td>
				<td>
					<button class="btn btn-danger btn-sm" 
					onclick="javascript:location.href='frmRemoverCliente.php?id='+
					<?php echo $linha['id'] ?>"><i class="fas fa-eraser"></i></button>
				</td>
			</tr>
		<?php } ?>	

			
	 </table>
	 <br><br><br><br><br><br><br><br><br><br><br><br>
	 </div>
	</div>

</body>
</html>