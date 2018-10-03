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

    $id = trim($_POST['id']);

    $rs = mysql_query("SELECT * FROM produto where id = '$id';"); // rs = record set = conjunto de registros da tabela
?>