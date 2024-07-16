<?php session_start();
require '../models/users.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $_SESSION['errUsername'] = "";
    $_SESSION['errPassword'] = "";
    $_SESSION['loginStatus'] = "";
    $_SESSION['Username'] = "";

    $isValid = true;

    if (empty($username)) {
        $isValid = false;
        $_SESSION['errUsername'] = "Please provide the username";
    } else {
        $_SESSION['Username'] = $username;
    }

    if (empty($password)) {
        $isValid = false;
        $_SESSION['errPassword'] = "Please provide the password";
    }

    if ($isValid === true) {
        $userData = validateUser($username, $password);
        if (count($userData) < 0) {
            $_SESSION['errUsername'] = "User not found";
            header("Location: ../views/login.php");
        }
        $db_username = $userData["username"];
        $db_password = $userData["password"];
        $db_id = $userData["id"];
        $db_status = $userData["status"];

        //echo $db_username . $db_password;
        if ($username === $db_username and $password === $db_password and $db_status == 1) {
            $_SESSION["loggedIn"] = true;
            setcookie("user", $db_id, time() + (86400 * 30), "/");
            header("Location: ../views/dashboard.php");
        } else if ($db_status == 0) {
            $_SESSION['loginStatus'] = "User is deactivated...!";
            header("Location: ../views/login.php");
        } else {
            $_SESSION['loginStatus'] = "Wrong username or password...!";
            header("Location: ../views/login.php");
        }
    } else {
        header("Location: ../views/login.php");
    }
} else {
    echo "Unauthorized Access";
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>