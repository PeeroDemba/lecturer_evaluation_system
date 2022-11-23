<?php

include "config/noauth.php";
include "config/database.php";

// Login post logic here

if(isset($_POST["submit"])) {
    $sql = "SELECT * FROM student WHERE mat_no='".$_POST["mat_no"]."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!isset($row)) {
        echo "Invalid Credentials!";
        die();
    } else {
        if ($_POST["mat_no"] == $row["mat_no"] && $_POST["password"] == $row["pwd"]) {
            setcookie("login", $row["mat_no"], time()+3600, "/","", true, true); // set login cookie
            header('Location: '.$uri.'/website/');
        } else {
            echo "Invalid Credentials!";
        }
    }
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link href="style_1.css" type="text/css" rel="stylesheet" />
</head>

<body>
<header>
    <h1> ONLINE LECTURER EVALUATION SYSTEM </h1>
</header>
<br>
<br>
<div class="container_1">
<form action="<?php $_PHP_SELF ?>" method="post">
    <label for="mat_no">Matric Number:</label>
    <input type="text" id="mat_no" name="mat_no" /></p>    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" /></p>
    <button id="submit" type="submit" name="submit" value="Submit">Submit</button>
    <a href= registration.php target="_self" class="create_link">Create Account</a>
</form>
</div>
</body>
</html>