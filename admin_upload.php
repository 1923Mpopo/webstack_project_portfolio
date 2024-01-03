<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //CHECK IF A FILE WAS UPLOADED WITHOUT ERRORS
    if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        //check if the file is allowed
        $allowed_types = array("jpg", "jpeg","png","gif","pdf");
        if(!in_array($file_type, $allowed_types)){
            echo "sorry, only JPG,JPEG,PNG,GIF and PDF are allowed";
        }
        else{
            //move the uploaded file to the specific directory
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
                //file upload success, now store information in the database
                $name = $_FILES["file"]["name"];
                $size = $_FILES["file"]["size"];
                $download = $_FILES["file"]["download"];

                //database connection
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "user_db";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if($conn->connect_error){
                    die("Connection failed " . $conn->connect_error);
                }

                //insert the file information in to database
                $sql = "INSERT INTO  files (name, size, download) VALUES ('$name', '$size', 0)";

                if($conn->query($sql) === TRUE){
                    echo "The file ".basename($_FILES["file"]["name"]). "has been uploaded and the information has been saved in the database.";
                    header('location:admin_download.php');
                }else{
                    echo "sorry, there was an error uploading and storing file". $conn->error;
                }

                $conn->close(); 

            }else{
                echo "sorry, there was an error uploading your file";
            }
        }

    }
}



?>

