<?php
//Database connection file
include 'config.php';
//Sessions applied
session_start();

if(isset($_POST['submit'])){
    //variables
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Accessing login variables to from the database
    $select_users = mysqli_query($conn, "SELECT * FROM `user_form` WHERE phone_number = '$phone_number' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select_users) > 0){

        $row = mysqli_fetch_assoc($select_users);
        //If login details matches admin,
        //it will redirect the user to admin page
        if($row['user_type'] == 'admin'){
            $_SESSION['id'] = $row['id'];   
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['confirm_password'] = $row['confirm_password'];
            $_SESSION['user_type'] = $row['user_type'];
            header('location:admin_homepage.php');

        }
        //If login details matches member,
        //it will redirect the user to members pages
        elseif($row['user_type'] == 'user'){
            $_SESSION['id'] = $row['id'];   
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone_number'] = $row['phone_number'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['confirm_password'] = $row['confirm_password'];
            $_SESSION['user_type'] = $row['user_type'];
            header('location:user_homepage_sesotho.php');
        }
    }
    //If login details do not matches any user,
    //it will display incorrect login message
    else{
      $message[] = 'Sorry, Incorrect names or password!';
    }

}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>birth cert- Sign In</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="myStylesheet.css">
    
</head>
<body>
<!--Message pop-up for login-->
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!-- navbar -->
<div class="hero">
                <nav>
                <h2 class="logo">
                <img src="images/homeAffairLogo.jpg" height="90px">
                <!-- Home <span>Affairs</span> -->
                </h2>
                
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="test.html">SERVICES</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="login_functionality.php">TRANSLATE</a></li>
                    <!-- <li><a href="login_functionality.php">LOGIN</a></li> -->
            
                </ul>
                <button type="button"><a href="Register.php">Get Started</a></button>
                <img src="images/dark_mode.png" height="45px" class="dark_mode">
            </nav>
            </div>
        </header>
<!-- ends here -->

<!--Container start-->
<div class="form-container">
    <!--Form start-->
    <form action="" method="post">
        <a href="index.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Khutlela Morao</a><br><br>
        <h3><i class="fa fa-user"></i> Foromo ea ho kena</h3>
        <input type="number" name="phone_number" placeholder="Kenya nomoro ea mohala" required class="box">
        <input type="password" name="password" placeholder="kenya nomoro ea lekunutu" required class="box">
   
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p>Hauna account? <a href="Register.php">Ngolisa hona joale</a></p>
    </form>
    <!--Form End-->
</div>
<!--Container End-->
</body>
</html>