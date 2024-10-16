<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="maintenance-container">
        <h1>Maintenance</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <h2>Membership</h2>
        <button onclick="location.href='add_membership.php'">Add Membership</button>
        <button onclick="location.href='update_membership.php'">Update Membership</button>

        <h2>Books/Movies</h2>
        <button onclick="location.href='add_books.php'">Add Books/Movies</button>
        <button onclick="location.href='update_books.php'">Update Books/Movies</button>

        <h2>User Management</h2>
        <button onclick="location.href='add_user.php'">Add User</button>
        <button onclick="location.href='update_user.php'">Update User</button>
    </div>
</body>
</html>
