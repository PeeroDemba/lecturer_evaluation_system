<?php
  setcookie( "login", "", time()- 60, "/","", true, true); // delete login cookie
  header('Location: '.$uri.'/website/login.php');
?>