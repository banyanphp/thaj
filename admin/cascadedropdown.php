<?php
session_start();
@include('config.php');
@include('configg.php');
error_reporting(E_ALL ^ E_NOTICE);
@include('functions.php');
$oper = $_REQUEST["op"];
if($oper == "subcat")
{
	$catid1 = $_REQUEST["catid"];	
	
	$subcatqry = "SELECT Distinct fld_level2id,fld_level2name FROM tbl_level2 where fld_level1id='$catid1' Order by fld_level2name ASC";
	$subcatqry1 = mysql_query($subcatqry);
	?>
	<option value="0">Select</option>
    <?php
	while($row=mysql_fetch_array($subcatqry1,MYSQL_ASSOC))
	{
		$subcatid = $row['fld_level2id'];
		$subcatname = $row['fld_level2name'];
		$subcatname1 = ucwords($subcatname); 	
	?>
			<option value="<?php echo $subcatid; ?>"><?php echo $subcatname1; ?></option> 
		
    <?php	
	}
}

if($oper == "subminicat")
{
	$subcatid = $_REQUEST["subcatid"];
	$catid = $_REQUEST["catid"];
	
	
	$subcatqry = "SELECT distinct fld_level3id,fld_level3name,fld_tablename FROM tbl_level3 where fld_level2id='$subcatid'";
	$subcatqry1 = mysql_query($subcatqry);
	?>
	<option value="0">Select</option>
    <?php
	while($row=mysql_fetch_array($subcatqry1,MYSQL_ASSOC))
	{
		$subminicatid = $row['fld_level3id'];
		$subminicatname = $row['fld_level3name'];
		$subminicatname1 = ucwords($subminicatname);		
	?>
    <option value="<?php echo $subminicatid; ?>"><?php echo $subminicatname1; ?></option>
    
    <?php
	
	}
}


if($oper == "brand")
{
	$catid = $_REQUEST["catid"];
	$subcatid = $_REQUEST["subcatid"];
	$subminicatid = $_REQUEST["subminicatid"];
		
				$sql = "Select distinct fld_level3id,fld_level3name,fld_tablename from tbl_level3 where fld_level3id = '$subminicatid'";
                $reslt = mysql_query($sql) or die ("Error");
                $num_row = mysql_num_rows($reslt);
                $row=mysql_fetch_array($reslt);               	
                $lvl3id =$row['fld_level3id'];
                $lvl3name =$row['fld_level3name'];	
                $tblname = $row['fld_tablename'];
	
	$brndqry = "SELECT distinct fld_brandid,fld_brandname FROM $tblname where fld_delstatus=0 ORDER BY fld_brandname ASC";
	$brndqry1 = mysql_query($brndqry);
	?>	
	<input type="text" id="txttblname" name="txttblname" value="<?php echo $tblname; ?>"/>
	<option value="0">Select</option>
    <?php
	while($row=mysql_fetch_array($brndqry1,MYSQL_ASSOC))
	{
		$brandid = $row['fld_brandid'];
		$brandname = $row['fld_brandname'];
		$brandname1 = ucwords($brandname);
		
	?>
    <option value="<?php echo $brandid; ?>"><?php echo $brandname1; ?></option>
	
    
    <?php
	
	}}
	
	
if($oper == "product1")
{
	$_SESSION['catid'] = $catid = $_REQUEST["catid"];
	$_SESSION['subcatid'] = $subcatid = $_REQUEST["subcatid"];
	$_SESSION['subminicatid'] = $subminicatid = $_REQUEST["subminicatid"];
	$_SESSION['brandid'] = $brandid = $_REQUEST["brandid"];	
	
			$sql = "Select distinct fld_level3id,fld_level3name,fld_tablename from tbl_level3 where fld_level3id = '$subminicatid'";
                $reslt = mysql_query($sql) or die ("Error");
                $num_row = mysql_num_rows($reslt);
                $row=mysql_fetch_array($reslt);               	
                $lvl3id =$row['fld_level3id'];
                $lvl3name =$row['fld_level3name'];	
                $tblname = $row['fld_tablename'];	
	
				$brndqry = "SELECT distinct fld_prodid,fld_prodname FROM $tblname where fld_delstatus=0 and fld_brandid = $brandid ORDER BY fld_prodname ASC";
				$brndqry1 = mysql_query($brndqry);
				?>
				<option value="0">Select</option>
				<?php
				while($row=mysql_fetch_array($brndqry1,MYSQL_ASSOC))
				{
					$prdid = $row['fld_prodid'];
					$productname1= $row['fld_prodname'];
					$productname = ucwords($productname1);
					
				?>
				<option value="<?php echo $productid; ?>"><?php echo $productname; ?></option>
				
				<?php
				
				}
}
				
			?>
