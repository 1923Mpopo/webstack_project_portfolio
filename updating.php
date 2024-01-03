<?php
include 'config.php';
$id =$_GET['id'];
$sql="select * from user_form where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$email=$row['email'];
$phone_number=$row['phone_number'];
$password=$row['password'];
$confirm_password=$row['confirm_password'];
$user_type=$user_type['user_type'];

if(isset($_POST['submit'])) {
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $user_type=$_POST['user_type'];

    $sql="update `user_form` set id=$id,email='$email',phone_number='$phone_number',password='$password',confirm_password='$confirm_password',user_type='$user_type' where id='$id' ";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "data updated successful";
    }else{
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE >
<html>
    <head>
        <title>admin update accounts page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" type="text/css" href="Stylesheet.css"> 
    </head>
    <body>
        <div class="form-container">
        <form action="update.php" method="post" >
            <h1>Update Account</h1>
            <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="email" placeholder="Enter email" value=<?php echo $email;?>>
            <input type="number" name="phone_number" placeholder="Enter phone number" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
            <select name="user_type">
                <option value="user">admin</option>
                <option value="admin">user</option>
            </select>
            <input type="submit" name="submit" value="update now" class="form-btn"><br>
            <a href="index.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Back</a><br><br>
        </form>
    </div>
    </body>
</html>