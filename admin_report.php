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

</head> 
<style>
   @media print{
      body *{
         visibility:hidden;
      }
      .content, .content * {
         visibility:visible;
      }
   }
</style>
<header>
              <ul class="admin_upload_ul">
                <li><a href="admin_homepage.php" id="admin_home_btn">Home</a></li>
                <li><a href="accounts.php" id="admin_home_btn">Accounts</a></li>
                <li><a href="applications.php" id="admin_home_btn">Applications</a></li>
                <li class="admin_upload_li"><a href="logout.php">Logout</a></li>
                <li class="admin_upload_li"><a href="admin_report.php" class="active" >Certificates</a></li>
                <li class="admin_upload_li"><a href="admin_download.php">view files</a></li>
                <li class="admin_upload_li"><a href="admin_uploadfile.php">upload file</a></li>
                </ul>
        </header>
		<br><br> 
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
<!-- <h3>Bootstrap Table With sorting,searching and paging using dataTable.js (Responsive)</h3> -->
</div>
<?php

	//connect to the database
	$connection = mysqli_connect('localhost','root','','user_db');
	if($connection->connect_error)die($connection->connect_error);

    $query = "SELECT * FROM application_form ";
    $result = $connection->query($query);
	echo "<center><h2>BIRTH CERTIFICATE APPLICATIONS REPORT</h2></center>";
  echo "<table id='myTable' class='table table-bordered table-striped content' >
  <thead>
	   <tr>
	   <th>Certificate number</th>
		<th>Name</th>
		<th hidden>ID_number</th>
		<th>Surname</th>
		<th hidden>Sex</th>
		<th>Date Of Birth</th>
		<th hidden>Place Of Birth</th>
        <th>Name Of Father</th>
		<th hidden>Nationality_of_Father</th>
        <th>Name Of Mother</th>
		<th hidden>Maiden_Surname</th>
		<th hidden>Nationality_of_Mother</th>
		<th>Name_and_cpty_of_informant</th>
		<th hidden>Other_informant</th>
		<th>Residence of Informant</th>
		<th>Date of Registration</th>
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
			echo "<td>	       ".$row['Name_and_cpty_of_informant']."</td>";
			echo "<td hidden>	       ".$row['Other_informant']."</td>";
			echo "<td>	       ".$row['Residence_of_informant']."</td>";
			echo "<td>	       ".$row['Date_of_registration']."</td>";
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
</div>
<br><br>
<button Print id="print">Print Report</button> 
 <a href="admin_certificate.php"><button id="print">Certificate</button></a> 
</body>  
<script>
            const printBtn = document.getElementById('print');
            printBtn.addEventListener('click', function(){
               print();
            })
         </script>

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  
