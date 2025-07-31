<?php

//THIS FILE IS THE Database lookup

//declaring the strict types to ensure we have type declarations 
declare(strict_types=1);
//The signup_model.inc.php file is the file that interrogated the database to retrieve information
function get_Email(object $pdo, string $Email): ?array
{
    $query = "SELECT Email FROM users WHERE Email = :Email;";
    $stmt= $pdo->prepare($query);
    $stmt->bindParam(':Email', $Email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null; //Return actual result  or null
    
}
