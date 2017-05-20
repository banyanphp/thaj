<?php
session_start();
@include("config.php");
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];	  
	$query = "SELECT * FROM tbl_supplierregister where fld_email = '$email' and fld_pswd='$password' and fld_userstatus=1";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row >= 1 ) 
		{			
			$_SESSION['uname'] =$row['fld_fname'];	
			$_SESSION['email'] =$row['fld_email'];	
 			echo 'true';			
		}
		else
		{
			echo 'false';
		}	
?>
