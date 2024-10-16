<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="reports-container">
        <h1>Reports</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        
        <h2>Master Lists</h2>
        <ul>
            <li><a href="master_list_books.php">Master List of Books</a></li>
            <li><a href="master_list_movies.php">Master List of Movies</a></li>
            <li><a href="master_list_memberships.php">Master List of Memberships</a></li>
        </ul>

        <h2>Active Issues</h2>
        <ul>
            <li><a href="active_issues.php">Active Issues</a></li>
            <li><a href="overdue_returns.php">Overdue Returns</a></li>
            <li><a href="pending_issue_requests.php">Pending Issue Requests</a></li>
        </ul>
    </div>
</body>
</html>
