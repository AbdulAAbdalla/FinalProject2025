<?php
//This file is the controller for login logic
declare(strict_types=1);
require_once 'configSession.inc.php';

 //Require the login controller and model logic
    require_once 'login_contr.inc.php';
    require_once 'dbs.inc.php';// this is the database connection
    require_once 'login_model.inc.php';
    
//Checking if form was submitted from the login page 
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
        header("Location: ../index.php");
        exit();
    }

    //Search for user in database
    $user = get_user_by_email($pdo, $email);

    if(!$user || !password_verify($password, $user["Password"])){
        $_SESSION["errors_login"] = ["Enter correct email or password."];
        header("Location: ../index.php");
        exit();
    }
    //Successful login 
    $_SESSION["login_success"] = "Welcome back," . htmlspecialchars($user["FirstName"]) ."!";
    $_SESSION["user_id"] =$user["id"];
    $_SESSION["email"] =$user["Email"];
   // $_SESSION["login_success"] = "Login successful.Welcome" . $user["FirstName"];

    header("Location:../dashboard/index.php"); //This directs the user to the dashboard.
        exit();
    }
