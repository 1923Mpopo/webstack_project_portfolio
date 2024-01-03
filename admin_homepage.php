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
    <title> online birth certificate </title>
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
                    <li><a href="admin_uploadfile.php">Uploads</a>
                           <ul class="dropdown-content">
                            <li><a href="admin_download.php">view files</a></li><br>
                            <li><a href="admin_uploadfile.php">upload file</a></li>
                           </ul>
                
                    </li>
                    <li><a href="admin_report.php">Certificates</a></li>
            
                </ul>
                <!-- <button type="button"><a href="Register.php">Get Started</a></button> -->
                <!-- <a href="session.php"><img src="images/notifications.png" height="25px" id="notification"></a> -->
                <!-- <img src="images/dark_mode.png" height="25px" class="dark_mode"> -->
                <!-- <button><a href="logout.php"><img src="images/logout.png" height="25px" id="logout"></a>Sign out</button> -->
                <button><a href="logout.php">Sign out</a></button>
            </nav>
            </div>
        </header>
        <section id="admin_section"></section>
        <aside>
            <br><br><br>
           <div class="aside_div">
            <h1>Apply for birth certificate</h1><br>
            <p>It is easy and fast. Just upload the following documents:</p><br>
            <p>1. Three photocopies of ID from informant</p>  
            <p>2. baptism letter</p>
            <br><br>
            <button>Apply Now</button></div>
        </aside>
    
    <footer></footer>
</body>
</html>
</DOCTYPE>