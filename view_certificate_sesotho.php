

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
<p id="message_cert">Kenya nomoro ea lengolo e fanoeng molaetseng (notifications) ho batla lengolo.</p>
   <div class="view_cert_div">
        <form action="" method="POST" id="cert_search_form">
                        <input type="text" name="certificate_number" placeholder="Kenya nomoro ea lengolo" id="input_form_cert"/>
                        <input type="submit" name="search" value="Batla" id="input_search_cert">
                        <input Print id="print" value="Download">
                     </form>
  </div>

  
<center>
 

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
     <!-- <p id="pp_cert">PLACE ............................</p>      <p id="p_cert">.............................................</p>
     <p id="pp_cert">DATE..............................</p>               <p id="p_cert">District Manager</p> -->

          <table id="t2_cert">
             <tr id="t2_cert">
                <td id="t2_cert">PLACE..........................</td>
                <td id="t2_cert">...............................</td>
           </tr>
                <td id="t2_cert">DATE............................</td>
                <td id="t2_cert">District Manager</td>
          </table>
     
         </div>
         <br>
         <a href="view_certificate_sesotho.php" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> Khutlela Morao</a>
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
<a href="user_homepage_sesotho.php" style="font-size: 20px; float:right;"><i class="fa fa-arrow-left"></i> Khutlela Home</a><br><br>
</center>
