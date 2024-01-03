

<!Doctype html>
<html>
	<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="myStylesheet.css">

	</head>
<body>
<header>
              <ul class="admin_upload_ul">
                <li><a href="admin_homepage.php" id="admin_home_btn">Home</a></li>
                <li><a href="accounts.php" id="admin_home_btn" class="active">Accounts</a></li>
                <li><a href="applications.php" id="admin_home_btn">Applications</a></li>
                <li class="admin_upload_li"><a href="logout.php">Logout</a></li>
                <li class="admin_upload_li"><a href="admin_report.php" >Certificates</a></li>
                <li class="admin_upload_li"><a href="admin_download.php">view files</a></li>
                <li class="admin_upload_li"><a href="admin_uploadfile.php">upload file</a></li>
                </ul>
        </header>
		<br><br>
		<br><br>

<div class="container mt-5">
<?php

	//connect to the database
	$connection = mysqli_connect('localhost','root','','user_db');
	if($connection->connect_error)die($connection->connect_error);

    $query = "SELECT * FROM user_form ";
    $result = $connection->query($query);
	echo "<center><h2></h2></center>";
	// echo"<center><table border=1 style=border-collapse:collapse  width=100%>
	echo"<center><table class='table table-bordered table-striped'>
	<thead>
	   <tr>
	    <th>ID number</th>
		<th>Email</th>
		<th>Phone_number</th>
		<th>Password</th>
		<th>Confirm Password</th>
		<th>User Type</th>
		<th colspan=2>Action</th>
		
	   </tr>
	   <thead>";
    if($result)
	{   
        
		$rows = $result->num_rows;
		for($x=0; $x<$rows; $x++)
		{
			
			$result->data_seek($x);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			echo "<tbody>";
			echo "<tr>";
			echo "<td>         ".$row['id']."</td>";
			echo "<td>	       ".$row['email']."</td>";
			echo "<td>	       ".$row['phone_number']."</td>";
			echo "<td>		   ".$row['password']."</td>";
			echo "<td>         ".$row['confirm_password']."</td>";
			echo "<td>	       ".$row['user_type']."</td>";
			echo "<td><a href='update.php?id=$row[id]'>Update</a>"."</td>";
			echo "<td><a href='delete.php?id=$row[id]'>Delete</a>"."</td>";
            echo"</tr>";
			echo "</tbody>";			
		}
		echo"</table></center>";
		//echo "<a href='updateAppointment.php'>Want to Update?</a>";
	}
	else
	{
		echo "No record retrieved";
	}	
?>
<?php
if(isset($_POST["delete"])){
	
	$user_id = $_POST["id"];

	//connect to the database
	$connection = mysqli_connect('localhost','root','','user_db');
	if($connection->connect_error)die($connection->connect_error);

	$query = "SELECT * FROM user_form WHERE id = '$id'";
	$result = $connection->query($query);
	
	$rows = $result->num_rows;
	
	if($rows == 1 ){
		$query = "DELETE FROM user_form WHERE id = '$id'";
		$result = $connection->query($query);
		if($result){
			echo "1 record is deleted";
			echo "<br><a href=display_accounts.php>Return Back</a>";
		}
	}
	else{
		echo "Error!!! No record was deleted";
		echo "<br><a href=display_accounts.php>Return Back</a>";
	}	
}
	?>
</div>
</body>
</html>