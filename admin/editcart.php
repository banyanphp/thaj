<?php 
error_reporting(E_ALL ^ E_NOTICE);
include('config.php');
include('common.php');
include('user_sessioncheck.php');
error_reporting(E_ALL ^ E_NOTICE);
$oper=$_REQUEST['op'];

if($oper=="update")
{
	$updcatid=$_REQUEST['hidcartid'];
	$updprodqty=$_REQUEST['uptxtprodqty'];
	$martrixins=$_SESSION['matrixmailid'];
	$reference = "trxn".'_'.$martrixins;
	
	if($updprodqty!="")
	{
	 $sql="UPDATE $reference SET fld_prodqty='$updprodqty' WHERE fld_id='$updcatid'";
	 $result=mysql_query($sql) or die("Database Error");
	}
	// if successfully updated. 
	if($result){
	echo "Successful";
	}
	else
	{
	 echo "ERROR";
    }
}

if($oper=="edit")
{
	$updcatid=$_REQUEST['cartid'];
	$martrixins=$_SESSION['matrixmailid'];
	$reference = "trxn".'_'.$martrixins;
	?>
    <div id="divupdate" style="display:block;">
	<table class="table table-bordered" style="width:100%;" id="tblmatrixresult">
 <thead>   
<tr>
      <th>Brand Name</th>
      <th>Product Name</th>
      <th>Quantity</td>
      <th>Unit Price</td>
      <th>Total</td>
      <th>Edit</td>
      <th>Delete</th>
</tr>
</thead>
<tbody>
<?php
$sql="SELECT * FROM $reference";
$result=mysql_query($sql) or die("Database Connection Error");
while($rows=mysql_fetch_array($result))
{	
$cartid = $rows['fld_id'];
$brandname=$rows['fld_brand'];
$prodname=$rows['fld_product'];
$prodqty = $rows['fld_prodqty'];
$unitpricee = $rows['fld_unitprice'];
$total = $rows['fld_totalprice'];
?>
<tr>
<?php
if($updcatid==$cartid)
{
?>
      <td><?php echo $brandname;?></td>
      <td><?php echo $prodname;?></td>
      <td><input name="hidcartid" type="hidden" id="hidcartid" value="<?php echo $cartid;?>">
        <input type="text" id="txteditprodqty" name="txteditprodqty"  value="<?php echo $prodqty;?>" style="width:50px;height:25px;Margin-bottom:-2px;border-top:1px solid #ddd" onkeypress="return isNumberKey(event);" maxlength="5"/></td>
        <td style='width:100px;height:25px;Margin-bottom:-2px;background:white;border-top:1px solid #ddd'><?php echo $unitpricee;?></td>
        <td style="width:100px;height:25px;Margin-bottom:-2px;;background:white;border-top:1px solid #ddd" readonly><?php echo $total;?></td>
      <td align="center"><img src="save.png" onclick="fn_updatecart('<?php echo $cartid;?>')" alt="save" style="cursor:pointer" /></td>
	  
      <?php
}
else
{
?>
	  <td><?php echo $brandname;?></td>
      <td><?php echo $prodname;?></td>
      <td><?php echo $prodqty;?></td>
      <td style='width:100px;height:25px;Margin-bottom:-2px;background:white;border-top:1px solid #ddd'><?php echo $unitpricee;?></td>
      <td style='width:100px;height:25px;Margin-bottom:-2px;background:white;border-top:1px solid #ddd'><?php echo $total;?></td>
      <td align="center"><img src="edit.png" onclick="fn_editcart('<?php echo $cartid;?>')" alt="edit" style="cursor:pointer" /></td>     
      <?php
}
?>
 <td style="width:8%"><div align="center"><a href="#" id="<?php echo $cartid;?>" class="delbutton" title="Click To Delete"><img src="delete.png"/></a></div></td>
</tr>
</tbody>
<?php
}
?>
</table>
</div>
<?php
echo "~";
}

?>

