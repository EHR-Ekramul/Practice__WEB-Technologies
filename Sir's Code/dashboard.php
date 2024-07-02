<?php session_start(); 

if (!isset($_SESSION['loggedIn'])) {
	header("Location: login.php");
	exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>

	<h1>Dashboard</h1>

	<p>Hello, <?php echo $_SESSION['uname']; ?></p>

	<hr>

	<a href="Logout.php">Logout</a>

</body>
</html>