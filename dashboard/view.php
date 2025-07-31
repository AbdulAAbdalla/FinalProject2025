<?

require_once' ../include/configSession.inc.php';
//restricted access to Admin only
if (!isset($_SESSION["user_id"])){
    header("Location: ../index.php");//redirect to Home page
        exit();
}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Dashboard</title>
</head>
<body>
    <h2> View Page</h2>
    <p>Welcome to interact with the system view page! </p>
    <p>Click to view the modules of preference:</p>

    <ul>
        <li><a href="photo_inventory.php">Photo Inventory</a></li>
        <li><a href="equipment_inventory.php">Equipment Inventory</a></li>
        <li><a href="payment.php">Payment</a></li>
        <li><a href="reports.php">Reports</a></li>

        <p><a href="../includes/logout.inc.php">Logout</a></p>
    </ul>
</body>
</html>

