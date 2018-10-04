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
 
    $id = trim($_REQUEST['id']); // codigo do produto que vai editar
    
    $rs = mysql_query("SELECT * FROM cliente where id=".$id); // rs = record set = conjunto de registros da tabela onde id é igual id
    $linha = mysql_fetch_array($rs);
    //echo $edita['descricao']; teste de funcionamento

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Remover Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css">
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
    
    <div class="corpoRemoverCliente">
        <br>
        <h1 class="text-black">Remover Cliente</h1>
        <form id="frmRemoverCliente" name="frmRemoverCliente" method="POST" 
        action="RemoverCliente.php">
        
         <div class="form-group">
             <label for="lblId">
                <br>
                 <span class="font-weight-bold">ID:</span>
                 <span class="font-weight-normal"><?php echo $linha['id'] ?></span>
                </label>
             <input type="hidden" name="id" id="id" value="<?php echo $linha['id'] ?>">
            </div>

         <div class="form-group">
             <label for="lblNome">
                 <span class="font-weight-bold">Nome:</span>
                 <span class="font-weight-normal"><?php echo $linha['nome'] ?></span>
                </label>
            </div>

         <div class="form-group">
             <label for="lblTelefone">
                 <span class="font-weight-bold">Telefone:</span>
                 <span class="font-weight-normal"><?php echo $linha['telefone'] ?></span>
                </label>
            </div>

         <div class="form-group">
             <label for="lblEndereco">
                 <span class="font-weight-bold">Endereco:</span>
                 <span class="font-weight-normal"><?php echo $linha['endereco'] ?></span>
                </label>
            </div>

         <div class="form-group">
             <label for="lblCidade">
                 <span class="font-weight-bold">Cidade:</span>
                 <span class="font-weight-normal"><?php echo $linha['cidade'] ?></span>
                </label>
            </div>

         <div class="form-group">
             <label for="lblEmail">
                 <span class="font-weight-bold">Email:</span>
                 <span class="font-weight-normal"><?php echo $linha['email'] ?></span>
                </label>
            </div>   

         <div class="form-group">
             <label for="lblObservacao">
                 <span class="font-weight-bold">Observação:</span>
                 <span class="font-weight-normal"><?php echo $linha['observacao'] ?></span>
                </label>
            </div>

            <button id="btRem" class="btn btn-lg btn-success" type="submit"><i class="fas fa-check-circle"></i>  Remover</button>

            <button id="btVoltar" class="btn btn-lg btn-danger" type="button" 
            onclick="javascript:location.href='listarClientes.php'"> <i class="fas fa-backward"></i> Voltar</button>
        </form>
        
    </div>

</body>
</html>