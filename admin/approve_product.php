<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
@include("config.php");
$oper=$_REQUEST['op'];
if($oper=="updcat")
{
	$id1=$_REQUEST['approdid'];
	//$tablename=$_REQUEST['aptablename'];
	
	if($id1!="")
	{
	$sql="UPDATE tbl_$tbl_name SET fld_delstatus='1' WHERE fld_prodid='$id1' and fld_delstatus='9'";
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

if($oper=="delcat")
{
	$id1=$_REQUEST['approdid'];
	$splfilters = explode("tbl_",$id1);
	$prodid = $splfilters[0];
	$tbl_name = $splfilters[1];
	
	if($prodid!="")
	{
	$sql="UPDATE tbl_$tbl_name SET fld_delstatus='2' WHERE fld_prodid='$prodid' and fld_delstatus='9'";
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