<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
  }

  $email = $_SESSION['email'];
  $task = $_POST['task'];

  $id = $_SESSION['id'];

  // Validate task
  if (empty($task)) {
    $_SESSION['error'] = 'Task cannot be empty';
    header('Location: todo.php');
    exit;
  }

  // Connect to database
  $conn = mysqli_connect('localhost', 'root', '', 'todolist');
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // Insert task into database
  $sql = "INSERT INTO tasks ( description, user_id) VALUES ('$task',$id)";
  if (mysqli_query($conn, $sql)) {
    header('Location: todo.php');
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
