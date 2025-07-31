<?php
//The login_view.inc.php is to display login-related messages or errors
declare(strict_types=1);
//checking if there is active session if not session starts
if (session_status() === PHP_SESSION_NONE){
    require_once 'configSession.inc.php';
}
function check_login_errors() {
    if (isset($_SESSION['errors_login'])) {
        foreach ($_SESSION["errors_login"] as $error){
            echo "<p class='error-msg'>$error</p>";
        }
        unset($_SESSION["errors_login"]);//this clear error after displaying
    }
}
function show_login_success(){
    if (isset($_SESSION["login_success"])){
        echo "<p class='success-msg'>" . $_SESSION["login_success"] . "</p>";
        unset($_SESSION["login_success"]);
    }
}   