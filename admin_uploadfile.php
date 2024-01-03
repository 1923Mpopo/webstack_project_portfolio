<!DOCTYPE html>
<html>
    <head>
        <title>admin upload</title>
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
                <li class="admin_upload_li"><a href="admin_download.php">view files</a></li>
                <li class="admin_upload_li"><a href="admin_uploadfile.php" class="active">upload file</a></li>
                </ul>
        </header>
        <br>
    
        
        <div class="container mt-5">
            <form action="admin_upload.php" method="POST" enctype="multipart/form-data" class="upload_form">
            <h2>Upload file</h2>
                <div class="mb-3">
                    <label for="file" class="form-label">Select file</label>
                    <input type="file" class="form-label" name="file" id="upload_input">
                </div>
                <button type="submit" id="upload_button">Upload file</button>
            </form>
        </div>
        
    </body>
</html>