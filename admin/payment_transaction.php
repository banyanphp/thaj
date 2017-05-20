<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');
$todaydate=date("Y-m-d");
$uname = $_SESSION['uname'];
$doctor_id = $_SESSION['doctor_id'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];
$userid = $_SESSION['userid'];
  if($userid!=1){
$fetch_doctor = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='".$doctor_id."'"));
  
  $fld_name = $fetch_doctor['fld_name'];
  $fld_gender = $fetch_doctor['fld_gender'];
  $fld_speciality = $fetch_doctor['fld_speciality'];
  $fld_languages = $fetch_doctor['fld_languages'];
  $fld_image = $fetch_doctor['fld_image'];
  $fld_experience = $fetch_doctor['fld_experience'];
  $fld_createdon = $fetch_doctor['fld_createdon'];
  $fld_delstatus = $fetch_doctor['fld_delstatus'];
  $permission  =  $_SESSION['permission']; //if permission 1 super admin  // if permission 0 doctor )
  
$imagepath = 'doctors_images/';
}
else{
    $fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='".$userid."'"));
    $fld_names = $fetch_admin['fld_username'];
    $fld_names = ucfirst($fld_names); 
}

?>
<?php
$root_url  	 = 'http://drthajskin-haironlineexpert.in/admin/'
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Payment Transaction List | Dashboard</title>
		
		<style>
			.table tbody tr.rowlink:hover td {background-color: #efefef}
			
		</style>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       
        
        <div id="maincontainer" class="clearfix">
		
            <!-- header -->
				<?php 
			include("header.php");
			?>
			<!-- header -->
			
          <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading">Payment Transaction List</h3>
							<form id="form1" name="form1" method="post">	
								<div id="prods" style="float:left" class="span6">
									<div class="row-fluid">
										<div class="span12" style="width:206%;">										
											<table style="border:1px solid;" class="table table-striped table-bordered table-hover">
												<thead >
													<tr style="pading:10px;">
													    <th>Name</th> 
														<th>Gender</th>														
														<th>Email</th>
														<th>Phone</th>														
														<th>Address</th>
													<th>Country</th>
														<th>State</th>
														<th>City</th>
                                                                                                                <?php if($_SESSION['userid']==1) { ?>
                                                                                                                <th>Doctor Name</th>
                                                                                                                <?php } ?>
														<th>Date & Time</th>
														<th>Mode of Consult</th>		
														<!--<th>View</th>-->
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
											<?php
                                                                                              if($_SESSION[userid]==1){
                                                                                            $seldc = "SELECT * from `tbl_patientlist` where payment_status = 1 order by fld_createdon DESC";
       
											
                                                                                        }
                                                                                            else {
                                                                                            $seldc = "SELECT * from `tbl_patientlist` where fld_dcname ='$doctor_id' and payment_status = 1 order by fld_createdon DESC";
                                                                                            }
											
											//echo $seldc;
											$no=1;
											$seldc1 = mysql_query($seldc);
											while($row=mysql_fetch_array($seldc1,MYSQL_ASSOC))
											{											
											$dcidd= $row['fld_id'];
											//$rprodsubminicatid= $row['fld_level3id'];
											$pnamee = $row['fld_name'];	
											$pnamee1 = strtolower($pnamee);
											$pname = ucwords($pnamee1);
											$pgenderr = $row['fld_gender'];	
											$pgenderr1 = strtolower($pgenderr);
											$pgender = ucwords($pgenderr1);
											$pemail = $row['fld_email'];	
											$pemail1 = strtolower($pemail);
											$pemail111 = ucwords($pemail1);
											$pphoneee = $row['fld_phone'];	
											$pphoneee1 = strtolower($pphoneee);
											$pphone = ucwords($pphoneee1);
											$paddress1 = $row['fld_address'];	
											$paddress11 = strtolower($paddress1);
											$paddress = ucwords($paddress11);
											$pstate = $row['fld_state'];												
											$pcity = $row['fld_city'];											
											$apdatetime = $row['consultant_date'].'</br>'.$row['fld_datetime'];
											$modeofconsult = $row['fld_modeofconsult'];
                                                                                        
                                                                                          $doct=$row['fld_dcname'];
                                                                                         $fld_doctors=mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='".$doct."'"));
                                                                                         $fld_doctor_name=$fld_doctors['fld_name'];
											?>
											<tr>
											
												<td><a href="<?php echo $root_url.'view_payment_transaction.php?pd_id='.$dcidd; ?>" target="_blank"><?php echo $pname; ?></a></td>
												<td><?php echo $pgender; ?></td>
												<td><?php echo $pemail111; ?></td>
												<td><?php echo $pphone; ?></td>		
												<td><?php echo $paddress; ?></td>
												<td><?php echo "India" ?></td>
												<td><?php echo $pstate; ?></td>
												<td><?php echo $pcity; ?></td>
                                                                                                    <?php if($_SESSION['userid']==1) { ?>
                                                                                                <td>
                                                                                                <?php
                                                                                                  echo $fld_doctor_name; ?>
                                                                                                </td>
                                                                                                <?php } ?>
												<td><?php echo $apdatetime; ?></td>		
												<td><?php echo $modeofconsult; ?></td>
												<!--<td align="center"><a class="btn btn-inverse" href="view_single_doctor.php?dcid=<?php echo $dcidd; ?>">View</a></td>-->
												<td align="center">
													<div class="dropdown">
													  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
														Dropdown
														<span class="caret"></span>
													  </button>
													  
													  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
														<li><a href="<?php echo $root_url.'vr.php?pd_id='.$dcidd; ?>">Verification Request (S)</a></li>
														<li><a href="<?php echo $root_url.'ovr.php?pd_id='.$dcidd; ?>">Offline Verification Request (O)</a></li>
														<li><a href="<?php echo $root_url.'rir.php?pd_id='.$dcidd; ?>">Refund Initiation Request (R)</a></li>
													</ul>
												</div>
												</td>
											</tr>
											<?php
											}
											?>	
												</tbody>
												</table>											
										</div>
									</div>
                        </div>
                    </div>                   
                </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
     <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	

 <script type="text/javascript" language="javascript">
	$(document).ready(function (e) {

});
 </script>
 	
   
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
<script>
function fn_error()
{
	alert('Size is too large. Choose another one');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="aadmin.php";

}
function fn_errorimgaa()
{
	alert('Invalid Image Extension');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="aadmin.php";
	
}
</script>



</div>

    </body>
</html>