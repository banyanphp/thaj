<?php 
error_reporting(E_ALL ^ E_NOTICE);
include('config.php');
include('common.php');
include('user_sessioncheck.php');

	$deleteid=$_REQUEST['single_deleteoutmailid'];
	
	if($deleteid!="")
	{
	$sql = "Update tbl_postrequirement Set fld_delstatus=2 WHERE fld_postid='$deleteid'";
 	$result = mysql_query($sql);
	}
	// if successfully updated. 
	if($result){
		
		header("Location:mailbox.php");
		
	}
	else
	{
	 echo "Error";
    }

?>