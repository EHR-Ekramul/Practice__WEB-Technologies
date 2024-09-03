<?php
session_start();

$email = sanitize($_POST['email']);
$password = sanitize($_POST['password']);
$cPassword = sanitize($_POST['cPassword']);

$_SESSION['err1'] = "";
$_SESSION['err2'] = "";
$_SESSION['err3'] = "";
$_SESSION['email'] = $email;

$isValid = true;


if(empty($email)){
    $_SESSION['err1'] = "Email is required";
    $isValid = false;
}
if(empty($password)){
    $_SESSION['err2'] = "Password is required";
    $isValid = false;
}
if(empty($cPassword)){
    $_SESSION['err3'] = "Confirm Password is required";
    $isValid = false;
}

if($isValid){
    if($password === $cPassword){
        echo "Registration Successful";
    }
    else{
        $_SESSION['err3'] = "Password didn't matched";
        header("Location: ../view/registration.php");
    }
}
else{
    header("Location: ../view/registration.php");
}


function sanitize($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>