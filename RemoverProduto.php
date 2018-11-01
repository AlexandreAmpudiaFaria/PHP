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

    $id = trim($_POST['id']);
    /*$descricao = trim($_POST['txtDescricao']);
    $fornecedor = trim($POST['txtFornecedor']);
    $valor = trim($_POST['txtValor']);
    $quantidade = trim($_POST['txtQuantidade']);
    $altura = trim($_POST['txtAltura']);
    $largura = trim($_POST['txtLargura']);
    $observacao = trim($_POST['txtObservacao']);*/

    
    if(!empty($id)){
      $sql = "DELETE FROM produto WHERE id='$id';";
         
      $ins = mysql_query($sql); // comando para inserir no banco
      if(!ins){
            echo "Deu erro ao remover o produto";
         }
    }

    
    else { echo "campo id = 0"; }

    header("location:listarProdutos.php");
?>