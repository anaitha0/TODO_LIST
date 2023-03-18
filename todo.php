<?php
  include 'config.php';
  session_start();
  $id = $_SESSION['id'];
  $sql = "SELECT * FROM tasks WHERE user_id = $id;";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Todo List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>
<body>
  <h1>Todo List</h1>
  <form method="post" action="add_task.php" onsubmit="return validateTask()">
    <label for="task">Add a new task:</label>
    <input type="text" name="task" id="task">
    <span id="task-error"></span>
    <input type="submit" value="Add">
  </form>
  <table>
    <thead>
      <tr>
        <th>Task</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['description']; ?></td>
          <td><a href="delete_task.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <form method="post">
  <input type="submit" name="logout" value="Logout">
</form>

<?php
  if(isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
    session_destroy();
    header("Location: index.php");
    exit;
  }
?>
</body>
</html>
