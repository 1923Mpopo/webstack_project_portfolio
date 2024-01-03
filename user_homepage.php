<?php   
session_start();
if(isset($_SESSION['email'])){
	
	$email = $_SESSION['email'];
}
else{
	header("Location:login_functionality.php");
}


?>

<!DOCTYPE >
<html>
    <head>
    <title> online birth certificate-user </title>
    <link rel="stylesheet" type="text/css" href="myStylesheet.css"> 
</head>
<body>
    <header>
<div class="hero">
                <nav>
                <h2 class="logo">
                <img src="images/homeAffairLogo.jpg" height="90px">
                </h2>
                
                <ul>
                    <li><a href="application_form.php">Application Form</a></li>
                    <li><a href="uploadfile.php">Upload file</a></li>
                    <li><a href="view_certificate.php">View Certificate</a></li>
            
                </ul>
                <!-- <button type="button"><a href="Register.php">Get Started</a></button> -->
                <a href="retrieve_not_sess.php"><img src="images/notifications.png" height="25px" id="notification"></a>
                <img src="images/dark_mode.png" height="25px" id="dark_mode">
                <a href="logout.php"><img src="images/logout.png" height="25px" id="logout"></a>
             

            </nav>
            </div>
        </header>

    <section></section>
    <aside>
            <br><br><br>
           <div class="aside_div">
            <h1>Apply for birth certificate</h1><br>
            <p>It is easy and fast. Just upload the following documents:</p><br>
            <p>1. Three photocopies of ID from informant</p>  
            <p>2. baptism letter</p>
            <br><br>
            <button type="button"><a href="application_form.php">Apply Now</a></button></div>
        </aside>
    <footer>
    
    </footer>
</body>
</html>
</DOCTYPE>