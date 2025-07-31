<?php
//error reporting
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
session_unset(); //clears all the session variables
session_destroy();// Destroys the session

header("Location: ../dashboard/admindashboard/adminIndex.php?message=admin_logout");//Redirect to adminIndex.php
exit();
