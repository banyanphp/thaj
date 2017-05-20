<?php
session_start();
@include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['user'];
$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');
//Get Only Current Time 00:00 AM / PM
//$current = date("H:i");
$current = date("H:i", strtotime('+30 minutes'));

$current_date = date("Y-m-d");
$current_times = date("H:i");
$id=$_GET['id'];
$query=  mysql_fetch_array(mysql_query("select * from tbl_patientlist where fld_id=$id"));
$name=$query['fld_name'];
$dcid=$query['fld_dcname'];
                                            $q = mysql_fetch_array(mysql_query("select * from tbl_doctors where `fld_id`='$dcid' "));
$dcname= $q ['fld_name'];
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Banyan Infotech" />

    </head><body>
<script type="text/javascript" src="print/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
             $('#btnPrint').hide();
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=800,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            location.reload();
        });
    </script>
   <style>
   table td { border: 1px solid #eee; }
    table td { width:25% }
   </style> 
    
<?php 
 

  
              
                ?>
   <form id="dvContainer">
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody><tr>
            <td align="center" valign="top" style="padding:20px">
                <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="1" width="750">

                    <tbody><tr>
                            <td align="left" valign="top" style="border-right:none"><a href="http://drthajskin-haironlineexpert.in" target="_blank"> <img src="logo.png" alt="drthaj" style="margin-bottom:10px" border="0" class="CToWUd"></a></td>
                            <td align="right" valign="top"  style="border-left:none"> <p ><h3 style="font-weight:bold"><?php echo $dcname; ?></h3>
                               2nd floor,Balakrishnan Hospital<br/> 100 feet Road,<br/> Tatabad, Coimbatore</p>
                            </td>
                        </tr>

                        <tr>
                            <td valign="top" style="border-right:none">
                                <h1 style="font-size:16px;font-weight:700;line-height:20px;margin:0 0 16px 0">
                                    <?php if($gender=Male){
                                    ?>      Mr<?php } else { ?>Ms<?php } ?>.<?php echo $name; ?></h1>
                               <?php $fetch_query=  mysql_query("SELECT * FROM `tbl_prescription` WHERE `booking_id`=$id");
                               $count=0;
                               while($data=  mysql_fetch_array($fetch_query)){
                                   $count++;
                               ?>
                                <p style="line-height:16px;margin:16px 0 6px;margin-left:100px"><b><?php echo $count; ?>.</b><?php echo $data['prescription'] ?></p>
                               <?php }?> 
                                            
                            </td></tr>
                        <tr>
                           
                        </tr>
                        
                    </tbody></table>
            </td>
        </tr>
    </tbody></table>
                     <input type="button" value="Confirm Print" class="btn btn-info" id="btnPrint" style="cursor: pointer;margin-left:40%;color: #fff;background-color: #337ab7;border-color: #2e6da4;padding: 5px;border-radius: 13px;font-family: verdana;">  
   </form>
    </body></html>
    