<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
@include("config.php");
$oper=$_REQUEST['op'];
if($oper=="upddoctor")
{
	$id1=$_REQUEST['prdid'];
	//$tablename=$_REQUEST['aptablename'];	
	if($tbl_name!="")
	{
	$sql="UPDATE tbl_$tbl_name SET fld_delstatus='1' WHERE fld_prodid='$prodid' and fld_delstatus='9'";
	$result=mysql_query($sql);
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

if($oper=="deldc")
{
	$id1=$_REQUEST['dcid'];	
	
	if($id1!="")
	{
	$sql="UPDATE tbl_doctors SET fld_delstatus='2' WHERE fld_id='$id1' and fld_delstatus='0'";
	$result=mysql_query($sql);
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
?>