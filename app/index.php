<?php include "config/auth.php" ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_1.css" type="text/css">
<title>Login Page</title>
</head>

<body>
<div class="container_2">
<header>
    <h1> ONLINE LECTURER EVALUATION SYSTEM </h1>
</header>
    <h2>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Welcome <?php echo $user["FullName"] ?></h1>
    <a href="./student_homepage.php" class="btn1">Survey Panel</a>
    <br>
    <a href="./logout.php" class="btn2">Logout</a>
</div>
</body>
</html>