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
    
    
    if(!empty($id)){
      $sql = "DELETE FROM usuario WHERE id='$id';";
         
      $ins = mysql_query($sql); // comando para inserir no banco
      if(!ins){
            echo "Deu erro ao remover o produto";
         }
    }

    
    else { echo "campo id = 0"; }

    header("location:listarUsuarios.php");
?>