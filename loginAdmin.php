<?php
    $user = trim($_POST['user']);
    $pwd = trim($_POST['pwd']); 
    $md5 = md5($pwd);
    $tipo = 1;
    

    //echo "Usuario: " . $user . "<br/>"; 
    // echo "Senha: " .  $pwd . "<br/>"; 
    //echo "MD5('$pwd'): $md5 <br/>"; 

    $conexao =  mysql_connect("localhost","root",""); 
    if (!$conexao){
        echo "Erro ao se conectar MySql <br/>" ; 
        exit;
    }
 
    $banco  = mysql_select_db("trabalho");
    if (!$banco){
      echo "Erro ao se conectar ao banco estoque...";
         exit;
    }
 
    $rs = mysql_query("SELECT * FROM  usuario WHERE user LIKE '$user'");
    $linha = mysql_fetch_array($rs); 
    //echo "usuario: " . $linha['user'] . "<br/>";
    //echo "pwd: " .$linha['pwd'] . "<br/>";

    $pwd = $md5;
    if ($pwd==$linha['pwd'] && $tipo == $linha['tipo']){
      //echo "Usuario e senha compativeis";
      session_start(); 
      $_SESSION['user'] = $user; 
      header('location:admin.html');
    }
    else { //echo "Usuário e senha inválido";
           header('location: loginAdmin.html'); 
         }

?>