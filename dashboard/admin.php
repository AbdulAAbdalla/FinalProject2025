<?php
declare(strict_types=1);

    require_once __DIR__ . '/../includes/configSession.inc.php';

//Access being blocked if not logged in
if (!isset($_SESSION["admin_id"])){
    header("Location: ../adminIndex.php");
    exit();
}

$adminName =htmlspecialchars($_SESSION["login_success"] ?? 'Admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | System Manager</title>
    <link rel="stylesheet" href="css/admin.css"> 
    <style>
        BODY {
            font-family: Arial, sans-serif;
            padding: 40PX;
            background-color: #f5f5f5;
            color: #333;
        }
        .dashboard {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgb(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        

        }

        .nav-links a{
            display:block;
            margin: 10px 0;
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        .logout {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 15px;

        }
    </style>
</head>
<body>
    <div class="dashboard">
    <h2>INVENTORY & PAYMENT TRACKING SYSTEM DASHBOARD</h2>
    <p>
        Welcome, <strong><?= $adminName ?></strong>
        <a href="../../includes/admin_logout.inc.php">Logout</a>
    </p>
    <div class="nav-links">
        <a href="photo_Inventory.php">Client</a>
        <a href="equipment_Inventory.php"> Photo Inventory</a>
        <a href="payment.php"> Equipment</a>
        <a href="reports.php"> Payment</a>
        <a href="reports.php"> Tax</a>
        <a href="reports.php"> Revenue Account</a>
        <a href="reports.php"> Notifications</a>
        <a href="reports.php"> Generate Reports</a>
    </div>
    </div>
</body>
</html>
