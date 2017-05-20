<?php
session_start();

@include("../config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

@include("user_sessioncheck.php");
$id=$_REQUEST['id'];
$query=mysql_query("INSERT INTO `tbl_videochat`(`appointment_id`, `status`) VALUES ('$id','1')");
if($query){
     echo "<script>

       
        window.location.href='doctorslist.php';
        </script>";
        
}
else{
     echo "<script>

       
        window.location.href='doctorslist.php';
        </script>";
        
}

