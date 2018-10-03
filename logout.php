<? php

  session_start();
  
  unset($_SESSION['usuario']);
  //unset($_SESSION['pwd']);
  //session_destroy();
  header('location:Index.html');
 


?>