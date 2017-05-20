<?php 
@include("config.php");

$oper=$_REQUEST['op'];	
 if($oper=="search")  
 	{ 
	 $searchval =$_REQUEST['name'];	 
	 $catid =$_REQUEST['catid'];
	 				
			$catqruyy= mysql_query("Select distinct category.fld_level0id,category.fld_level0,category.fld_tablename 
                                           from tbl_categoriess category 
                                           where category.fld_level0id in('$catid')");  	
                	 while($row1=mysql_fetch_array($catqruyy))
                     {	
                         $cid=$row1['fld_level0id']; 		  
                         $cname = $row1['fld_level0'];
                         $ctablenamee = $row1['fld_tablename'];	
						 	
						  $brand = array();						 
						  $resltbrnd = mysql_query("Select distinct brnd.fld_brandname from $ctablenamee brnd 
												  join tbl_supplierregister supplier on brnd.fld_brandid = supplier.fld_brand 
												  where brnd.fld_level0id in($catid)");  			 						 
							 while($rowbrnd = mysql_fetch_array($resltbrnd) )
							 {					
									$brand[]= $rowbrnd['fld_brandname'];					
							 }				
					
						$products = array();
						$resltprod=mysql_query("Select distinct subcategory.fld_level2 from $ctablenamee subcategory 
									  join tbl_supplierregister supplier on subcategory.fld_brandid = supplier.fld_brand 
									  where subcategory.fld_level0id in($catid) and subcategory.fld_level2 like '%$searchval%'");
							  	
							while($rowprod = mysql_fetch_array($resltprod) )
							 {					
									$products[]= $rowprod['fld_level2'];					
							 }
				
							echo '<table cellpadding="6" cellspacing="6" border="1" rules="all" align="center" id="chktable">';
							$countproducts = count($products);
							$countbrnd = count($brand);
							$k=0;

							echo "<tr><td>Product/Brand</td>";							
							foreach($brand as $key1=> $value1)
							{
								 echo "<td>" .$value1. "</td>"; 
							}
					
							echo '</tr>';

							foreach($products as $key=>$value2)
								{
									echo "<tr><td> $value2 </td>";		
									for($i=1; $i<=$countbrnd;$i++)
									{
									echo '<td><input type="checkbox" class="test" id="chkprodid[]'.''.$i.'-'.$key.'" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" value="'.($value1).'-'.$value2.'">
									<input type="text" id="txtprodqty" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" style="width:50px;height:25px;Margin-bottom:-2px;" onkeypress="return isNumberKey(event);" maxlength="5"/></td>';'</tr>';
									} 		
								}
								
							echo '</table>';
?> 
					<?php
					 }
	}
					 ?>
  			

    
    