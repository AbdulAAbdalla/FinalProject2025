<?php
declare(strict_types=1);

function get_admin_by_email(object $pdo, string $email): ?array
{
    $stmt = $pdo->prepare("SELECT * FROM myaccount WHERE Email = :email LIMIT 1");

    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    return $admin ?: null; //Return  null
    
}