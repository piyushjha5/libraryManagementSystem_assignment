<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $name = $_POST['name'];
    $serial_no = $_POST['serial_no'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = "UPDATE books_movies SET name='$name', type='$type', status='$status', procurement_date='$date' WHERE serial_no=$serial_no";
    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book/Movie</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h2>Update Book/Movie</h2>
        <form action="update_books.php" method="post">
            <div class="form-group">
                <label for="type">Type:</label>
                <div>
                    <input type="radio" id="book" name="type" value="book" required>
                    <label for="book">Book</label>
                </div>
                <div>
                    <input type="radio" id="movie" name="type" value="movie" required>
                    <label for="movie">Movie</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Book/Movie Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="serial_no">Serial No.:</label>
                <input type="text" id="serial_no" name="serial_no" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <button type="submit">Confirm</button>
            <button type="button" onclick="location.href='admin_dashboard.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
