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
    $nome = trim($_POST['txtNome']);
    $telefone = trim($_POST['txtTelefone']);
    $endereco = trim($_POST['txtEndereco']);
    $cidade = trim($_POST['txtCidade']);
    $email = trim($_POST['txtEmail']);
    $observacao= trim($_POST['txtObservacao']);

    
    
    $sql = "UPDATE cliente set nome='$nome',telefone='$telefone',endereco='$endereco',cidade='$cidade',email='$email',observacao='$observacao' where id='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco

    if(!ins){
            echo "Deu erro ao atualizar o produto";
         }
    
    else { echo "campo descricao em branco"; }
    

    header("location:listarCliente.php");
?>