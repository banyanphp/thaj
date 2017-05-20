<?php
include('config.php');
include('common.php');
include('user_sessioncheck.php');
$oper = $_REQUEST["op"];
echo "test";

 if($oper=="insert")  
 	{ 
					$chkIds =$_REQUEST["chkIdds"];
					$quotation = explode("!",$chkIds);						
					$brandname= $quotation[0];
					$productname = $quotation[1];
					$productqty = $quotation[2];	
					$martrixins= $_SESSION['matrixmailid'];																				
					$reference = "trxn".'_'.$martrixins;
					
					if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$reference."'"))== 1) 
					{						
						$inserttemp = "INSERT INTO $reference (fld_brand,fld_product,fld_prodqty)
						values ('$brandname','$productname','$productqty')";
						mysql_query($inserttemp);			 									
						echo "Valid";	
						echo "<SCRIPT LANGUAGE='javascript'>";
						echo "fn_yes()";
						echo "</SCRIPT>";				
					}
					
					else 
					{										
    				 $sql = "CREATE TABLE $reference (fld_id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(fld_id),fld_brand VARCHAR(500),fld_product VARCHAR(500),
						   			fld_prodqty INT(255),fld_unitprice INT(255),fld_totalprice INT(255))";						   
			  				mysql_query($sql);
					
								$inserttemp = "INSERT INTO $reference (fld_brand,fld_product,fld_prodqty)
								 values ('$brandname','$productname','$productqty')";
								mysql_query($inserttemp);			 									
						
					}
					
	 } 
	 
	 
 if($oper=="insertprice")  
	{ 		
		$totpricee =$_REQUEST["totalpriceeee"];
		$tprice = explode("-",$totpricee);						
		$unitpricee= $tprice[0];
		$rowwiddd = $tprice[1];
		$prodqtty = $tprice[2];
		echo $totlprice1 = ($unitpricee) * ($prodqtty) ;	
		$martrixins= $_SESSION['matrixmailid'];																				
		$referencee = "trxn".'_'.$martrixins;
		
				echo $upqry = "Update $referencee SET fld_unitprice=$unitpricee,fld_totalprice=$totlprice1 where fld_id =$rowwiddd";
				mysql_query($upqry);			 				
		
			/*echo $upprice = "Update $referencee SET fld_unitprice =10 where fld_id='".$rowwiddd."'";
			mysql_query($upprice);	*/		 									
			echo "Valid";	
			echo "<SCRIPT LANGUAGE='javascript'>";
			echo "fn_yes()";
			echo "</SCRIPT>";	
		
	} 
 
	 
	
?>


