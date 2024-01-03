<?php 

// Start the session to access session variables
session_start();

// Check if the user is logged in and has an email set in the session
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Redirect to the login page if the user is not logged in
    header('location: login_functionality.php');
    exit(); // Terminate the script to prevent further execution
}

// Retrieve the email from the session
$email = $_SESSION['email'];
@include 'config.php';

if(isset($_POST['submit'])){

   
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Surname = mysqli_real_escape_string($conn, $_POST['Surname']);
    $Sex = ( $_POST['Sex']);
    $Date_of_Birth = ($_POST['Date_of_Birth']);
    $Place_of_Birth = mysqli_real_escape_string($conn, $_POST['Place_of_Birth']);
    $Name_of_Father = mysqli_real_escape_string($conn, $_POST['Name_of_Father']);
    $Nationality_of_Father = mysqli_real_escape_string($conn, $_POST['Nationality_of_Father']);
    $Name_of_Mother = mysqli_real_escape_string($conn, $_POST['Name_of_Mother']);
    $Maiden_Surname = mysqli_real_escape_string($conn, $_POST['Maiden_Surname']);
    $Nationality_of_Mother = mysqli_real_escape_string($conn, $_POST['Nationality_of_Mother']);
    $Name_and_cpty_of_informant = mysqli_real_escape_string($conn, $_POST['Name_and_cpty_of_informant']);
    $Other_informant = mysqli_real_escape_string($conn, $_POST['Other_informant']);
    $Residence_of_informant = mysqli_real_escape_string($conn, $_POST['Residence_of_informant']);
    // $Date_of_registration = mysqli_real_escape_string($conn, $_POST['Date_of_registration']);

    $select = " SELECT * FROM application_form WHERE Name = '$Name' && Surname = '$Surname' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        $error[] = 'application already exist!';
    }else{
           
            $certificate_number=rand(9999999999,1111111111);
            $insert = "INSERT INTO application_form(certificate_number,email,Name,Surname,Sex,Date_of_Birth,Place_of_Birth,Name_of_Father,Nationality_of_Father,Name_of_Mother,Maiden_Surname,Nationality_of_Mother,Name_and_cpty_of_informant,Other_informant,Residence_of_informant)
            VALUES('$certificate_number','$email','$Name','$Surname','$Sex','$Date_of_Birth','$Place_of_Birth','$Name_of_Father','$Nationality_of_Father','$Name_of_Mother','$Maiden_Surname','$Nationality_of_Mother','$Name_and_cpty_of_informant','$Other_informant','$Residence_of_informant')";
            mysqli_query($conn, $insert);
            header('location:uploadfile_sesotho.php');
        
    }

};

?>
<!DOCTYPE >
<html>
    <head>
        <title>Birth cert - application form</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <link rel="stylesheet" type="text/css" href="myStylesheet.css"> 
        <style>
            /* Your existing styles here */
        /* Light mode */
        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .form-container {
            background-color: #fff;
            color: #333;
        }

        /* Dark mode */
        .dark-mode {
            background-color: #333;
            color: #fff;
        }
        
        .dark-mode .form-container {
            background-color: #444; /* Dark background color */
            color: #fff; /* White text color */
        }
        </style>
    </head>
    <body>
        <div class="form-container">
        <form action="" method="post" >
        <center><img src="images/homeAffairLogo.jpg" height="90px"></center>
            <h1>Etsa kopo ea Lengolo la tsoalo</h1>
            <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="email" placeholder="Kenya imeile (email address)" class="col" value="<?php echo $email; ?>" readonly>
            <input type="text" name="Name" placeholder="Kenya Lebitso" class="col" required>
            <input type="text" name="Surname" placeholder="Kenya Fane" class="col" required>
            <select name="Sex">
                <option value="Male">Botona</option>
                <option value="Female">Bots'ehali</option>
            </select>
            Khetha letsatsi la tsoalo
            <input type="date" name="Date_of_Birth" placeholder="Kenya letsatsi la tsoalo" required>
            <input type="text" name="Place_of_Birth" placeholder="kenya sebaka sa tsoalo" required>
            <input type="text" name="Name_of_Father" placeholder="kenya lebitso la ntate" required>
            <input type="text" name="Nationality_of_Father" placeholder="Kenya bochaba ba ntate" required>
            <input type="text" name="Name_of_Mother" placeholder="Kenya lebitso la 'me'" required>
            <input type="text" name="Maiden_Surname" placeholder="Kenya fane ea 'me' ea bongoanana" required>
            <input type="text" name="Nationality_of_Mother" placeholder="Kenya bochaba ba 'me' " required>
            <input type="text" name="Name_and_cpty_of_informant" placeholder="Kenya lebitso le bokhoni ba motsebi" required>
            <input type="text" name="Other_informant" placeholder="Kenya motsebi e mong" required>
            <input type="text" name="Residence_of_informant" placeholder="Kenya bolulo ba motsebi" required>

            <input type="submit" name="submit" value="Etsa Kopo ha joale" class="form-btn">
            <a href="user_homepage_sesotho.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Khutlela Morao</a><br><br>
        </form>
    </div>

    <button id="mode-toggle" onclick="toggleMode()">Mokhoa o lefifi</button>

<script>
    // JavaScript to toggle between light and dark modes
    const body = document.body;
    const formContainer = document.querySelector('.form-container');
    const modeToggle = document.getElementById('mode-toggle');

    function toggleMode() {
        if (body.classList.contains('dark-mode')) {
            body.classList.remove('dark-mode');
            formContainer.classList.remove('dark-mode');
        } else {
            body.classList.add('dark-mode');
            formContainer.classList.add('dark-mode');
        }
    }
</script>
    </body>
</html>
