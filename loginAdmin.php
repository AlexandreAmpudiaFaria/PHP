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
 
    $user = trim($_POST['user']);
    $pwd = trim($_POST['pwd']);
    $pwd = md5($pwd);
    
    $rs = mysql_query("SELECT * FROM usuario where user like '$user'"); // rs = record set = conjunto de registros da tabela
    $linha = mysql_fetch_array($rs);
    
    if($pwd==$linha['pwd'] && $linha['tipo']==1){
    	session_start();

    	$_SESSION['user'] = $user;
    	header("location:admin.html");
        

    }
    else { echo "Usuario ou senha incorretos !";

    	   header('location:Index.html');
    	}


?>