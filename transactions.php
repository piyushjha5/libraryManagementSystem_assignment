<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="transactions-container">
        <h1>Transactions</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <ul>
            <li><a href="check_availability.php">Is Book Available?</a></li>
            <li><a href="issue_book.php">Issue Book</a></li>
            <li><a href="return_book.php">Return Book</a></li>
            <li><a href="pay_fine.php">Pay Fine</a></li>
        </ul>
    </div>
</body>
</html>
