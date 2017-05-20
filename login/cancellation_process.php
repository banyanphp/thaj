<?php
session_start();
//unset($_SESSION['$timeslott']);

//unset($_SESSION['times']);

//unset($_SESSION['doctor_id']);

//unset($_SESSION['pid']);
@include("../config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Calcutta');
$uname = $_SESSION['user'];
$time=$_REQUEST['timeslot'];
$id=$_REQUEST['pid'];
 $time=trim($time);
   $date=$_REQUEST['date'];
   $getfirsttime = explode("-", $time);
   
   $getstarttime=trim($getfirsttime[0]);
   
   $getendtime=trim($getfirsttime[1]);
   $enddatetime= substr($getendtime, 0, -3);
  $update=date("Y-m-d H:i:s");
$mysql_query=  mysql_query("UPDATE `tbl_patientlist` SET `fld_datetime`='$getstarttime',`fld_enddatetime`='$enddatetime',`fld_updatedon`='$update',`consultant_date`='$date' WHERE `fld_id`='$id' ");
$fetch_data=mysql_fetch_array(mysql_query("select * from `tbl_patientlist` WHERE `fld_id`='$id'"));
$doctorname=$fetch_data['fld_dcname'];
$fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$doctorname'"));
                                                $to = $fet['mobile_no'];

if($mysql_query){
$app="Name:";
$app.=$fetch_data['fld_name'];
$app.="Date:";
$app.=$date;
$app.="Time:";
$app.=$getstarttime."-".$enddatetime;
$url = "http://api-alerts.solutionsinfini.com/v3/?method=sms&api_key=74300s8i2w0hat48w7v7&to=$to&sender=DRTHAJ&message=$app";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
    echo "appointment Rescheduled";
}
else{
  echo "Error occured Please y";  

}
?>
