<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include ("configg.php");
@include ("functions.php");
date_default_timezone_set('Asia/Kolkata');
$todaydate = date("Y-m-d");
$doctor_id = $_POST['doctorname'];
if (!empty($_POST['timeslot'])) {
    $deletetime = $_POST['timeslot'];
    $deletecount = count($deletetime);

    for ($i = 0; $i < $deletecount; $i++) {
        $slottime = $deletetime[$i];

        $getfirsttime = explode("-", $slottime);
        $getstarttime = trim($getfirsttime[0]);
        $getendtime = trim($getfirsttime[1]);
        $deleteslot=mysql_query("Delete from `tbl_timeslot` where doctor_id='$doctor_id' and fld_from='$getstarttime' and fld_to='$getendtime'");
       // echo "Delete from `tbl_timeslot` where doctor_id='$doctor_id' and fld_from='$getstarttime' and fld_to='$getendtime'";
   echo "<script>window.location.href='timeslot.php'; </script>";
    }
}
if (!empty($_POST['from']) && !empty($_POST['to'])) {

    $from = $_POST['from'];
    $to = $_POST['to'];
    $fromcount = count($from);

    $tocount = count($to);
    if ($fromcount == $tocount) {
       
        for ($q = 0; $q < $fromcount; $q++) {
            $fromtime = $from[$q];
            $totime = $to[$q];
            $totaltime=$fromtime."-".$totime;
$check_exist_timeslot=  mysql_query("select * from `tbl_timeslot` where doctor_id='$doctor_id' and fld_from='$fromtime' and fld_to='$totime'");
$timeslotcount=  mysql_num_rows($check_exist_timeslot);
//echo $timeslotcount;
if($timeslotcount==0)
    {
           $qs = mysql_query("INSERT INTO `tbl_timeslot` (`fld_id`, `date`, `fld_from`, `fld_to`, `doctor_id`, `fld_delstatus`) VALUES (NULL, '$todaydate', '$fromtime', '$totime', '$doctor_id', '0')");
            echo "<script>window.location.href='timeslot.php'; </script>";
}
else{
      echo "<script>window.location.href='timeslot.php?timeslot=$totaltime'; </script>";
}
       
        }
    }
}
?>