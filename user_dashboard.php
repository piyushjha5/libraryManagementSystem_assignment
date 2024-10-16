<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="user-dashboard">
        <h1>Welcome, User!</h1>
        <nav>
            <ul>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <h2>Product Details</h2>
        <table>
            <tr>
                <th>Code No. From</th>
                <th>Code No. To</th>
                <th>Category</th>
            </tr>
            <?php
            include 'config.php';
            $sql = "SELECT code_no_from, code_no_to, category FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['code_no_from']}</td>
                        <td>{$row['code_no_to']}</td>
                        <td>{$row['category']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No products found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
