<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include ("configg.php");
@include ("functions.php");
$langauges=$_POST['langauges'];
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
$q=mysql_query("INSERT INTO `tbl_languages`(`fld_languages`, `fld_delstatus`) VALUES ('$langauges','0')");
if($q){
    echo "Created Successfully";
}
else{
    echo "Something error Occured Please Try again Later"; 
}
?>

