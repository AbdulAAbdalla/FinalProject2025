
<?php 

require_once '../../includes/configSession.inc.php';//Session initialized
require_once 'my_account.view.php';//login error display logic

//Pulling error and success messages from login session
$errors =($_SESSION["errors_login"]) ?? [];
$sucess =($_SESSION["login_success"]) ?? null;

//After displaying the messages you clear them
unset($_SESSION["errors_login"]);
unset($_SESSION["login_success"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardstyle.css">
    <title>INVENTORY & PAYMENT TRACKING SYSTEM</title>
</head>
<body>
    <div class="ADMIN_LOGIN">
<?php
        

// Display any error
    
    show_login_success();
    check_login_errors();

//logout message
   if (isset($_GET['message']) && $_GET['message'] === 'admin_logout') {
    echo "<p style='color:green; '>Admin has been logged out successfully.</p>";   
}
?>
   <h1>SystemAdmin_Login</h1> 
   <form action="/FinalProject2025/dashboard/admindashboard/login.admin.php" method="post">

    <!--<form action="login.admin.php" method="post">-->
        <input type="text" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter your password">
        <div class="button-row">
            <button type="reset" class="login-btn">Reset</button>
            <button type="submit" class="login-btn">Login</button>    
        </div>
    
    </form> 
    <!-- separate form for "forget password" button -->
    <form action="send_reset_notice.php" method="post" style="display:inline;">
        <input type="hidden" name="request_from" value="admin login">
        <button type="submit" class="login-btn">Forget password</button>
    </form>
        
    </div>
</body>
</html>
