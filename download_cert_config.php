<?php
//connection 
$conn = mysqli_connect("localhost","root","","user_db");

//retrieve data from database
$sql = "SELECT * FROM application_form";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);

//validate and upload file
if(isset($_POST['save'])){
    

    
}
//download function
if(isset($_GET['file_id'])){
   
    $ID_number = $_GET['ID_number'];

    $sql = "SELECT * FROM application_form WHERE ID_number=$ID_number";

    $result = mysqli_query($conn,$sql);

    $file = mysqli_fetch_assoc($result);

    $filepath = 'uploads/' . $file['name'];
 
    
}

?>