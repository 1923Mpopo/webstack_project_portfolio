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
            header('location:uploadfile.php');
        
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
            <h1>Apply For Birth Certificate</h1>
            <?php 
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="email" placeholder="Enter Email" class="col" value="<?php echo $email; ?>" readonly>
            <input type="text" name="Name" placeholder="Enter Name" class="col" required>
            <input type="text" name="Surname" placeholder="Enter Surname" class="col" required>
            <select name="Sex">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            Choose Date of Birth
            <input type="date" name="Date_of_Birth" placeholder="Enter Date of Birth" required>
            <input type="text" name="Place_of_Birth" placeholder="Enter Place of Birth" required>
            <input type="text" name="Name_of_Father" placeholder="Enter Name of Father" required>
            <input type="text" name="Nationality_of_Father" placeholder="Enter Nationality of Father" required>
            <input type="text" name="Name_of_Mother" placeholder="Enter Name of Mother" required>
            <input type="text" name="Maiden_Surname" placeholder="Enter Maiden Surname" required>
            <input type="text" name="Nationality_of_Mother" placeholder="Enter Nationality of Mother" required>
            <input type="text" name="Name_and_cpty_of_informant" placeholder="Enter Name and capacity of informant" required>
            <input type="text" name="Other_informant" placeholder="Enter Other_informant" required>
            <input type="text" name="Residence_of_informant" placeholder="Enter Residence_of_informant" required>

            <input type="submit" name="submit" value="apply now" class="form-btn">
            <a href="user_homepage.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Back</a><br><br>
        </form>
    </div>

    <button id="mode-toggle" onclick="toggleMode()">Dark Mode</button>

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
