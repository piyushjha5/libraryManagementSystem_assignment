<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_name = $_POST['contact_name'];
    $contact_address = $_POST['contact_address'];
    $aadhar_card_no = $_POST['aadhar_card_no'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $membership_type = $_POST['membership'];

    $sql = "INSERT INTO members (first_name, last_name, contact_name, contact_address, aadhar_card_no, start_date, end_date, membership_type) 
            VALUES ('$first_name', '$last_name', '$contact_name', '$contact_address', '$aadhar_card_no', '$start_date', '$end_date', '$membership_type')";
    if ($conn->query($sql) === TRUE) {
        echo "New membership added successfully";
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
    <title>Add Membership</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h2>Add Membership</h2>
        <form action="add_membership.php" method="post">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="contact_name">Contact Name:</label>
                <input type="text" id="contact_name" name="contact_name" required>
            </div>
            <div class="form-group">
                <label for="contact_address">Contact Address:</label>
                <input type="text" id="contact_address" name="contact_address" required>
            </div>
            <div class="form-group">
                <label for="aadhar_card_no">Aadhar Card No.:</label>
                <input type="text" id="aadhar_card_no" name="aadhar_card_no" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="membership">Membership:</label>
                <div>
                    <input type="radio" id="six_months" name="membership" value="six_months" required>
                    <label for="six_months">Six Months</label>
                </div>
                <div>
                    <input type="radio" id="one_year" name="membership" value="one_year" required>
                    <label for="one_year">One Year</label>
                </div>
                <div>
                    <input type="radio" id="two_year" name="membership" value="two_year" required>
                    <label for="two_year">Two Years</label>
                </div>
            </div>
            <button type="submit">Confirm</button>
            <button type="button" onclick="location.href='admin_dashboard.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
