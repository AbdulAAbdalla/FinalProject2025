<?php

//Setting session cookie parameter before session start  
ini_set('session.use_only_cookies', 1);//
ini_set('session.use_strict_mode', 1);
/*setting security parameters for sessions by setting up the expiry time for th cookie
to deter hackers from getting hold of the session.*/
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/', //sub-paths within the App
    'secure' => false,//change to true when using HTTPS
    'httponly' => true,
    'samesite'=> 'Lax'
    ]);
//Start session
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
//session_start();
/*This if else condition is to go in and check if the session exist and if no create it.
it is also condition to run update after a duration to take cookie and regenerate the id for the cookie*/
if(!isset($_SESSION["last_regeneration"])){
    regenerate_session_id();
}else{
    $interval = 60 * 25;// creating variable called interval initialized to 255 minutes(60seconds * 25 minutes=25minutes lifetime)
    if(time() -  $_SESSION["last_regeneration"] >= $interval){//this is to evaluate if the lifetime of the session is outlived and if so regenerate
        regenerate_session_id();
    }
}
//creating function to handle the regeneration of session id
function regenerate_session_id(): void
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] =time();
}