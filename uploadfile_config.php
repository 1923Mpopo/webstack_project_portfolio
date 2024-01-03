<?php

//connection 
$conn = mysqli_connect("localhost","root","","user_db");

//retrieve data from database
$sql = "SELECT * FROM files";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

//validate and upload file
if(isset($_POST['save'])){
    $filename = $_FILES['myfile']['name'];
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $destination = 'uploads/' .$filename;
   
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    //validation of how many files have been uploaded
    if(!in_array($extension,['zip','pdf','PNG'])){
      
        echo "Your file extension must be .zip, .pdf of .png";    
    }
    elseif($_FILES['myfile']['size'] >1000000){

      echo "file is too large";

    }

    else{
        if(move_uploaded_file($file,$destination))
        {
           $sql = "INSERT INTO files (email,name,size,download) VALUES ('$email','$filename','$size',0)";

           if(mysqli_query($conn,$sql)){

            echo "file uploaded successfully";
           }
           else{
            echo "failed to upload file";
           }
        }
    }
}
//download function
if(isset($_GET['file_id'])){

    $id = $_GET['file_id'];

    $sql = "SELECT * FROM files WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];
    
//check if the file exist
    if(file_exists($filepath)){
       header('Content-Type: application/octet-stream');
       header('Content-Description: File Transfer');
       header('Content-Disposition: attachment; filename=' . basename($filepath));
       header('Expires: 0');
       header('Cache-Control: must-revalidate');
       header('Pragma:public');
       header('Content-Length:' .filesize('uploads/'.$file['name']));

       readFile('uploads/'.$file['name']);

       $newCount =$file['download'] + 1;
       $updateQuery = "UPDATE files SET download=$newCount WHERE id=$id";
       mysqli_query($conn,$updateQuery);
       exit;

    }
}

?>