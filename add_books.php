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
    $procurement_date = $_POST['procurement_date'];
    $quantity = $_POST['quantity'] ? $_POST['quantity'] : 1;

    $sql = "INSERT INTO books_movies (type, name, procurement_date, quantity) 
            VALUES ('$type', '$name', '$procurement_date', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        echo "New item added successfully";
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
    <title>Add Book/Movie</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h2>Add Book/Movie</h2>
        <form action="add_books.php" method="post">
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
                <label for="procurement_date">Date of Procurement:</label>
                <input type="date" id="procurement_date" name="procurement_date" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity/Copies:</label>
                <input type="number" id="quantity" name="quantity" value="1" required>
            </div>
            <button type="submit">Confirm</button>
            <button type="button" onclick="location.href='admin_dashboard.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
