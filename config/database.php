<?php
  define("DB_HOST", "localhost");
  define("DB_USER", "peero");
  define("DB_PASS", "00000");
  define("DB_NAME", "lecturer_evaluation");

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  
  if($conn->connect_error){
    die("CONNECTION FAILED " . $conn->connect_error);
  }

  // echo "CONNECTED";

?>