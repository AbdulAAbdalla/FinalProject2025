<?php
//The signup_view.inc.php is to display what is needed on the screen
declare(strict_types=1);

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        foreach ($_SESSION["errors_signup"] as $error){
            echo"<p class='error-msg'>$error</P>";
        }
        unset($_SESSION["errors_signup"]);
    }
}
    