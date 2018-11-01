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

    $usuario = trim($_POST['txtUsuario']);
    $senha = trim($_POST['txtSenha']);
    $senha = md5($senha);
    $permissao = trim($_POST['txtPermissao']);

    
    
    $sql = "INSERT INTO usuario (user, pwd, tipo) VALUES ('$usuario','$senha','$permissao');";
         
    $ins = mysql_query($sql); // comando para inserir no banco
    if(!ins){
            echo "Deu erro na consulta de inserir produto";
         }
    
    else { echo "campo descricao em branco"; }

    header("location:listarUsuarios.php");
?>