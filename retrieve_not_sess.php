<?php
session_start();
include 'config.php';

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    // echo "Welcome " . $_SESSION["email"];
} else {
    header('location: login_functionality.php'); // Redirect to the login page if not logged in
    exit(); // Terminate the script to prevent further execution
}

?>

<!DOCTYPE >
<html>
    <head>
    <title> online birth certificate-user </title>
    <link rel="stylesheet" type="text/css" href="myStylesheet.css"> 
    <style>
        /* Style for the message box */
        td.message-box {
            /* border: 1px solid #ccc; */
            border-radius: 5px;
            padding: 10px;
            background-color: #f4f4f4;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
<div class="hero">
                <nav>
                <h2 class="logo">
                <img src="images/homeAffairLogo.jpg" height="90px">
                </h2>
                
                <ul>
                    <li><a href="application_form.php">Application Form</a></li>
                    <li><a href="uploadfile.php">Upload file</a></li>
                    <li><a href="view_certificate.php">View Certificate</a></li>
            
                </ul>
                <!-- <button type="button"><a href="Register.php">Get Started</a></button> -->
                <a href="retrieve_not_sess.php"><img src="images/notifications.png" height="25px" id="notification"></a>
                <img src="images/dark_mode.png" height="25px" id="dark_mode">
                <a href="logout.php"><img src="images/logout.png" height="25px" id="logout"></a>
            </nav>
            </div>
        </header>


<!-- <a href="logout.php">Logout</a> -->

<?php
$email = $_SESSION["email"];

if(isset($_POST["submit"])){
    $message = $_POST['message'];

    $sql = "INSERT INTO notifications (email, message) VALUES ('$email', '$message')";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo "Notification added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$query = "SELECT * FROM notifications WHERE email='$email'";
$result = mysqli_query($conn, $query);

if($result) {
    if (mysqli_num_rows($result) > 0) {
        // echo "<h2>Your Notifications:</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<br>";
            $receivedTime = date("Y-m-d H:i:s", strtotime($row["timestamp"]));
            echo "<br>";
            echo "<center>";
            echo "<form><table><tr><td class='message-box'>" . $row["message"] . "<br><br><br>Received on: " . $receivedTime . "</td></tr></table></form>";
            echo "</center>";
        }
        
    } else {
        echo "<br><br><br>";
        echo "You have no notifications.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>


