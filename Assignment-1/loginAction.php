<?php session_start();

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
        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "my_app";

        // Create connection
        $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Database connection build complete
        $db_username = "";
        $db_password = "";
        $db_id = "";
        $db_status = "";

        // Accessing DB data
        $sql = "SELECT id, username, `password`, `status` FROM assignment1 WHERE (username='$username')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $db_id = $row["id"];
                $db_username = $row["Username"];
                $db_password = $row["password"];
                $db_status = $row["status"];
                break;
            }
        } else {
            $_SESSION['errUsername'] = "User not found";
            header("Location: login.php");
        }
        $conn->close();

        //echo $db_username . $db_password;
        if ($username === $db_username and $password === $db_password and $db_status == 1) {
            $_SESSION["loggedIn"] = true;
            setcookie("user", $db_id, time() + (86400 * 30), "/");
            header("Location: dashboard.php");
        } else if ($db_status == 0) {
            $_SESSION['loginStatus'] = "User is deactivated...!";
            header("Location: login.php");
        } else {
            $_SESSION['loginStatus'] = "Wrong username or password...!";
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
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