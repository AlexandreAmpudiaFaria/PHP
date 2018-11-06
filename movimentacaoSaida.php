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
    $quantSaida = trim($_POST['txtQuantidade']);
    $quantidadeFinal = ($quantAtual - $quantSaida);
    $tipo = trim($_POST['tipo']);
    $data = trim($_POST['txtData']);
    $prod = trim($_POST['txtProduto']);

    if($quantSaida > $quantAtual){
         header("location:erro.html");
    } else {

    $sql = "UPDATE produto set quantidade='$quantidadeFinal' where id='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco

    if($quantSaida <= $quantAtual){
    
    $sqy = "INSERT INTO movimentacoe (tipo, produto, quant, quantAnterior, quantFinal, data) VALUES ('$tipo', '$prod', '$quantSaida','$quantAtual', '$quantidadeFinal','$data');";
        $inss = mysql_query($sqy);
        header("location:listarProdutos.php");
    } 

    }
         
?>