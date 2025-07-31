<?php

//This file is the login database lookup

//declaring the strict types to ensure we have type declarations 
declare(strict_types=1);

function get_user_by_email(object $pdo, string $email): ?array
{
    $query = "SELECT * FROM users WHERE Email = :email;";
    $stmt= $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null; //Return actual result or null
    
}