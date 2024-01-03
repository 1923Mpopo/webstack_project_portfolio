<?php 
// Start the session to access session variables
session_start();

// Check if the user is logged in and has an email set in the session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Redirect to the login page if the user is not logged in
    header('location: login_functionality.php');
    exit(); // Terminate the script to prevent further execution
}

// Retrieve the email from the session
$email = $_SESSION['email'];

include 'uploadfile_config.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>birth cert-user file upload</title>
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
        <link rel="stylesheet" type="text/css" href="myStylesheet.css">
        
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
                <img src="images/notifications.png" height="25px" id="notification">
                <img src="images/dark_mode.png" height="25px" id="dark_mode">
                <a href="logout.php"><img src="images/logout.png" height="25px" id="logout"></a>
            </nav>
            </div>
        </header>
        <br><br><br>
        <div class="container">
            <div class="row">
                <form action="uploadfile.php" method="post" enctype="multipart/form-data" class="upload_form">
                    <h3>Upload Files</h3><br>
                    <input type="text" name="email" id="upload_input" value="<?php echo $email; ?>" readonly><br>
                    <input type="file" name="myfile" id="upload_input"><br>
                    <button type="submit" name="save" id="upload_button"> Upload </button>
                </form>
            </div>
            <div class="row">
              <table id="upload_table">
                <thead>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Size(in mb)</th>
                    <!-- <th>Download(s)</th> -->
                    <th>Action</th>
                </thead>
                   <tbody>

                      <?php foreach($files as $file) ; ?>

                      <tr>
                        <!-- <td><?php echo $file['id'];?></td> -->
                        <td><?php echo $file['name'];?></td>
                        <td><?php echo $file['size'] / 1000 . "KB";?></td>
                        <!-- <td><?php echo $file['download'];?></td> -->
                        <td>
                            <a href="uploadfile.php?file_id=<?php echo $file['id']?>">Download</a>
                        </td>
                      </tr>
                        <?php T_ENDFOREACH; ?>
                   </tbody>
              </table>  
            </div>
        </div>
    </body>
</html>