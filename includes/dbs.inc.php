
<?php
$dbs_host = 'localhost';
$dbs_name = 'management_hub';
$dbs_user = 'root';
$dbs_password = "";

try{
    $pdo = new PDO("mysql:host=$dbs_host;dbname=$dbs_name", $dbs_user,$dbs_password);//connection to the database
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//attributes for our pdo connection for catching errors
} catch (PDOException $e) {
    die("failed to connect to database: " . $e->getMessage());
}
