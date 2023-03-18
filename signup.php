<?php
  include 'config.php';
  session_start();
  $name = $_SESSION['name'] = $_POST['name'];
  $email = $_SESSION['email'] = $_POST['email'];
  $password = $_SESSION['password']  = $_POST['password'];


  $sql = "INSERT INTO users (name, email, password)
          VALUES ('$name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

$sql = "SELECT id FROM users WHERE email = '$email';";
    $result = mysqli_query($conn, $sql);
    $id = null;
    if ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
  }
  $_SESSION['id']  = $id;
  
  if (mysqli_query($conn, $sql)) {
    header("location: todo.php?id=$id");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
