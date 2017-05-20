<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$oper = $_REQUEST["op"];

			if($oper=="addspecs")  
			{ 
				$specname =$_REQUEST["upspecname"];
				$spctitle = $_REQUEST["title"];
				echo $reference = $spctitle;				
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$reference."'"))==1)				
				{
					//echo "if";
					$sql1 = 'INSERT INTO '.$reference.' (fld_name,fld_delstatus) VALUES ("'.$specname.'",0)';
					
					//$inserttemp = "INSERT INTO '.$reference.' (fld_name,fld_delstatus) values ('$specname','0')";
					mysql_query($sql1);			 									
					echo "Valid";							
				}
				else 
				{		
					//echo "else";
					$sql = 'CREATE TABLE '.$reference.' (fld_id INT NOT NULL AUTO_INCREMENT,fld_name VARCHAR(155) NOT NULL,fld_delstatus INT NOT NULL,primary key (fld_id))';
					mysql_query($sql);					
					$sql2= 'INSERT INTO '.$reference.' (fld_name,fld_delstatus) VALUES ("'.$specname.'",0)';
					//$inserttemp = "INSERT INTO '.$reference.' (fld_name,fld_delstatus) values ('$specname','0')";
					mysql_query($sql2);
					echo " Not Valid";	
				}
			}
?>


