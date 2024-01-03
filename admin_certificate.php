<?php 

include 'download_cert_config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View certificate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
<body>
<!-- <p id="message_cert">Please enter the certificate number given on the notification message to search the certificate.</p> -->
   <div class="view_cert_div">
        <form action="" method="POST" id="cert_search_form">
                        <input type="text" name="certificate_number" placeholder="Enter certificate number" id="input_form_cert"/>
                        <input type="submit" name="search" value="Search" id="input_search_cert">
                        <input Print id="print" value="Download">
                     </form>
  </div>

  
<center>

<!-- code for displaying notifications start here -->
<div class="container mt-5">
<?php

	//connect to the database
	$connection = mysqli_connect('localhost','root','','user_db');
	if($connection->connect_error)die($connection->connect_error);

    $query = "SELECT * FROM notifications ";
    $result = $connection->query($query);
	echo "<center><h2></h2></center>";
	// echo"<center><table border=1 style=border-collapse:collapse  width=100%>
	echo"<center><table class='table table-bordered table-striped'>
	<thead>
	   <tr>
	    <th>Id/th>
		<th>Email</th>
		<th>Message</th>
		<th>Timestamp</th>
		<th>Action</th>
		
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
			echo "<td>	       ".$row['message']."</td>";
			echo "<td>		   ".$row['timestamp']."</td>";
			echo "<td><a href='admin_delete.php?id=$row[id]'>Delete</a>"."</td>";
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

	$query = "SELECT * FROM notifications WHERE id = '$id'";
	$result = $connection->query($query);
	
	$rows = $result->num_rows;
	
	if($rows == 1 ){
		$query = "DELETE FROM notifications WHERE id = '$id'";
		$result = $connection->query($query);
		if($result){
			echo "1 record is deleted";
			echo "<br><a href=admin_certificate.php>Return Back</a>";
		}
	}
	else{
		echo "Error!!! No record was deleted";
		echo "<br><a href=admin_certificate.php>Return Back</a>";
	}	
}
	?>
</div>
 <!-- ends here -->

 <!-- code for searching and displaying certificate starts here -->
<?php
include 'config.php';
if(isset($_POST['search'])){
    $certificate_number = $_POST['certificate_number'];

    $query = "SELECT * FROM application_form where certificate_number='$certificate_number'";
    $query_run = mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($query_run))
    {
         ?>
         <div class="card_user content">
           
            <table id="t_cert">
             <tr>
                <td id="t_cert" style="width:45%;">Certificate Number</td>
                <td id="t_cert"><img src="images/flag.png" height="50px"></td>
                <td id="t_cert"><img src="images/scan_code.png" height="50px"></td>
                </tr>
                <tr>
                <td id="t_cert" style="width:45%;">LB<?php echo $row['certificate_number'] ?>/2023</td>
                <td id="t_cert">Kingdom of lesotho</td>
                <td id="t_cert">0101467687</td>
                </tr>
            
          </table>
        <br>
          <center><h1>Birth Certificate</h1></center>
          <hr class="hr1_cert">
            <table class="cert_table">
               <tr>
                  <td class="cert_table">NAME</td>
                  <td class="cert_table"><?php echo $row['Name'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">SURNAME</td>
                  <td class="cert_table"><?php echo $row['Surname'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">SEX</td>
                  <td class="cert_table"><?php echo $row['Sex'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">DATE OF BIRTH</td>
                  <td class="cert_table"><?php echo $row['Date_of_Birth'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">PLACE OF BIRTH</td>
                  <td class="cert_table"><?php echo $row['Place_of_Birth'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">NAME OF THE FATHER</td>
                  <td class="cert_table"><?php echo $row['Name_of_Father'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">NATIONALITY OF FATHER</td>
                  <td class="cert_table"><?php echo $row['Nationality_of_Father'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">NAME OF MOTHER</td>
                  <td class="cert_table"><?php echo $row['Name_of_Mother'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">MAIDEN SURNAME</td>
                  <td class="cert_table"><?php echo $row['Maiden_Surname'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">NATIONALITY OF MOTHER</td>
                  <td class="cert_table"><?php echo $row['Nationality_of_Mother'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">NAME AND CAPACITY OF INFORMANT</td>
                  <td class="cert_table"><?php echo $row['Name_and_cpty_of_informant'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">OTHER INFORMANT</td>
                  <td class="cert_table"><?php echo $row['Other_informant'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">RESIDENCE OF INFORMANT</td>
                  <td class="cert_table"><?php echo $row['Residence_of_informant'] ?></td>
               </tr>
               <tr>
                  <td class="cert_table">DATE OF REGISTRATION</td>
                  <td class="cert_table"><?php echo $row['Date_of_registration'] ?></td>
               </tr>
            </table>
            <hr class="hr1_cert">
            <!-- <input type="hidden" id="cert_input" name="ID_number" value="<?php echo $row['ID_number'] ?>"/> <br>
            <input type="hidden" name="email" value="<?php echo $row['email'] ?>"/><br> -->
           <br>
            <p>I hereby certify that the above certificate is a true copy of the particulars recorded
               in relation to the birth of the said child in the National Identity 
            Register kept at NATIONAL IDENTITY & CIVIL REGISTRY OFFICE, MASERU, LESOTHO.</p>

     <center><p><b>Dated this <?php $date = date("Y-m-d",strtotime("+6 HOURS")); echo $date;?></b> </p></center><br>

          <table id="t2_cert">
             <tr id="t2_cert">
                <td id="t2_cert">PLACE..........................</td>
                <td id="t2_cert">...............................</td>
           </tr>
                <td id="t2_cert">DATE............................</td>
                <td id="t2_cert">District Manager</td>
          </table>
     
         </div>
         <!-- ends here -->
         <br>
         <a href="admin_report.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Back</a>

         <!-- script for downloading certificate -->
         <script>
            const printBtn = document.getElementById('print');
            printBtn.addEventListener('click', function(){
               print();
            })
         </script>
         
         <?php
    }
}


?>
<a href="admin_homepage.php" style="font-size: 20px; float:right;"><i class="fa fa-arrow-left"></i> Return Home</a><br><br>
</center>
