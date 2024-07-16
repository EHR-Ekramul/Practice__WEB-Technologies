<?php

function isEmailExist($email)
{
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
    $sql1 = "SELECT * FROM `assignment1` WHERE email='$email';";
    $resultEmail = $conn->query($sql1);
    $conn->close();

    if ($resultEmail->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}
function isUsernameExist($username)
{
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
    $sql2 = "SELECT * FROM `assignment1` WHERE username='$username';";
    $resultUsername = $conn->query($sql2);
    $conn->close();

    if ($resultUsername->num_rows > 0) {
        return false;
    } else {
        return true;
    }
}
function createUser($firstName, $lastName, $gender, $fatherName, $motherName, $bloodGroup, $religion, $email, $phone, $website, $address, $username, $password)
{
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
    $sql = "INSERT INTO assignment1 (firstName, lastName, gender, fatherName, motherName, bloodGroup, religion, email, phone, website, `address`, username, `password`) VALUES ('$firstName', '$lastName', '$gender', '$fatherName', '$motherName', '$bloodGroup', '$religion', '$email', '$phone', '$website', '$address', '$username', '$password')";

    $res = $conn->query($sql);
    $conn->close();

    if ($res === TRUE) {
        return true;
    } else {
        return false;
    }
}

function validateUser($username, $password)
{
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
    $userData = array();

    // Accessing DB data
    $sql = "SELECT id, username, `password`, `status` FROM assignment1 WHERE (username='$username' and `password`='$password')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $userData["id"] = $row["id"];
            $userData["username"] = $row["Username"];
            $userData["password"] = $row["password"];
            $userData["status"] = $row["status"];
            break;
        }
    } else {
        return $userData;
    }
    $conn->close();

    return $userData;
}

?>