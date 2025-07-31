<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/configSession.inc.php';

if (!isset($_SESSION["admin_id"])){
    header("Location: admindashboard/adminIndex.php");
    exit();
}
$adminName =$_SESSION["login_success"] ?? 'Welcome Admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Management</title>
</head>
<body style="font-family: Arial; text-align: center; margin-top: 50px;">

    <h2>CLIENT MANAGEMENT DASHBOARD</h2>

    <p>Hello, <?=htmlspecialchars($adminName) ?>. The Client Module is under construction.</p>

    <p><a href="../admin.php">Back to Admin Dashboard.</a></p>

</body>
</html>