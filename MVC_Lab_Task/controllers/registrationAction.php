<?php session_start();

require '../models/users.php';

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
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['err4'] = "Enter Valid Email";
            $isValid = false;
        }
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
    if (!($password === $cPassword)) {// Checking both password are same or not
        $_SESSION['errPassMatch'] = "Confirm Password didn't matched";
        $isValid = false;
    }


    // Data Validation Here
    if ($isValid === true) {
        if (isEmailExist($email)) {
            $_SESSION['err4'] = "Email already exist";
            header("Location: ../views/registraion.php");
        } elseif (isUsernameExist($username)) {
            $_SESSION['err8'] = "Username already taken";
            header("Location: ../views/registration.php");
        } else {
            $userCreationStatus = createUser($firstName, $lastName, $gender, $fatherName, $motherName, $bloodGroup, $religion, $email, $phone, $website, $address, $username, $password);

            if ($userCreationStatus == true) {
                header("Location: ../views/login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        header("Location: ../views/registration.php");
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