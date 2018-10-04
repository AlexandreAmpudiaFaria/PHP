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
 
    $id = trim($_REQUEST['id']);
    
    $rs = mysql_query("SELECT * FROM cliente where id=".$id); // rs = record set = conjunto de registros da tabela
    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/validator.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="corpo">

    <!-- navbar -->
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

    <div class="corpoEditarCliente">
        <br>
        <h1 class="text-black">Editar Cadastro do Cliente</h1>
        
        <form id="frmEditarCliente" name="frmEditarCliente" method="POST" 
        action="editarCliente.php">
        <div class="form-group">
            <br>
            <label for="lbltxtId"> ID: <?php echo $edita['id'] ?></label>
            <input type="hidden" name="id" value="<?php echo $edita['id'] ?>">
        </div>

        <div class="form-group">
            <label for="lblnome" required=""> Nome: </label>
            <input type="text" id="txtNome" name="txtNome" class="form-control col-md-4"
            value="<?php echo $edita['nome'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblTelefone"> Telefone: </label>
            <input type="text" id="txtTelefone" name="txtTelefone" class="form-control col-md-4"
            value="<?php echo $edita['telefone'] ?>">
        </div>

        <div class="form-group">
            <label for="lblEndereco"> Endereço :</label>
            <input type="text" id="txtEndereco" name="txtEndereco" class="form-control col-md-4" value="<?php echo $edita['endereco'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblCidade"> Cidade :</label>
            <input type="text" id="txtCidade" name="txtCidade" class="form-control col-md-4" value="<?php echo $edita['cidade'] ?>">
        </div>

        <div class="form-group">
            <label for="lblEmail"> Email : </label>
            <input type="text" id="txtEmail" name="txtEmail" class="form-control col-md-4" value="<?php echo $edita['email'] ?>">
        </div>

        <div class="form-group">
            <label for="lblObservacao"> Observação : </label>
            <input type="text" id="txtObservacao" name="txtObservacao" class="form-control col-md-4" value="<?php echo $edita['observacao'] ?>">
        </div>

        <div class="form-group">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg" 
            value="Atualizar"> 
            <input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary bt-lg"
            value="Limpar">
            <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger bt-lg"
            value="Voltar" onclick="javascript:location.href='listarClientes.php'">
          </div>
            
        </form>
    </div>

</body>
</html>