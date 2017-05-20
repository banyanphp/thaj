<?php 
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');

$currentpassword=md5($_POST['cpassword']);
$doctorpassword=md5($_POST['doctorpassword']);
$rdoctorpassword=md5($_POST['rdoctorpassword']);
$user=$_SESSION['doctor_id'];
//print_r($_SESSION);
$q=mysql_query("select * from  tbl_admin where fld_password='$currentpassword' and user='$user'");
//echo "select * from  admin where fld_password='$currentpassword' and user='$user'";
$num =mysql_num_rows($q);
if($num==1){
$q2=mysql_query("update tbl_admin set fld_password='$doctorpassword' where fld_password='$currentpassword' and user='$user'");
if($q2)
{
	 echo "1 "; 
}
}
else{
		 echo "2"; 
}
?>