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
    $quantAtual = trim($_POST['quant']);
    $quantNova = trim($_POST['txtQuantidade']);
    $quantidadeFinal = ($quantAtual + $quantNova);
    $tipo = trim($_POST['tipo']);
    $data = trim($_POST['txtData']);
    $prod = trim($_POST['txtProduto']);

    
    $sql = "UPDATE produto set quantidade='$quantidadeFinal' where id='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco


    $sqy = "INSERT INTO movimentacoe (tipo, produto, quant, quantAnterior, quantFinal, data) VALUES ('$tipo', '$prod', '$quantNova','$quantAtual', '$quantidadeFinal', '$data');";
         
    $inss = mysql_query($sqy); // comando para inserir no banco
    if(!ins){
            echo "Deu erro ao atualizar o produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:listarProdutos.php");
?>