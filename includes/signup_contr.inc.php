<?php
//THIS FILE IS THE VALIDATOR

declare(strict_types=1);
//The signup_contl.inc.php it check the signup input if they are valid and no empty fields.
function is_input_empty(string $FirstName, string $SecondName, string $Email, string $password)
{
    if(empty($FirstName) || empty($SecondName) || empty($Email) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}
// function to check if the email is correctly typed as an accepted data specified as a rule
function is_Email_invalid(string $Email)
{
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else{
        return false;
    }
}
//function to check if the email exists in the data base and return a true or false
function is_Email_registered(object $pdo, string $Email): bool
{
    return get_Email($pdo, $Email) !== null; 
    }