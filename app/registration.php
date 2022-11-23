<?php
    require_once "config/noauth.php";
    require_once "config/database.php";
?>

<!DOCTYPE html>
<html>
<?php
                
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $matno = $_POST["mat_no"];
        $password = $_POST["password"];
        $dept = $_POST["dept"];
        $gender = $_POST["gender"];

        $sql = "INSERT INTO student (FullName, mat_no, gender, pwd, dept) VALUES ('$name', '$matno', '$gender', '$password', '$dept');";
        if ($conn->query($sql) === TRUE) {
            echo "Student Registered Successfully";            
            $conn->close();
            die();
        } else {
            $conn->close();
            echo "Error: Couldn't Register User";
            // echo "Error: " . $sql . "<br>" . $conn->error;
            die();
        }
          
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="style_1.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <header>
        <h1>ACCOUNT PROFILE</h1>
    </header>
    <div class="container_2">
        <form action="" method="POST">
            <label for="name">Full Name:</label><input type="text" id="name" name="name">
            <label for="mat_no">Matric Number:</label><input type="text" id="mat_no" name="mat_no">
            <label for="dept">Department:</label><input type="text" id="dept" name="dept">
            <label for="gender">Gender:</label><input type="text" id="gender" name="gender">
            <label for="password">Password:</label><input type="password" id="password" name="password">
            <button id="submit" type="submit" value="Submit" name="submit" formaction="<?php $_SERVER["PHP_SELF"]; ?>">Submit</button>
            <button id="reset" type="reset" value="Reset">Reset</button>
            <button id="button" type="button" value="Back"><a href="index.php" class="ex" target=_self>Back To Login</a></button>
        </form>
    </div>
</body>
</html>