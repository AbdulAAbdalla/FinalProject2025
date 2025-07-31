<?php
declare(strict_types=1);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//This file is the controller for login logic
    require_once __DIR__ . '/../../includes/configSession.inc.php';
 //Require the login controller, and model logic to connect to the database 
    require_once __DIR__ . '/my_account.contr.php';
    require_once __DIR__ . '/../../includes/dbs.inc.php';
    require_once __DIR__ . '/my_account.model.php';
    
//Checking if form was submitted from the login page usingthe the correct methotd POST.
if ($_SERVER["REQUEST_METHOD"]=== "POST"){
    $email= $_POST["email"] ?? '';
    $password= $_POST["password"] ?? '';

    //handling error of empty inputs and validating inputs
    $errors =[];
    if (is_login_input_empty($email, $password)){
        $errors[] = "Please fill in all fields.";
    }elseif (is_login_email_invalid($email)){
        $errors[] = "please enter a valid email address.";
    }
    if(!empty($errors)){
        $_SESSION["errors_login"] = $errors;
        header("Location: adminIndex.php");
        exit();
    }

     //DEBUG fetch  admin record
    $admin = get_admin_by_email($pdo, $email);

    //Search for admin in database
    
    if (!$admin) {
    echo "Admin not found.";
    exit();

    if (!password_verify($password, $admin["password"])) {
    echo "Incorrect password.";
    exit();
}


// Debug password verification
/*var_dump(password_verify($password, $admin["password"]));
exit();*/

}
    //Checking if Admin's Status in the database is set to Active 
    if(strtolower($admin["status"]) !== 'active') {
        $_SESSION["errors_login"] = ["Access denied.Your account status is not set to active."];
        header("Location: adminIndex.php");
        exit();
    }
    //Successful login 
   // $_SESSION["login_success"] = "Welcome back," . htmlspecialchars($admin["FirstName"]) ."!";
    $_SESSION["admin_id"] =$admin["id"];
    session_regenerate_id(true);//Regenerate session ID after successful login to deter session fixation attacks,good security practice
    $_SESSION["email"] =$admin["Email"];
    $_SESSION["login_success"] = "Welcome "  .  htmlspecialchars( $admin["FirstName"]) . " as the Admin";

    header("Location: ../admin.php"); //This directs the user to the dashboard.
        exit();
}
