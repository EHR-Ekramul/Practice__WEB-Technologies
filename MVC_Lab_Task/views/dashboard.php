<?php session_start();

if (!isset($_SESSION['loggedIn']) or !isset($_COOKIE['user'])) {
  header("Location: ../views/login.php");
  exit();
}
$user_username = $_COOKIE['user'];
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
</head>

<body>
  <h1>Dashboard</h1>
  <h3>Hello, <?php echo $user_username; ?></h3>
  <p>username -- <?php echo $user_username; ?></p>
  <hr>

</body>

</html>