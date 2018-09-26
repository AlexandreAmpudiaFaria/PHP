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
    $usuario = trim($_POST['txtUsuario']);
    $permissao = trim($_POST['txtPermissao']);

    
    
    $sql = "UPDATE usuario set user='$usuario',tipo='$permissao' where id='$id';";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro ao atualizar o produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:listarUsuarios.php");
?>