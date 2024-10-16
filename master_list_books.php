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
    <title>Master List of Books</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="master-list-container">
        <h1>Master List of Books</h1>
        <nav>
            <ul>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <table>
            <tr>
                <th>Serial No.</th>
                <th>Name of Book</th>
                <th>Author Name</th>
                <th>Category</th>
                <th>Status</th>
                <th>Cost</th>
                <th>Procurement Date</th>
            </tr>
            <?php
            $sql = "SELECT serial_no, name, author_name, category, status, cost, procurement_date FROM books_movies WHERE type='book'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['serial_no']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['author_name']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['cost']}</td>
                        <td>{$row['procurement_date']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No books found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
