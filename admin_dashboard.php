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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.admin-dashboard {
    max-width: 800px;
    margin: 50px auto;
    background: #ffffff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1, h2 {
    text-align: center;
    color: #333333;
}

nav ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin: 0 10px;
}

nav ul li a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

nav ul li a:hover {
    color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

button {
    display: block;
    width: 100%;
    padding: 10px;
    margin: 20px 0;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>
<body>
    <div class="admin-dashboard">
        <h1>Welcome, Admin!</h1>
        <nav>
            <ul>
                <li><a href="maintenance.php">Maintenance</a></li>
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
