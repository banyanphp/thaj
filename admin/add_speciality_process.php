<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include ("configg.php");
@include ("functions.php");
$specialities=$_POST['speciality'];
$uname = $_SESSION['uname'];
$doctor_id = $_SESSION['doctor_id'];
$userid = $_SESSION['userid'];
$datetime=  date("Y-m-d h:i:s");
if($userid!=1){
    ?>
<script>
    window.location.href='error_404.php';
    </script><?php
}
$datetime=  date("Y-m-d h:i:s");
$q=mysql_query("INSERT INTO `tbl_specialities`(`fld_specialities`, `fld_createdon`, `fld_delstatus`) VALUES ('$specialities','$datetime',0)");
if($q){
    echo "Created Successfully";
}
else{
    echo "Something error Occured Please Try again Later"; 
}
?>

