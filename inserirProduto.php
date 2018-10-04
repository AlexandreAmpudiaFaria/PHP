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

    $descricao = trim($_POST['txtDescricao']);
    //$fornecedor = trim($POST['txtFornecedor']);
    $valor = trim($_POST['txtValor']);
    $quantidade = trim($_POST['txtQuantidade']);
    $altura = trim($_POST['txtAltura']);
    $largura = trim($_POST['txtLargura']);
    $observacao = trim($_POST['txtObservacao']);

    
    
    $sql = "INSERT INTO produto (descricao, valor, quantidade, altura, largura, observacao) VALUES ('$descricao','$valor','$quantidade','$altura',
        '$largura','$observacao');";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:listarProdutos.php");
?>