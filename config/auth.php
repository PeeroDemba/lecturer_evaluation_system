<?php
  require_once "./config/database.php";
  $user = null;
  if(isset($_COOKIE["login"])) {
    $sql = "SELECT * FROM student WHERE mat_no='".$_COOKIE["login"]."'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    if(!$user) {
      header('Location: '.$uri.'/website/logout.php');
    }
  } else {
    header('Location: '.$uri.'/website/login.php');
  }
