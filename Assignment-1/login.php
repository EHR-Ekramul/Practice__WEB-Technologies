<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>

    <fieldset>
        <legend>Login</legend>
        <form action="LoginAction.php" method="post" novalidate>

            <label for="username">Username : </label>
            <input type="text" name="username" id="username"
                value="<?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : "" ?>">
            <label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['errUsername']) ? $_SESSION['errUsername'] : "" ?></label>
            <br><br>

            <label for="password">Password : </label>
            <input type="password" name="password" id="password">
            <label for="error"
                style="color: red; font-size: small;"><?php echo isset($_SESSION['errPassword']) ? $_SESSION['errPassword'] : "" ?></label>
            <br><br>

            <input type="submit" value="Login">
            <input type="submit" name="signup" id="signup" formaction="registration.php" value="Sign Up">

        </form>
    </fieldset>

    <?php echo isset($_SESSION['loginStatus']) ? $_SESSION['loginStatus'] : "" ?>
</body>

</html>