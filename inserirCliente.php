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

    $nome = trim($_POST['txtNome']);
    $telefone = trim($_POST['txtTelefone']);
    $endereco = trim($_POST['txtEndereco']);
    $cidade = trim($_POST['txtCidade']);
    $email = trim($_POST['txtEmail']);
    $observacao = trim($_POST['txtObservacao']);

    
    
    $sql = "INSERT INTO cliente (nome, telefone, endereco, cidade, email, observacao) VALUES ('$nome','$telefone','$endereco','$cidade',
        '$email','$observacao');";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:listarClientes.php");
?>