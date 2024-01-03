<?php

session_start();
include 'config.php';

if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    // echo "Welcome " . $_SESSION["email"];
} else {
    header('location: login_functionality.php'); // Redirect to the login page if not logged in
    exit(); // Terminate the script to prevent further execution
}


?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
	<meta charset="utf-8">   
	<title>admin reports</title>   
	<meta name="description" content="Creating a Employee table with Twitter Bootstrap. Learn with example of a Employee Table with Twitter Bootstrap.">  
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="myStylesheet.css">

			<style>
						/* Style for the modal overlay */
				.modal {
					display: none; /* Hidden by default */
					position: fixed; /* Stay in place */
					z-index: 1; /* Sit on top */
					left: 0;
					top: 0;
					width: 100%;
					height: 100%;
					background-color: rgba(0, 0, 0, 0.4); /* Black background with transparency */
				}
				
				/* Style for the modal content */
				.modal-content {
					background-color: #f4f4f4;
					margin: 10% auto;
					padding: 20px;
					border: 1px solid #888;
					width: 50%; /* Adjust the width as needed */
					box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
				}
				
				/* Style for the close button */
				.close {
					color: #888;
					float: right;
					font-size: 24px;
					font-weight: bold;
					cursor: pointer;
				}
				
				.close:hover {
					color: #000;
				}
				
				/* Style for form elements */
				label {
					display: block;
					margin-top: 10px;
				}
				
				input[type="text"],
				textarea {
					width: 100%;
					padding: 10px;
					margin-top: 5px;
					margin-bottom: 15px;
					border: 1px solid #ccc;
					border-radius: 4px;
					box-sizing: border-box;
				}

				input[type="submit"] {
					background-color: #4CAF50;
					color: white;
					padding: 10px 20px;
					border: none;
					border-radius: 4px;
					cursor: pointer;
				}
				
				input[type="submit"]:hover {
					background-color: #45a049;
				}

				/* Style for the details popup content */
				.details-popup-content {
					background-color: #fff;
					padding: 20px;
					border: 1px solid #ccc;
					border-radius: 5px;
					box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
				}

				.details-popup-content p {
					margin: 5px 0;
				}
			</style>
		</head> 
		<header>
              <ul class="admin_upload_ul">
                <li><a href="admin_homepage.php" id="admin_home_btn">Home</a></li>
                <li><a href="accounts.php" id="admin_home_btn">Accounts</a></li>
                <li><a href="applications.php" id="admin_home_btn" class="active">Applications</a></li>
                <li class="admin_upload_li"><a href="logout.php">Logout</a></li>
                <li class="admin_upload_li"><a href="admin_report.php" >Certificates</a></li>
                <li class="admin_upload_li"><a href="admin_download.php">view files</a></li>
                <li class="admin_upload_li"><a href="admin_uploadfile.php">upload file</a></li>
                </ul>
        </header>
		<br><br> 
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
</div>
<!-- code for displaying application data start here -->
<?php

	//connect to the database
	$connection = mysqli_connect('localhost','root','','user_db');
	if($connection->connect_error)die($connection->connect_error);

    $query = "SELECT * FROM application_form ";
    $result = $connection->query($query);
	echo "<center><h2></h2></center>";
  echo "<table id='myTable' class='table table-bordered table-striped' >
  <thead>
	   <tr>
	   <th>Certificate number</th>
	   <th>Email</th>
		<th>Name</th>
		<th>Surname</th>
		<th hidden>Sex</th>
		<th>Date Of Birth</th>
		<th hidden>Place Of Birth</th>
        <th>Name Of Father</th>
        <th>Name Of Mother</th>
		<th hidden>Residence of Informant</th>
		<th>Date of Registration</th>
		<th>Action</th>
	   </tr>
	   </thead>";
    if($result)
	{   
        
		$rows = $result->num_rows;
		for($x=0; $x<$rows; $x++)
		{
			
			$result->data_seek($x);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo "<tbody>";
			echo "<tr>";
			echo "<td>         ".$row['certificate_number']."</td>";
			echo "<td>         ".$row['email']."</td>";
			echo "<td hidden>         ".$row['ID_number']."</td>";
			echo "<td>	       ".$row['Name']."</td>";
			echo "<td>	       ".$row['Surname']."</td>";
			echo "<td hidden>		   ".$row['Sex']."</td>";
			echo "<td>         ".$row['Date_of_Birth']."</td>";
			echo "<td hidden>	       ".$row['Place_of_Birth']."</td>";
			echo "<td>	       ".$row['Name_of_Father']."</td>";
			echo "<td hidden>	       ".$row['Nationality_of_Father']."</td>";
			echo "<td>	       ".$row['Name_of_Mother']."</td>";
			echo "<td hidden>	       ".$row['Maiden_Surname']."</td>";
			echo "<td hidden>	       ".$row['Nationality_of_Mother']."</td>";
			echo "<td hidden>	       ".$row['Name_and_cpty_of_informant']."</td>";
			echo "<td hidden>	       ".$row['Other_informant']."</td>";
			echo "<td hidden>	       ".$row['Residence_of_informant']."</td>";
			echo "<td>	       ".$row['Date_of_registration']."</td>";
			echo "<td> <a href='javascript:void(0);' onclick='openDetailsPopupForm(" . htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8') . ")'>View</a>
			<a href=\"javascript:void(0);\" onclick=\"openPopupForm('" . $row['email'] . "')\">Reject</a>"."</td>";
			echo '<td><a href="javascript:void(0);" onclick="approveApplication(\'' . $row['email'] . '\', \'' . $row['certificate_number'] . '\')">Approve</a></td>';
			


            echo"</tr>";
			echo "</tbody>";			
		}
		echo"</table></center>";
		
	}
	else
	{
		echo "No record retrieved";
	}	
?>
<!-- ends here -->
</div>  
</body> 

<!-- code for inserting reject data in the database start here -->
<?php
include 'config.php';
$email = $_SESSION["email"];
$query = "SELECT * FROM notifications WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (isset($_POST["submit"])) {
    $email = $_POST['email']; // Retrieve email from the form
    $message = $_POST['message'];

    $sql = "INSERT INTO notifications (email, message) VALUES ('$email', '$message')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Notification added successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?> 
<!-- ends here -->

<!-- code for approve application start here -->
<?php
// Include your database connection here
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $certificate_number = $_POST["certificate_number"];

    // Perform the approval and send a notification here
    // For example, insert the approval into your notifications table

    $message = "Your application with certificate number " . $certificate_number . " has been approved.";

    $sql = "INSERT INTO notifications (email, message) VALUES ('$email', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
<!-- ends here -->

<!-- reject pop up form start here -->
<div id="popupForm" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closePopupForm()">&times;</span>
        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" readonly>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" cols="50" required></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>
<!-- ends here -->

<!-- pop up form for view button start here -->
<div id="detailsPopupForm" class="modal">
    <div class="modal-content details-popup-content">
        <span class="close" onclick="closeDetailsPopupForm()">&times;</span>
        <h2>Application Content</h2>
        <div id="detailsContent" style="max-height: 300px; overflow-y: auto;">
            <form action="" method="post">
                <p><b>Certificate number:</b> <span name="certificate_number"></span></p>
                <p><strong>Email:</strong> <span name="email"></span></p>
                <p><strong>Name:</strong> <span name="Name"></span></p>
                <p><strong>Surname:</strong> <span name="Surname"></span></p>
                <p><strong>Sex:</strong> <span name="Sex"></span></p>
                <p><strong>Date_of_Birth:</strong> <span name="Date_of_Birth"></span></p>
                <p><strong>Place_of_Birth:</strong> <span name="Place_of_Birth"></span></p>
                <p><strong>Name_of_Father:</strong> <span name="Name_of_Father"></span></p>
                <p><strong>Nationality_of_Father:</strong> <span name="Nationality_of_Father"></span></p>
                <p><strong>Name_of_Mother:</strong> <span name="Name_of_Mother"></span></p>
                <p><strong>Maiden_Surname:</strong> <span name="Maiden_Surname"></span></p>
                <p><strong>Nationality_of_Mother:</strong> <span name="Nationality_of_Mother"></span></p>
                <p><strong>Name_and_cpty_of_informant:</strong> <span name="Name_and_cpty_of_informant"></span></p>
                <p><strong>Other_informant:</strong> <span name="Other_informant"></span></p>
                <p><strong>Residence_of_informant:</strong> <span name="Residence_of_informant"></span></p>
                <p><strong>Date_of_registration:</strong> <span name="Date_of_registration"></span></p>
            </form>
        </div>
    </div>
</div>
<!-- ends here -->


<!-- script for reject popup form start here -->
<script>
// Function to show the pop-up form
function openPopupForm(email) {
  document.getElementById("email").value = email;
  document.getElementById("popupForm").style.display = "block";
}

// Function to close the pop-up form
function closePopupForm() {
  document.getElementById("popupForm").style.display = "none";
}
</script>
<!-- ends here -->

<!-- script for view button popup form start here -->
<script>
function openDetailsPopupForm(details) {
  const detailsPopup = document.getElementById("detailsPopupForm");
  const detailsContent = document.getElementById("detailsContent");

  // Populate the details content
  detailsContent.innerHTML = `
    <p>Certificate number: ${details.certificate_number}</p>
    <p>Email: ${details.email}</p>
    <p>Name: ${details.Name}</p>
    <p>Surname: ${details.Surname}</p>
	<p>Sex: ${details.Sex}</p>
	<p>Date_of_Birth: ${details.Date_of_Birth}</p>
	<p>Place_of_Birth: ${details.Place_of_Birth}</p>
	<p>Name_of_Father: ${details.Name_of_Father}</p>
	<p>Nationality_of_Father: ${details.Nationality_of_Father}</p>
	<p>Name_of_Mother: ${details.Name_of_Mother}</p>
	<p>Maiden_Surname: ${details.Maiden_Surname}</p>
	<p>Nationality_of_Mother: ${details.Nationality_of_Mother}</p>
	<p>Name_and_cpty_of_informant: ${details.Name_and_cpty_of_informant}</p>
	<p>Other_informan: ${details.Other_informant}</p>
	<p>Residence_of_informant: ${details.Residence_of_informant}</p>
	<p>Date_of_registration: ${details.Date_of_registration}</p>
   
  `;

  // Show the details pop-up form
  detailsPopup.style.display = "block";
}

function closeDetailsPopupForm() {
  const detailsPopup = document.getElementById("detailsPopupForm");
  detailsPopup.style.display = "none";
}
</script>

<!-- ends here -->

<!-- Script for AJAX approval process -->
<script>
function approveApplication(email, certificate_number) {
  if (confirm("Are you sure you want to approve this application?")) {
    // Make an AJAX request to approve the application
    $.ajax({
      type: "POST",
      url: "approve_application.php", // Create this PHP file
      data: { email: email, certificate_number: certificate_number },
      success: function (response) {
        if (response === "success") {
          alert("Application approved, and a notification sent.");
          location.reload(); // Reload the page after the approval
        } else {
          alert("Error: Unable to approve the application.");
        }
      },
    });
  }
}
</script>
<!-- ends here -->

<!-- script for table start here -->
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
<!-- ends here -->
</html>  
