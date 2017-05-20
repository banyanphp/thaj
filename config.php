<?php

$mysql_hostname = "localhost";
$mysql_user = "drthajsk_thaj"; 
$mysql_password = "thaj456"; 
$mysql_database = "drthajsk_thaj"; 
$prefix = "";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die(mysql_error());
mysql_select_db($mysql_database, $bd) or die(mysql_error());


/*
$con = mysqli_connect("localhost","drthajsk_thaj","thaj456","$thaj456");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }*/
?>