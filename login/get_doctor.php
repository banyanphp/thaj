 <?php
 session_start();
@include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
 $uname = $_SESSION['user'];

$get_username = mysql_fetch_array(mysql_query("select * from tbl_register where email='$uname'"));
$name = $get_username['name'];
 $id = $_REQUEST['doctor'];
		 $sql = mysql_query("SELECT * FROM `tbl_doctors` where fld_speciality ='$id'");	
		 
		  while($rows=mysql_fetch_array($sql))
			{
			$name = $rows['fld_name'];
			$gender =$rows['fld_gender'];
			$speciality = $rows['fld_speciality'];
			$languages=$rows['fld_languages'];
			$image = $rows['fld_image'];
			$experience = $rows['fld_experience'];
		
		 ?>
<div class="row">
      
	  
	  <div class="col-lg-9 col-md-9">
         <div class="clients-box mb-30 clearfix">
           <div class="clients-photo">
		   <?php  if($image=='') {  ?>
		    <img src="doctor.png" alt="" style="width:100%;">
		   <?php } else {  ?>
			 <img src="<?php echo $image; ?>" alt="">
		   <?php } ?>
			</div>
           <div class="clients-info">
             <!--<h4 style="width:50%">Lorem ipsum dolor sit amet</h4>-->
			 <label id="lblName" style="width:100%"><?php echo $name; ?>   &nbsp;  <a href="#" style="text-decoration:underline;">view profile</a></label> 
			 <ul>
				<li>Gender : <?php echo $gender; ?> </li>
				<li>Speciality : <?php echo $speciality; ?></li>
				<li>Languages Spoken : <?php echo $languages; ?></li>
				<li>Experience : <?php echo $experience; ?></li>
			 </ul>
           </div>
		   
         </div>
      </div>
	  <div class="col-md-3">
	   <p class="btn btn-info">
<span class="heading14">Consultation Fee</span>
<span id="" class="btn btn-danger">1100</span>
</p>
<div style="margin-top:13%">
<h5>Make an Appointment</h5>
<a  class="btn btn-primary" href="<?php echo $speciality; ?>"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Video Consultation">
<i class="fa fa-video-camera"></i>
</a>
<button class="btn btn-primary"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Voice Consultation">
<i class="fa fa-volume-control-phone"></i>
</button>
<button class="btn btn-primary"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email Consultation">
<i class="fa fa-envelope"></i>
</button>
</div></div>
     
    </div>  
	 <?php
			}
			$check = mysql_num_rows(mysql_query("SELECT * FROM `tbl_doctors` where fld_speciality ='$id'"));	
			if($check=='')
			{
				echo "<h3 class='text-center' style='margin-top:8%'>No Doctors Available </h3>";
			}
		?>
		 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">