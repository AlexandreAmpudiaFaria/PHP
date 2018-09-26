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
 
    $id = trim($_REQUEST['id']); // codigo do produto que vai editar
    
    $rs = mysql_query("SELECT * FROM usuario where id=".$id); // rs = record set = conjunto de registros da tabela onde id é igual id
    $linha = mysql_fetch_array($rs);
    //echo $edita['descricao']; teste de funcionamento

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Remover Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="RemoverProduto.css">
</head>
<body id="LoginForm">
    <div class="container col-md-8">
        <br>
        <h1 class="text-black">Remover Usuario</h1>
        <form id="frmRemoverProduto" name="frmRemoverProduto" method="POST" 
        action="RemoverUsuario.php">
        
         <div class="form-group">
             <label for="lblId">
                <br>
                 <span class="font-weight-bold">ID:</span>
                 <span class="font-weight-normal"><?php echo $linha['id'] ?></span>
                </label>
             <input type="hidden" name="id" id="id" value="<?php echo $linha['id'] ?>">
            </div>

         <div class="form-group">
             <label for="lblUsuario">
                 <span class="font-weight-bold">Usuario:</span>
                 <span class="font-weight-normal"><?php echo $linha['user'] ?></span>
                </label>
            </div>

         <div class="form-group">
             <label for="lblPermissao">
                 <span class="font-weight-bold">Permissão:</span>
                 <span class="font-weight-normal"><?php echo $linha['tipo'] ?></span>
                </label>
            </div>

           <button id="btRem" class="btn btn-lg btn-success" type="submit"><i class="fas fa-check-circle"></i>  Remover</button>

            <button id="btVoltar" class="btn btn-lg btn-danger" type="button" 
            onclick="javascript:location.href='listarUsuarios.php'"> <i class="fas fa-backward"></i> Voltar</button>
        </form>
        
    </div>

</body>
</html>