<?php 
include('fpdf.php');
include('config.php');
include('common.php');
include('user_sessioncheck.php');
include('master-details-functions.php');

$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
//$pdfuser = $_SESSION['username'];
error_reporting(E_ALL ^ E_NOTICE);
$martrixins=$_SESSION['matrixmailid'];
$reference = "trxn".'_'.$martrixins;

$result=mysql_query("select * from $reference") or die("Database Error in PDF Generation");               
				$result11 = mysql_num_rows($result);
				while($row=mysql_fetch_array($result))
				{
				$brndname = $row['fld_brand'];
				$prodname = $row['fld_product'];
				$prodqty  = $row['fld_prodqty'];	
				}
?>