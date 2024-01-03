<?php   
session_start();
if(isset($_SESSION['email'])){
	
	$email = $_SESSION['email'];
}
else{
	header("Location:login_sesotho.php");
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
                    <li><a href="application_form_sesotho.php">Foromo ea kopo</a></li>
                    <li><a href="uploadfile_sesotho.php">Kenya faele</a></li>
                    <li><a href="view_certificate_sesotho.php">Bona Lengolo</a></li>
            
                </ul>
                <img src="images/notifications.png" height="25px" id="notification">
                <img src="images/dark_mode.png" height="25px" id="dark_mode">
                <a href="logout_sesotho.php"><img src="images/logout.png" height="25px" id="logout"></a>
            </nav>
            </div>
        </header>

    <section></section>
    <aside>
            <br><br><br>
           <div class="aside_div">
           <h1>Etsa Kopo Ea Lengolo la tsoalo</h1><br>
            <p>Ho bonolo ebile ho potlakile. Kenya litokomane tse latelang:</p><br>
            <p>1. Likopi tse tharo tsa ID ho tsoa ho lipaki</p>   
            <p>2. Lengolo la Kereke</p>
            <br><br>
            <button type="button"><a href="application_form_sesotho.php">Etsa Kopo ha joale</a></button></div>
        </aside>
    <footer>
    
    </footer>
</body>
</html>
</DOCTYPE>