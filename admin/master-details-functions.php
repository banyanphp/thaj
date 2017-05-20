<?php
include('config.php');
$catid =$_SESSION["catid"];
$subcatid =$_SESSION["subcatid"];
$brandid =$_SESSION["brandid"];

$catqry= mysql_query("Select distinct category.fld_level0id,category.fld_level0,category.fld_tablename 
									from tbl_categoriess category 
									where category.fld_level0id = '$catid'");  	
		 while($row=mysql_fetch_array($catqry))
			 {	
				$cid=$row['fld_level0id']; 		  
				$cname = $row['fld_level0'];
				$ctablename = $row['fld_tablename'];				
			 }		


 		function getBrandName($bid)
		{
			$br = mysql_query("SELECT * FROM $ctablename where fld_level0id=$catid and fld_level1id=$subcatid and fld_brandid = '$bid'");
			$row = mysql_fetch_array($br);
			return ucfirst($row['fld_brandname']);	
		}
		
		function getProductName($pid)
		{	
			$prt = mysql_query("SELECT distinct * FROM $ctablename where fld_level0id=$catid and fld_level1id=$subcatid and fld_brandid=$pid");
			$row = mysql_fetch_array($prt);
			return ucfirst($row['fld_level2']);
		}

?>