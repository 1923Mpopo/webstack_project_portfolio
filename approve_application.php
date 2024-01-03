<?php
// Include your database connection here
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $certificate_number = $_POST["certificate_number"];

    // Perform the approval and send a notification here
    // For example, insert the approval into your notifications table

    $message = "Your application with certificate number " . $certificate_number . " has been approved. Please use this number to view and download your certificate.";

    $sql = "INSERT INTO notifications (email, message) VALUES ('$email', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
