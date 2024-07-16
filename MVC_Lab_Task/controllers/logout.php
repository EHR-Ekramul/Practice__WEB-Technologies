<?php
session_start();
setcookie("user", "", time() - 12, "/");
session_destroy();

header("Location: ../views/login.php");

?>