<?php 

//database connection details
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "user_db";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Connection failed " . $conn->connect_error);
}
//fetch the uploaded files from the database
$sql = "SELECT * FROM files";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>admin display uploaded files</title>
        <link rel="stylesheet" type="text/css" href="myStylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">  
    </head>
    <body>

    <header>
              <ul class="admin_upload_ul">
                <li><a href="admin_homepage.php" id="admin_home_btn">Home</a></li>
                <li><a href="accounts.php" id="admin_home_btn">Accounts</a></li>
                <li><a href="applications.php" id="admin_home_btn">Applications</a></li>
                <li class="admin_upload_li"><a href="logout.php">Logout</a></li>
                <li class="admin_upload_li"><a href="admin_report.php" >Certificates</a></li>
                <li class="admin_upload_li"><a href="admin_download.php" class="active">view files</a></li>
                <li class="admin_upload_li"><a href="admin_uploadfile.php">upload file</a></li>
                </ul>
        </header>
        
       <div class="container mt-5">
        <h2><center>Uploaded Files</center></h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>File Name</th>
                    <th>File Size</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //Display the uploaded files and download links
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()){
                    $file_path = "uploads/" . $row['name']; 
                     ?>
                     <tr>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['size']; ?></td>
                        <!-- <td><?php echo $row['download']?></td> -->
                        <td><a href="<?php echo $file_path; ?>" class="btn btn-primary">Download</a></td>
                     </tr>
                     <?php
                    }
                }else {
                    ?>
                    <tr>
                        <td colspan ="5">No files uploaded yet.</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
       </div> 
       <button><a href="admin_homepage.php">Back</a></button> 
    </body>
</html>

<?php 
$conn->close();
?>