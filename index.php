
<?php 
require_once 'includes/configSession.inc.php';//Session initialized
require_once 'includes/signup_view.inc.php';//signup  error display logic
require_once 'includes/login_view.inc.php';//login error display logic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Photographers'_Management_System</title>
</head>
<body>
    <div class="LOGIN">
        <?php
        //signup success message
        if (isset($_SESSION["signup_success"])) {
        echo"<p class='success-msg'>".$_SESSION["signup_success"]."</p>";
        unset($_SESSION["signup_success"]); 

}

// Display any error
    check_signup_errors();
    show_login_success();
    check_login_errors();

//logout message
    if (isset ($_GET['message']) && $_GET['message'] === 'logout'){
        echo "<p style='color:green;'>You have been logged out successfully.</p>";
    }
?>
    <h1>LOGIN</h1>
    
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter your password">
        <div class="button-row">
            <button type="reset" class="login-btn">Reset</button>
            <button type="submit" class="login-btn">Login</button>
            <button type="button" class="login-btn" onclick="alert('Redirect to password recovery')">Forget password</button>
        </div>
    </form>
        <h1>Signup</h1>
    <form action="includes/signup.inc.php"method="post">
        <input type="text" name="FirstName" placeholder="enter your first name">
        <input type="text" name="SecondName" placeholder="enter your second name">
        <input type="text" name="Email" placeholder="enter your Email">
        <input type="password" name="password" placeholder="enter your password">
        <div class="Signup-btn-row">
            <button type="reset" class="signup-btn">Reset</button>
            <button type="submit" class="signup-btn">submit</button>
        </div> 
    </form>
    </div>
</body>
</html>