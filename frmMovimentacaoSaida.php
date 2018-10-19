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
    
    $rs = mysql_query("SELECT * FROM produto where id=".$id); // rs = record set = conjunto de registros da tabela
    $edita = mysql_fetch_array($rs);

    $rsCli = mysql_query("SELECT * FROM cliente"); // rs = record set = conjunto de registros da tabela

    $linha = mysql_fetch_array($rsCli);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Movimentação</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/validator.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body class="corpo" ">

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

    <div class="corpoEditarProduto">
        <br>
        <h1 class="text-black">Saída</h1>
        
        <form id="frmMovimentacao" name="frmMovimentacao" method="POST" 
        action="movimentacaoSaida.php">
        <div class="form-group">
            <label for="lbltxtId"> ID: <?php echo $edita['id'] ?></label>
            <input type="hidden" name="id" value="<?php echo $edita['id'] ?>">
        </div>

        <div class="form-group">
            <label for="lblDescricao" required=""> Descrição: </label>
            <input type="text" id="txtDescricao" name="txtDescricao" class="form-control col-md-4"
            value="<?php echo $edita['descricao'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lbltxtQuant"> Quantidade atual: <?php echo $edita['quantidade'] ?></label>
            <input type="hidden" name="quant" value="<?php echo $edita['quantidade'] ?>">
        </div>

        <div class="form-group">
            <label for="lblQuantidade"> Quantidade de saída :</label>
            <input type="text" id="txtQuantidade" name="txtQuantidade" class="form-control col-md-4" required="">
        </div>

        <div class="form-group">
            <label for="lblCliente"> Cliente :</label>
            <br>
            <select class="form-control col-md-4" name="lista" id="lista">
                <option value="<?php echo $linha['id'] ?>" selected> <?php echo $linha['nome'] ?></option>
                <?php while ($linha = mysql_fetch_array($rsCli)) {?>
                    <option value="<?php echo $linha['id'] ?>"> <?php echo $linha['nome'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            <input type="hidden" name="tipo" value="Saída">
        </div>

        <div class="form-group">
            <label for="lblQuantidade"> Data :</label>
            <input type="date" id="txtData" name="txtData" class="form-control col-md-4" required="">
        </div>

        <div class="form-group">
            <input type="submit" id="botaoEnviar" name="botaoEnviar" class="btn btn-success bt-lg" 
            value="Atualizar"> 
            <input type="reset" id="botaoLimpar" name="botaoLimpar" class=" btn btn-primary bt-lg"
            value="Limpar">
            <input type="button" id="botaoCancelar" name="botaoCancelar" class="btn btn-danger bt-lg"
            value="Voltar" onclick="javascript:location.href='listarProdutos.php'">
          </div>
            
        </form>
    </div>

</body>
</html>