<?php
//THIS FILE IS THE CONTROLLER

//This is is to report any error 
ini_set('display_errors', 1);//
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//initializing secure session before using $_SESSION
require_once 'configSession.inc.php';

//This is to check if the user accessed correctly using the set POST method for signup form
if($_SERVER["REQUEST_METHOD"] ==="POST"){
    $FirstName = $_POST["FirstName"];
    $SecondName = $_POST["SecondName"];
    $Email = $_POST["Email"];
    $password = $_POST["password"];
    try{
        require_once'dbs.inc.php';
        require_once'signup_model.inc.php';
        require_once'signup_contr.inc.php';
        //require_once'configSession.inc.php';

        //ERROR HANDLER
$errors =[];

        if (is_input_empty($FirstName, $SecondName, $Email, $password)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_Email_invalid($Email)) {
            $errors["Invalid_Email"] = "Email entered is invalid!";
        }
        if (is_Email_registered($pdo, $Email)){ 
            $errors["Email_exist"] = "That Email already exist!";
        }

        //Handle errors if any
        if (!empty($errors)) {
            $_SESSION["errors_signup"] = $errors;
            //this is to send back the data entered by user into the form fields.
            $signupData=[
                "FirstName" =>$FirstName,
                "SecondName"=>$SecondName,
                "Email"=>$Email
            ];
            $_SESSION["signup_data"] =   $signupData;
            header("Location: ../index.php");
            die();
        }
        
        //If no errors,continue to insert into database
        $query = "INSERT INTO users (FirstName, SecondName, Email, Password)
        VALUES (:FirstName, :SecondName, :Email, :Password)";

        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 13
        ];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        

        //bind parameters
        $stmt->bindParam(":FirstName", $FirstName);
        $stmt->bindParam(":SecondName", $SecondName);
        $stmt->bindParam(":Email", $Email);
        $stmt->bindParam(":Password", $hashedPassword);
        
        //Execute query
        $stmt->execute();
        

        //set success message
        $_SESSION["signup_success"]= "Signup Successful";
        header("Location: ../index.php");
        $pdo=null; // closing up connection to database
        $stmt=null; // closing up the html prepared statement
        die(); //kill the process

    } catch(PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}else{
    //Redirect illegal access to homepage
    header("Location: ../index.php");
    die();//this is to kill the illegal session and take user back to index.php file home page
}