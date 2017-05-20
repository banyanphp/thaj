<?php 
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');

$todaydate=date("Y-m-d");
$doctor_id=$_POST['doctor_id'];
$action=1;
$timeslott=$_POST['time'];
$cancelid=$_POST['id'];
$date=$_POST['date'];
     $slot=trim($timeslott);
   
   $getfirsttime = explode("-", $slot);
   
   $getstarttime=trim($getfirsttime[0]);
   
   $getendtime=trim($getfirsttime[1]);

$q2=mysql_query("SELECT * FROM `tbl_cancelappointment` where doctor_id='$doctor_id' and time='$getstarttime' and date='$date' and date> $todaydate and delstatus='0'");
		$numr=mysql_num_rows($q2);

		if($numr>0){
			$q3=mysql_query("delete  from `tbl_cancelappointment` where doctor_id='$doctor_id' and time='$getstarttime' and date='$date' and date> $todaydate and id='$cancelid' and delstatus='0' ");
		}
                
		if($q3){
				echo "<div class='btn btn-success'style='margin-bottom: 10px;width: 80%;'>Appointments are Rescheduled</div>";
		}
               
?>