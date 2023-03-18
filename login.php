<?php
  include 'config.php';

  $email = $_POST['email'];
  $password = $_POST['password'];
  try{

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    session_start();
    $_SESSION['email'] = $email;
  } 
  

   $sql = "SELECT id FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    $id = null;
    if ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
  }
  $_SESSION['id']  = $id;
  header("location: ./todo.php");
} catch (Exception $e) {

    echo "Invalid email or password";
    header("location: ./index.php");

}
?>
