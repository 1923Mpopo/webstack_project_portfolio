
<?php 
include "config.php";
$id="";
$email="";
$phone_number="";
$password="";
$confirm_password="";
$user_type="";

// $error="";
// $success="";

if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
        header("location:accounts.php");
        exit;
    }
    $id = $_GET['id'];
    $sql = "select * from user_form where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
        header("location:accounts.php");
        exit;
    }
    $email=$row["email"];
    $phone_number=$row["phone_number"];
    $password=$row["password"];
    $confirm_password=$row["confirm_password"];
    $user_type=$row["user_type"];
}
else{
    $id = $_POST['id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];

    $sql = "update user_form set email='$email', phone_number='$phone_number',password='$password', confirm_password='$confirm_password',user_type='$user_type' where id='$id' ";
    $result = $conn->query($sql);

}

?>

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
        
        $error[] = 'account has been updated!';
    }else{
        if($password != $confirm_password){
            $error[] = 'password not match!';  
        }else{
            $insert = "INSERT INTO user_form(email,phone_number,password,confirm_password,user_type)VALUES('$email','$phone_number','$password','$confirm_password','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_functionality.php');
        }
    }

};

?>
<!DOCTYPE >
<html>
    <head>
        <title>update user page</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" type="text/css" href="myStylesheet.css"> 
    </head>
    <body>
    <header>
            <div class="hero">
                <nav>
                <h2 class="logo">
                <img src="images/homeAffairLogo.jpg" height="90px">
                <!-- Home <span>Affairs</span> -->
                </h2>
                
                <ul>
                    <li><a href="accounts.php">Accounts</a></li>
                    <li><a href="applications.php">Applications</a></li>
                    <li><a href="view_uploads.php">Uploads</a></li>
                    <li><a href="admin_report.php">Certificates</a></li>
            
                </ul>
                <!-- <button type="button"><a href="Register.php">Get Started</a></button> -->
                <img src="images/notifications.png" height="25px" id="notification">
                <img src="images/dark_mode.png" height="25px" class="dark_mode">
                <a href="logout.php"><img src="images/logout.png" height="25px" id="logout"></a>
            </nav>
            </div>
        </header>
        <div class="form-container">
        <form action="" method="post" >
            <h1>Update an account</h1>
            <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            <input type="text" name="email" value="<?php echo $email; ?>">
            <input type="number" name="phone_number" value="<?php echo $phone_number; ?>" required>
            <input type="password" name="password" value="<?php echo $password; ?>" required>
            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" required>
            <select name="user_type" value="<?php echo $user_type; ?>">
                <option value="user">admin</option>
                <option value="admin">user</option>
            </select>
            <input type="submit" name="submit" value="Update Now" class="form-btn">
            <a href="accounts.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Back</a><br><br>
        </form>
    </div>
    </body>
</html>
