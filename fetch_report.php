<?php
$conn = mysqli_connect('localhost', 'root', ' ', 'formdb');
if (!$conn) {
  die('Database connection error: ' . mysqli_connect_error());
}
$email = $_GET['email'];

$sql = "SELECT health_report FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $healthReport = $row['health_report'];

  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment; filename="' . $healthReport . '"');
  readfile('uploads/' . $healthReport);
} else {
  echo 'No health report found for the given email ID.';
}

mysqli_close($conn);
?>