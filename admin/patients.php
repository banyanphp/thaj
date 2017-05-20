<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");

date_default_timezone_set('Asia/Kolkata');
$todaydate=date("Y-m-d");
$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
$doctor_id = $_SESSION['doctor_id'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];
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
  $permission  =  $_SESSION['permission'];
  $appearin=$fetch_doctor['fld_video_url'];//if permission 1 super admin  // if permission 0 doctor )
  
$imagepath = 'doctors_images/';
}
else{
    $fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='".$userid."'"));
    $fld_names = $fetch_admin['fld_username'];
    $fld_names = ucfirst($fld_names); 
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Today Patient List | Dashboard</title>
		
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
                            <form action="chat.php" method="post">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading">Today Patient List</h3>
							
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
                                                                                                                 <?php if($_SESSION['userid']!=1) { ?>
                                                                                                                <th>Action</th>
                                                                                                                <?php } 
                                                                                                                $current_times = date("H:i");
                                                                                                                ?>
														
													</tr>
												</thead>
												<tbody>
											<?php
                                                                                        if($_SESSION[userid]==1){
                                                                                     	$seldc = "SELECT * from `tbl_patientlist` where `consultant_date`='$todaydate' and `payment_status`='1' and `fld_enddatetime` >'$current_times'";

											
                                                                                        }
                                                                                            else {
                                                                                                $seldc = "SELECT * from `tbl_patientlist` where `fld_dcname` ='$doctor_id' and `consultant_date`='$todaydate' and `fld_enddatetime` >'$current_times' and `payment_status`='1'";
                                                                                            }
											//echo $seldc;
											$no=1;
											$seldc1 = mysql_query($seldc);
                                                                                        $counts1=mysql_num_rows($seldc1);
                                                                                        if($counts1>0){
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
                                            $videourl123 = $row['fld_video_url'];												
											$pcity = $row['fld_city'];
                                                                                        $patient_time1 = $row['consultant_date'];
                                                                                        $gettime = $row['fld_datetime'] . " - " . $row['fld_enddatetime'];
											$apdatetime = $row['consultant_date'].'</br>'.$gettime;
											$modeofconsult = $row['fld_modeofconsult'];
                                                                                        $country=$row['fld_country'];
                                                                                        $current_date = date("Y-m-d");
                                                                                        $current_times = date("H:i");
                                                                                        $datetime = $row['fld_datetime'];
                                                                                        $datetimes = $row['fld_enddatetime'];
                                                                                        $doct=$row['fld_dcname'];
                                                                                     
                                                                                         $fld_doctors=mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='".$doct."'"));
                                                                                         $fld_doctor_name=$fld_doctors['fld_name'];
											?>
											<tr>
											
												<td><?php echo $pname; ?></td>
												<td><?php echo $pgender; ?></td>
												<td><?php echo $pemail111; ?></td>
												<td><?php echo $pphone; ?></td>		
												<td><?php echo $paddress; ?></td>
												<td><?php echo $country; ?></td>
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
												<!--<td align="center"><a class="btn btn-inverse" href="view_single_doctor.php?dcid=<?php // echo $dcidd; ?>">View</a></td>-->
                                                                                                  <?php if($_SESSION['userid']!=1) { ?>
												<td align="center">
                                                                                                     <?php if ($patient_time1 == $current_date && $current_times > $datetime && $current_times <= $datetimes) { ?>
                                                                                                    <input type="hidden" name="doctor_id" value="<?php echo $doct;?>">
                                                                                                     <input type="hidden" name="patient_id" value="<?php echo $dcidd;?>">
                                                                                                         <input class="btn btn-success" type="submit" id="btnedit" value="Click to proceed" style='margin-bottom:10px'/></td>
                                                                                                
                                                        <?php } else {  ?> 
                                                                <button class="btn btn-danger"> Wait for appointment</button><?php } ?></td>
                                                                                                  <?php }  }?>
												
												
											</tr>
											<?php
											}
                                                                                       else
                                                                                       {
                                                                                           ?><tr><td colspan="10" style="text-align: center">No Records Found</td></tr><?php
                                                                                       }
											?>	
												</tbody>
												</table>											
										</div>
									</div>
                        </div>
                            </form>
                    </div>                   
                </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
     <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	

 	
   
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>


</div>

    </body>
</html>