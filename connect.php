<?php
$conn = mysqli_connect('localhost', 'root', ' ', 'formdb');
if (!$conn) {
  die('Database connection error: ' . mysqli_connect_error());
}
$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
$weight=$_POST['weight'];
$healthReport = $_FILES['health_report']['name'];
$healthReportTmp = $_FILES['health_report']['tmp_name'];


$uploadDirectory = 'uploads/';
$uploadPath = $uploadDirectory . $healthReport;
move_uploaded_file($healthReportTmp, $uploadPath);

$sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$healthReport')";
if (mysqli_query($conn, $sql)) {
  echo 'Data inserted successfully.';
} else {
  echo 'Error: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>

