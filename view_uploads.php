<?php 
error_reporting(0);
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
                <img src="images/notifications.png" height="45px" id="notification">
                <img src="images/dark_mode.png" height="45px" id="dark_mode">
                <a href="logout.php"><img src="images/logout.png" height="45px" id="logout"></a>
            </nav>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <form action="uploadfile.php" method="post" enctype="multipart/form-data" class="upload_form">
                    <h3>Upload Files</h3><br>
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
