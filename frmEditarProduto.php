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
 
    $id = trim($_REQUEST['id']);
    
    $rs = mysql_query("SELECT * FROM produto where id=".$id); // rs = record set = conjunto de registros da tabela
    $edita = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="editarProduto.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/validator.min.js"></script>
</head>
<body id="LoginForm">
    <div class="container col-md-8">
        <br>
        <h1 class="text-black">Editar Produto</h1>
        
        <form id="frmEditarProduto" name="frmEditarProduto" method="POST" 
        action="editarProduto.php">
        <div class="form-group">
            <br>
            <label for="lbltxtId"> ID: <?php echo $edita['id'] ?></label>
            <input type="hidden" name="id" value="<?php echo $edita['id'] ?>">
        </div>

        <div class="form-group">
            <label for="lblDescricao" required=""> Descrição: </label>
            <input type="text" id="txtDescricao" name="txtDescricao" class="form-control col-md-4"
            value="<?php echo $edita['descricao'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblValor"> Valor: </label>
            <input type="text" id="txtValor" name="txtValor" class="form-control col-md-4"
            value="<?php echo $edita['valor'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblQuantidade"> Quantidade :</label>
            <input type="text" id="txtQuantidade" name="txtQuantidade" class="form-control col-md-4" value="<?php echo $edita['quantidade'] ?>" required="">
        </div>

        <div class="form-group">
            <label for="lblAltura"> Altura :</label>
            <input type="text" id="txtAltura" name="txtAltura" class="form-control col-md-4" value="<?php echo $edita['altura'] ?>">
        </div>

        <div class="form-group">
            <label for="lblLargura"> Largura : </label>
            <input type="text" id="txtLargura" name="txtLargura" class="form-control col-md-4" value="<?php echo $edita['largura'] ?>">
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
            value="Voltar" onclick="javascript:location.href='listarProdutos.php'">
          </div>
            
        </form>
    </div>

</body>
</html>