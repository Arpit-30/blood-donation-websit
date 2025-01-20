<?php
// Start session if needed
session_start();
require 'dbcon.php'; // Include your database connection

// Handle emergency blood request submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $blood_type = $_POST['blood_type'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $urgency = $_POST['urgency'];
    $message = $_POST['message'];

    // Insert emergency request into the database
    $insertQuery = "INSERT INTO emergency_requests (name, blood_type, location, phone, urgency, message) 
                    VALUES ('$name', '$blood_type', '$location', '$phone', '$urgency', '$message')";
    if (mysqli_query($conn, $insertQuery)) {
        echo "<script>alert('Emergency request submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error:');</script> " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Blood Request | Blood Donation</title>
    <link rel="stylesheet" href="it's_an_emergency.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <header>
        <div class="container">
            
            <?php 
            include("header.php")
            ?>
        </div>
    </header>

    <section class="emergency-section">
        <div class="container">
            <h2>Emergency Blood Request</h2>
            <p>If you are in need of urgent blood, please fill out the form below. Our team will reach out to available donors immediately.</p>
            
            <form method="POST" class="emergency-form">
                <label for="name">Your Name:</label>
                <input type="text" name="name" required><br><br>
                
                <label for="blood_type">Blood Group Required:</label>
                <select name="blood_type" required>
                    <option value="A+ve">A+ve</option>
                    <option value="B+ve">B+ve</option>
                    <option value="O+ve">O+ve</option>
                    <option value="AB+ve">AB+ve</option>
                    <option value="A-ve">A-ve</option>
                    <option value="B-ve">B-ve</option>
                    <option value="O-ve">O-ve</option>
                    <option value="AB-ve">AB-ve</option>
                </select><br><br>

                <label for="location">Location:</label>
                <input type="text" name="location" required><br><br>

                <label for="phone">Contact Number:</label>
                <input type="text" name="phone" required><br><br>
                
                <label for="urgency">Urgency Level:</label>
                <select name="urgency" required>
                    <option value="High">High (within 24 hours)</option>
                    <option value="Medium">Medium (within 48 hours)</option>
                    <option value="Low">Low (within a week)</option>
                </select><br><br>

                <label for="message">Additional Information:</label>
                <textarea name="message" rows="5"></textarea><br><br>
                
                <button type="submit" name="submit" class="btn">Submit Request</button>
            </form>
        </div>
    </section>

    <?php 
include("footer.php")
?>
</body>
</html>
