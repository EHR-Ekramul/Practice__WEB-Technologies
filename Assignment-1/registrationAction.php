<?php session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $firstName = sanitize($_POST['firstName']);
    $lastName = sanitize($_POST['lastName']);
    $gender = sanitize($_POST['gender']);
    $fatherName = sanitize($_POST['fatherName']);
    $motherName = sanitize($_POST['motherName']);
    $bloodGroup = sanitize($_POST['bloodGroup']);
    $religion = sanitize($_POST['religion']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $website = sanitize($_POST['website']);
    $address = sanitize(sanitize($_POST['street']) . ", " . sanitize($_POST['postCode']) . ", " . $_POST['city'] . ", " . $_POST['country']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $cPassword = sanitize($_POST['cPassword']);

    $_SESSION['firstName'] = "";
    $_SESSION['lastName'] = $lastName;
    $_SESSION['fatherName'] = "";
    $_SESSION['motherName'] = "";
    $_SESSION['email'] = "";
    $_SESSION['phone'] = "";
    $_SESSION['website'] = $website;
    $_SESSION['street'] = "";
    $_SESSION['postCode'] = "";
    $_SESSION['username'] = "";

    $_SESSION['err1'] = "";
    $_SESSION['err2'] = "";
    $_SESSION['err3'] = "";
    $_SESSION['err4'] = "";
    $_SESSION['err5'] = "";
    $_SESSION['err6'] = "";
    $_SESSION['err7'] = "";
    $_SESSION['err8'] = "";
    $_SESSION['err9'] = "";
    $_SESSION['err10'] = "";
    $_SESSION['errPassMatch'] = "";

    $isValid = true;


    // Field Validation
    if (empty($firstName)) { //First Name Validation
        $isValid = false;
        $_SESSION['err1'] = "First name required";
    } else {
        $_SESSION['firstName'] = $firstName;
    }

    if (empty($fatherName)) { //Father Name Validation
        $isValid = false;
        $_SESSION['err2'] = "Father name required";
    } else {
        $_SESSION['fatherName'] = $fatherName;
    }

    if (empty($motherName)) { //Mother Name Validation
        $isValid = false;
        $_SESSION['err3'] = "Mother name required";
    } else {
        $_SESSION['motherName'] = $motherName;
    }

    if (empty($email)) { //Email Validation
        $isValid = false;
        $_SESSION['err4'] = "Please provide email";
    } else {
        $_SESSION['email'] = $email;
    }

    if (empty($phone)) { //Phone/Mobile Validation
        $isValid = false;
        $_SESSION['err5'] = "Phone number required";
    } else {
        $_SESSION['phone'] = $phone;
    }

    if (empty(sanitize($_POST['street']))) { //Street Validation
        $isValid = false;
        $_SESSION['err6'] = "Street address required";
    } else {
        $_SESSION['street'] = $_POST['street'];
    }

    if (empty(sanitize($_POST['postCode']))) { //Post Code Validation
        $isValid = false;
        $_SESSION['err7'] = "Post code required";
    } else {
        $_SESSION['postCode'] = $_POST['postCode'];
    }

    if (empty($username)) { //Username Validation
        $isValid = false;
        $_SESSION['err8'] = "Username required";
    } else {
        $_SESSION['username'] = $_POST['username'];
    }

    if (empty($password)) { //Password Validation
        $isValid = false;
        $_SESSION['err9'] = "Password required";
    } else {
        $_SESSION['password'] = $_POST['password'];
    }

    if (empty($cPassword)) { //Confirm Password Validation
        $isValid = false;
        $_SESSION['err10'] = "Confirm Password required";
    } else {
        $_SESSION['cPassword'] = $_POST['cPassword'];
    }


    // Data Validation Here
    if ($isValid === true) {

        if ($password === $cPassword) {// Checking both password are same

            // Storing information into database
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

            // Fetching email and username to check existance
            $sql1 = "SELECT * FROM `assignment1` WHERE email='$email';";
            $sql2 = "SELECT * FROM `assignment1` WHERE username='$username';";
            $resultEmail = $conn->query($sql1);
            $resultUsername = $conn->query($sql2);

            if ($resultEmail->num_rows > 0) {
                $_SESSION['err4'] = "Email already exist";
                header("Location: registraion.php");
            }
            if ($resultUsername->num_rows > 0) {
                $_SESSION['err8'] = "Username already taken";
                header("Location: registration.php");
            }

            // username and email doesn't exist now insert the info
            $sql = "INSERT INTO assignment1 (firstName, lastName, gender, fatherName, motherName, bloodGroup, religion, email, phone, website, `address`, username, `password`) VALUES ('$firstName', '$lastName', '$gender', '$fatherName', '$motherName', '$bloodGroup', '$religion', '$email', '$phone', '$website', '$address', '$username', '$password')";

            $res = $conn->query($sql);
            if ($res === TRUE) {
                header("Location: login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        } else {
            $_SESSION['errPassMatch'] = "Confirm Password didn't matched";
            header("Location: registration.php");
        }
    } else {
        header("Location: registration.php");
    }
} else {
    echo "Unauthorized Access Request";
}

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>