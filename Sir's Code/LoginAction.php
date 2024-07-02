<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$_SESSION['err1'] = "";
	$_SESSION['err2'] = "";
	$_SESSION['err3'] = "";
	$_SESSION['uname'] = "";

	$isValid = true;

	if (empty($username)) {
		$isValid = false;
		$_SESSION['err1'] = "Please provide the username";
	}
	else {
		$_SESSION['uname'] = $username;
	}

	if (empty($password)) {
		$isValid = false;
		$_SESSION['err2'] = "Please provide the password";
	}

	if ($isValid === true) {
		$db_username = "admin";
		$db_password = "123";

		if ($username === $db_username and $password === $db_password) {
			$_SESSION["loggedIn"] = true;
			header("Location: dashboard.php");
		}
		else {
			$_SESSION['err3'] = "Login Failed...!";
			header("Location: login.php");
		}
	}
	else {
		header("Location: login.php");
	}
}
else {
	echo "Unauthorized Access";
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>