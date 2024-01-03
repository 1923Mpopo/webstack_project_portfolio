<?php 

@include 'config.php';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $user_type = ($_POST['user_type']);

    $select = " SELECT * FROM user_form WHERE phone_number = '$phone_number' && password = '$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        $error[] = 'user already exist!';
    }else{
        if($password != $confirm_password){
            $error[] = 'password not match!';  
        }else{
            $insert = "INSERT INTO user_form(email,phone_number,password,confirm_password,user_type)VALUES('$email','$phone_number','$password','$confirm_password','$user_type')";
            mysqli_query($conn, $insert);
            header('location:bootstrap.php');
        }
    }

};

?>
<!DOCTYPE >
<html>
    <head>
        <title>Registration page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" type="text/css" href="Stylesheet.css"> 
    </head>
    <body>
        <div class="form-container">
        <form action="" method="post" >
            <h1>Create an account</h1>
            <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="email" placeholder="Enter email">
            <input type="number" name="phone_number" placeholder="Enter phone number" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>
            <select name="user_type">
                <option value="user">admin</option>
                <option value="admin">user</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login_functionality.php">Login</a></p><br>
            <a href="index.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Back</a><br><br>
        </form>
    </div>
    </body>
</html>
