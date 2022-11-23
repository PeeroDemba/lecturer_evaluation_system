<?php
  require_once "./config/auth.php";

  // Handle post request here
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $insertNewEvaluationSQL = "INSERT INTO evaluation (lecturerID, studentID, semester, academic_session, dept, course_code, course_title, course_unit) VALUES (1, 1,'".$data["academic_semester"]."','".$data["academic_session"]."','".$data["dept"]."','".$data["course_code"]."','".$data["course_title"]."','".$data["unit"]."');";

    if($conn->query($insertNewEvaluationSQL) === true) {
      $sql = "";
      foreach($data["qualities"] as $quality => $rate) {
        $last_id = $conn->insert_id;
        $sql .= "INSERT INTO quality (quality_title, rating, evaluationID) VALUES ('$quality', '$rate', '$last_id');";
      }
      if($conn->multi_query($sql) === true) {
        echo json_encode([
          "success" => true,
          "message" => "New Evaluation done!"
        ]);
      } else {
        echo json_encode([
          "success" => false,
          "message" => "Server Error"
        ]);
      }
    } else {
      echo json_encode([
        "success" => false,
        "message" => "Server Error"
      ]);
    }
    
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style_2.css" type="text/css">
  <title>Evaluate a Lecturer</title>
</head>
<body>
  <form onsubmit="submitEvaluation()">
    <p><b>Academic Session:</b> <input type="text" name="academic_session" id="academic_session" placeholder="Enter Session"></p>
    <p><b>Semester:</b><input type="text" name="academic_semester" id="academic_semester" placeholder="Enter Semester"></p>
    <p><b>Name of Lecturer:</b><input type="text" name="lecturer_email" id="emailLecturer" placeholder="Enter Lecturer Name"></p>
    <p><b>Department:</b><input type="text" name="dept" id="dept" placeholder="Enter Dept"></p>
    <p><b>Course Title:</b><input type="text" name="course_title" id="course_title" placeholder="Enter Course Title"></p>
    <p><b>Course Code:</b><input type="text" name="course_code" id="course_code" placeholder="Enter Course Code"></p>
    <p><b>Course Unit:</b><input type="number" name="unit" id="unit"></p>
    
    <table>
      <tr>
        <th>Characteristics</th>
        <th>5 - Excellent</th>
        <th>4 - Good</th>
        <th>3 - Satisfactory</th>
        <th>2 - Needs Improvement</th>
        <th>1 - Poor</th>
      </tr>
    </table>

    <button id="submit" type="submit" value="Submit">Submit</button>
    <button id="button" type="button" value="Back"><a href="student_homepage.php" target=_self>Back To Homepage</a></button>
  </form>

  <script src="./evaluate.js"></script>
</body>
</html>