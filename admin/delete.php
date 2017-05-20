<?php /*?><?php
include('config.php');
$matrixdelid=$_SESSION['matrixmailid'];
$reference = "trxn".'_'.$matrixdelid;
if($_REQUEST['id'])
{
$id=$_REQUEST['id'];
 $sql = "DELETE FROM $reference WHERE fld_id='$id'";
 mysql_query( $sql);
}

?>
<?php */?>

<?php 
error_reporting(E_ALL ^ E_NOTICE);
include('config.php');
include('common.php');
include('user_sessioncheck.php');


	$deleteid=$_REQUEST['id'];
	echo "Delete ID :".$deleteid;
	$martrixins=$_SESSION['matrixmailid'];
	$reference = "trxn".'_'.$martrixins;
	
	if($deleteid!="")
	{
	$sql = "DELETE FROM $reference WHERE fld_id='$deleteid'";
 	$result = mysql_query($sql);
	}
	// if successfully updated. 
	if($result){
	echo "Successful";
	}
	else
	{
	 echo "ERROR";
    }

?>
