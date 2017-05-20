<?php 
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
if(session_destroy())
{
	header('Location:index.php');
}
	?>