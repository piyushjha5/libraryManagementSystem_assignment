<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $membership_id = $_POST['membership_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $membership_extension = $_POST['membership_extension'];
    $membership_remove = isset($_POST['membership_remove']) ? 1 : 0;

    if ($membership_remove) {
        $sql = "DELETE FROM members WHERE id=$membership_id";
        $message = "Membership removed successfully";
    } else {
        $sql = "UPDATE members SET start_date='$start_date', end_date='$end_date', membership_type='$membership_extension' WHERE id=$membership_id";
        $message = "Membership updated successfully";
    }

    if ($conn->query($sql) === TRUE) {
        echo $message;
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
    <title>Update Membership</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="form-container">
        <h2>Update Membership</h2>
        <form action="update_membership.php" method="post">
            <div class="form-group">
                <label for="membership_id">Membership Number:</label>
                <input type="number" id="membership_id" name="membership_id" required>
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
                <label for="membership_extension">Membership Extension:</label>
                <div>
                    <input type="radio" id="six_months" name="membership_extension" value="six_months" required>
                    <label for="six_months">Six Months</label>
                </div>
                <div>
                    <input type="radio" id="one_year" name="membership_extension" value="one_year" required>
                    <label for="one_year">One Year</label>
                </div>
                <div>
                    <input type="radio" id="two_year" name="membership_extension" value="two_year" required>
                    <label for="two_year">Two Years</label>
                </div>
            </div>
            <div class="form-group">
                <label for="membership_remove">Membership Remove:</label>
                <input type="radio" id="membership_remove" name="membership_remove" value="1">
                <label for="membership_remove">Yes</label>
            </div>
            <button type="submit">Confirm</button>
            <button type="button" onclick="location.href='admin_dashboard.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
