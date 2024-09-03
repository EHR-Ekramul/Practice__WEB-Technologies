<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form method="post" novalidate action="../controller/registrationAction.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if(empty($_SESSION['email'])){echo "";}else{echo $_SESSION['email'];} ?>">
        <span>
            <?php
                if(empty($_SESSION['err1'])){
                    echo "";
                }else{
                    echo $_SESSION['err1'];
                }
            ?>
        </span>
        <br><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <span>
            <?php
                if(empty($_SESSION['err2'])){
                    echo "";
                }else{
                    echo $_SESSION['err2'];
                }
            ?>
        </span>
        <br><br>

        <label for="cPassword">Confirm Password</label>
        <input type="password" name="cPassword" id="cPassword">
        <span>
            <?php
                if(empty($_SESSION['err3'])){
                    echo "";
                }else{
                    echo $_SESSION['err3'];
                }
            ?>
        </span>
        <br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>