<?php
//THIS FILE IS THE VALIDATOR

declare(strict_types=1);
//checking if the email or password is empty
function is_login_input_empty(string $email, string $password): bool{
    //return empty($email) || empty($password);

    /*This validation is necessary to guard against invalid injection at 
    the time of login, ensures only valid data accessed,it is a security  feature at login*/
    if(empty($email) || empty($password)){
        return true;
    }
    else{
        return false;
    }
}
// function to check if the email is correctly typed as an accepted data specified as a rule
function is_login_email_invalid(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else{
        return false;
    }
}
