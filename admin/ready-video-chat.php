<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');
$current =  date("H:i");
$currenttz =  date("H:i" , strtotime('+15 minutes'));

$currenttz1 =  date("H:i" , strtotime('+30 minutes'));

$showtime = $current." - ".$currenttz;

$showtime1 = $currenttz." - ".$currenttz1;

$uname = $_SESSION['uname'];
$imagepath = 'doctors_images/';
$patientiddd = $_REQUEST['pid'];
 $dataset = mysql_query("SELECT * FROM `tbl_patientlist` WHERE fld_id = '$patientiddd'");
	while($fetch_date1= mysql_fetch_array($dataset)) 
	{ 
	$patient_time1 = $fetch_date1['consultant_date'];
	$datetime = $fetch_date1['fld_datetime'];
	$fld_name = $fetch_date1['fld_name'];
	$fld_docname = $fetch_date1['fld_dcname'];
	$datefromdb = $patient_time1;	
	  $fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$fld_docname'"));
	  $doctor_id_fetch_to_name=$fet['fld_name'];
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Patient List | Dashboard</title>
		
		<style>
			.table tbody tr.rowlink:hover td {background-color: #efefef}
			
		</style>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       
        
        <div id="maincontainer" class="clearfix">
		
            <!-- header -->
				<?php 
			include("header.php");
			?>
			<!-- header -->
			
          <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading">Ready Video Chat</h3>							
							<?php
							echo $seldc = "SELECT * from `tbl_patientlist` where fld_dcname ='$fld_docname' and fld_datetime ='$showtime'";							
							$result = mysql_query($seldc)or die(mysql_error());
							$nowrows = mysql_num_rows($result);
							$row=mysql_fetch_array($result);
							//echo "tamil".$totaltime = $row['fld_datetime'];
							//echo $fromtime[0]  = (explode(' - ',$totaltime));
							//$from = $row['fld_datetime'];							
							if($nowrows >=1)
							{
							?>
							<iframe src="https://appear.in/<?php echo $doctor_id_fetch_to_name; ?>" target="_blank" frameborder="0" width="800" height="400"></iframe>
							<?php
							}
							else
							{
							?>
							<img src="videochat-screen.png"/>
							<?php
							}
							?>
							
							 </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	



</div>

    </body>
</html>