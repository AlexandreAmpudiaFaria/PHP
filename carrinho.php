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
 
    $id = trim($_POST['txtid']);
    
    $rs = mysql_query("SELECT * FROM produto where id=".$id); // rs = record set = conjunto de registros da tabela
    $linha = mysql_fetch_array($rs);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title >Carrinho de Compras</title>
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
       <a class="navbar-brand" href="#">Vendas <i class="fas fa-shopping-cart"></i></a>
    </nav>
    <!-- As a link -->
    <nav class="navbar navbar-light bg-primary">
       <a class="navbar-brand" href="loginAdmin.html">Admin <i class="fas fa-user-tie"></i></a>
    </nav>
     
     <div class="table-responsive container table ">
     <br>
     <h1 class="text-black">Carrinho de Compras</h1>
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
         <th class=" col-md-1" >Desc</th>
         <th class=" col-md-1" >Valor</th>
         <th class=" col-md-1">Quantidade</th>
         <th class=" col-md-1">Altura</th>
         <th class=" col-md-1">Largura</th>
         <th class=" col-md-1">Obs</th>
         <th colspan="2" class="text-center col-md-1">Operações</th>
         
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

</body>
</html>