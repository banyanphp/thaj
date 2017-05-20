<?php
@include('invoice.php');
@include('config.php');
include('user_sessioncheck.php');
//include('master-details-functions.php');

$directory ="C:/wamp/www/99/supplier/PDF/";
$filecount = 0;
$files = glob($directory . "*");
if ($files){
 $filecount = count($files);
}
//echo "There were $filecount files";

$filecount = $filecount+1;
$app = "BUILD99/PDF/".$filecount;
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
//$pdfuser = $_SESSION['username'];
error_reporting(E_ALL ^ E_NOTICE);
$martrixins=$_SESSION['matrixmailid'];
$reference = "trxn".'_'.$martrixins;
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$Today=date('d-M-Y');
$pdf->addEcheance($Today);
$pdf->addNumTVA($app);
$cols=array( "Brand Name"    => 50,
             "Product Name"  => 70,
             "Quantity"     => 25,
             "Unit Price"      => 25,
             "Total" => 31);
$pdf->addCols( $cols);
$cols=array( "Brand Name"    => "L",
             "Product Name"  => "L",
             "Quantity"     => "C",
             "Unit Price"      => "R",
             "Total" => "R");

$y    = 80;
$result=mysql_query("select * from $reference") or die("Database Error in PDF Generation");
$result11 = mysql_num_rows($result);
$y_axis = 20;

//initialize counter
$pagelimit = 0;

//Set maximum rows per page
$max = 14;
//echo $result11;

for($i=0;$i<$result11;$i++)
{
	$row = mysql_fetch_array($result,MYSQL_ASSOC);
	
		if($pagelimit == $max)
		{
		$pdf->AddPage();
		$Today=date('d-M-Y');
		$pdf->addEcheance($Today);
		$pdf->addNumTVA($app);
		$y    = 80;
		$y_axis = 20;
		//print column titles for the current page
			$cols=array( "Brand Name"    => 50,
             "Product Name"  => 70,
             "Quantity"     => 25,
             "Unit Price"      => 25,
             "Total" => 31);
			$pdf->addCols( $cols);
			$cols=array( "Brand Name"    => "L",
             "Product Name"  => "L",
             "Quantity"     => "C",
             "Unit Price"      => "R",
             "Total" => "R");
			

	}
	
	//echo $i+1;
	$brand = $row['fld_brand'];
	$product = $row['fld_product'];
	$qty = $row['fld_prodqty'];
	$upric = $row['fld_unitprice'];
	$totalprce =$row['fld_totalprice'];
	
//	echo $brand." - ".$product." - ".$qty."<br>";

$line = array( "Brand Name"    => $brand,
               "Product Name"  => $product,
               "Quantity"     => $qty,
               "Unit Price"      => $upric,
               "Total" => $totalprce);
			   			   
				$pdf->SetY($y_axis);
				$size = $pdf->addLine($y, $line);
				//Go to next row
				$y_axis = $y_axis + $size;
				$y = $y + 10;
				$pagelimit = $pagelimit + 1;
				$y_axis = $y_axis + $size;
				$y = $y + 10;
				$gtotal = $totalprce;
				

}
//$pdf->Cell(50, 180, 'SubTotal', 0, 1, 'L');;
$dir="C:/wamp/www/99/supplier/PDF/";
$filename= "BUILD99-PDF-$filecount.pdf";
$pdf ->Output($dir.$filename,'F');

if($pdf)
    echo "<script>alert('PDF Generated Successfully!'); location.href='mailbox.php';</script>";

	mysql_query("DELETE FROM $reference");

?>
