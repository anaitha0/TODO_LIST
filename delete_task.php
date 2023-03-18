<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
  }

  $id = $_GET['id'];

  // Connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'todolist');
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // Delete task from database
  $sql = "DELETE FROM tasks WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
    header('Location: todo.php');
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
