<?php 
include 'config.php';
if(isset ($_GET['id'])){
   $id=$_GET['id'];

   $sql = "DELETE FROM user_form WHERE id=$id";
   $result=mysqli_query($conn, $sql);
   if($result){
    // echo "deleted successful";
    header('location:accounts.php');
   }else{
    die(mysqli_error($con));
   }
}
?>