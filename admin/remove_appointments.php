<?php 
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');

$doctor_id=$_POST['doctor_id'];
$action=$_POST['action'];
$timeslott=$_POST['c_id'];

$date=$_POST['date'];



foreach ($timeslott as $slot){
       $slot=trim($slot);
   
   $getfirsttime = explode("-", $slot);
   
   $getstarttime=trim($getfirsttime[0]);
   
   $getendtime=trim($getfirsttime[1]);
   
		$q2=mysql_query("SELECT * FROM `tbl_cancelappointment` where doctor_id='$doctor_id' and time='$getstarttime' and end='$getendtime' and date='$date'");
		$numr=mysql_num_rows($q2);
		if($numr==0){
                    
	$q=mysql_query("INSERT INTO `tbl_cancelappointment` (`id`, `date`, `time`,`end` ,`doctor_id`, `delstatus`) VALUES (NULL, '$date', '$getstarttime','$getendtime', '$doctor_id', '0')");
		}
	
}

if($q){
	//echo $q3;
	echo "<div class='btn btn-success'style='margin-bottom: 10px;width: 80%;'>Appointments are Cancelled</div>";
}

else{	
//echo $q3;
$row=mysql_fetch_array($q2);

$remover=$row['time'];
	echo "<div class='btn btn-danger'style='margin-bottom: 10px;width: 80%;'>This time $remover is already cancelled by You</div>";
}

?>