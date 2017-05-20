<?php
session_start();
@include("config.php");
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['password'];
	$md5 = md5($pass);
	$query = "SELECT * FROM tbl_admin where fld_username ='$email' and fld_password='$md5'";
	$result = mysql_query($query)or die(mysql_error());
	$nowrows = mysql_num_rows($result);
	$row=mysql_fetch_array($result);
			if($nowrows >=1)
			{
			$_SESSION['uname'] = $row['fld_username'];	
                        if($_SESSION['uname']=="admin"){
                           $_SESSION['userid']=$row['fld_id'];
                            
                        }
                        else{
			$_SESSION['doctor_id'] = $row['user'];
                         $_SESSION['userid']=$row['fld_id'];
                        }
			$permiss = $_SESSION['permission'] = $row['fld_delstatus'];	
            if($permiss==1)
			{
			echo "true";
			}
			else
			{
			echo "trueing";
			}
			}
			else
			{
				echo "false";
			}
			
 			
	     //echo "SELECT * FROM tbl_admin where fld_username ='$email' and fld_password='$md5'";
?>
