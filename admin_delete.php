<?php 
include 'config.php';
if(isset ($_GET['id'])){
   $id=$_GET['id'];

   $sql = "DELETE FROM notifications WHERE id=$id";
   $result=mysqli_query($conn, $sql);
   if($result){
    // echo "deleted successful";
    header('location:admin_certificate.php');
   }else{
    die(mysqli_error($con));
   }
}
?>