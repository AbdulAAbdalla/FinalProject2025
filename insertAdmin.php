<?php

//ADDING SYSTEM ADMINISTRATOR MANUALLY

require_once __DIR__ . '/includes/dbs.inc.php'; // connecting to the database

// System Admin details

$firstName = "Ali";
$secondName = "Abdallah";
$email = "admin@management.co.ke";
$idOrPassport = "12345678";
$telephone = "0009872362020202020202784";
$password = "12345";
$status = "active";
$photo = null; 
$gender = "male";
$role = "Admin";

// Hash password
$options = ['cost' => 12];
$hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

try {
    $sql = "INSERT INTO myaccount (
                FirstName, SecondName, email, ID_or_passport,
                Telephone, password, status, photo, gender, role
            ) VALUES (
                :FirstName, :SecondName, :email, :ID_or_passport,
                :Telephone, :password, :status, :photo, :gender, :role
            )";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':FirstName'      => $firstName,
        ':SecondName'     => $secondName,
        ':email'          => $email,
        ':ID_or_passport' => $idOrPassport,
        ':Telephone'      => $telephone,
        ':password'       => $hashedPassword,
        ':status'         => $status,
        ':photo'          => $photo,
        ':gender'         => $gender,
        ':role'           => $role
    ]);

    echo "Admin inserted successfully!";
} catch (PDOException $e) {
    echo "Error inserting admin: " . $e->getMessage();
}
