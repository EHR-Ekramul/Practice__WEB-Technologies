<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {

	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$err1 = "";
	$err2 = "";

	$isValid = true;

	if (empty($username)) {
		$isValid = false;
		$err1 = "Please provide the username";
	}

	if (empty($password)) {
		$isValid = false;
		$err2 = "Please provide the password";
	}

	if ($isValid === true) {
		$db_username = "admin";
		$db_password = "123";

		if ($username === $db_username and $password === $db_password) {
			echo "Login Succssful";
		}
		else {
			echo "Login Failed...!";
		}
	}
	else {
		header("Location: registration.php?msg1=" . $err1 . "&msg2=" . $err2);
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