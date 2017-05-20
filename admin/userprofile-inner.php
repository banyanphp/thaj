<?php
@include("user_sessioncheck.php");
error_reporting(E_ALL ^ E_NOTICE);
@include("config.php");
@include("common.php");
@include('configg.php');
@include('functions.php');
$oper = $_REQUEST["op"];
 if($oper=="save") 
 {     
	echo "testing";
	exit;
					
}
?>