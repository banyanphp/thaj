<?php
session_start();
@include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['user'];$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');
//Get Only Current Time 00:00 AM / PM
//$current = date("H:i");
 $current =  date("H:i" , strtotime('+30 minutes'));

 $current_date=date("Y-m-d");
  $current_times=date("H:i");
?><script src="js/jquery.min.js"></script> 	  

<script type="text/javascript">
$(document).ready(function(){
				
	$("#submit").click(function(e)
	{
		 e.preventDefault();   
	//alert("sdf");
        var id = myselect.value;
		if(id!="xxx"){
		var specalist_id = getdoctor.value;
	 var time = "1";
	
		$.ajax({
		type: "POST",
		url: "select_time.php",
	    data: {
            doctor_id: id,
			time:time,
			specalist_id:specalist_id
            
        },
		//datatype:string,
		
		success: function(data)
		{
			
		$('#dataresponse').html(data);
    $('#myModal').modal('show');  
		}
		});
		}
		else
		{
		 $('#error').show();  	
		}
	});
});	
</script>
 <script type="text/javascript">
$(document).ready(function(){
				
	$("#schedule").click(function(e)
	{
		 e.preventDefault();   
	//alert("sdf");
        var id = myselect.value;
			if(id!="xxx"){
		var specalist_id = getdoctor.value;
	 var time = "2";
	//alert(id);
		$.ajax({
		type: "POST",
		url: "select_time.php",
	    data: {
            doctor_id: id,
			time:time,
			specalist_id:specalist_id
            
        },
		//datatype:string,
		
		success: function(data)
		{
			
		$('#dataresponse').html(data);
    $('#myModal1').modal('show');  
		}
			}); }
				else
		{
			$('#error').show();  	
		}
	});
});	
</script>
 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Doctors List | Dr.Thaj</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- plugins -->
<link href="css/plugins-css.css" rel="stylesheet" type="text/css" />

<!-- mega menu -->
<link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css" />
 
 <!-- default -->
<link href="css/default.css" rel="stylesheet" type="text/css" />

<!-- main style -->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- responsive -->
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- Style customizer (Remove these two lines please) -->

<link href="css/style-customizer.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/custom.css" rel="stylesheet" type="text/css" />

<style>
a.page-scroll.linnkk:hover
{
	 background-color: #A61F3D;
}
.linnkk{
    background-color: #A61F3D;
}
#special
{
	background-color: #00a9da;
    padding: 7px 0 0 2px;
	height:220px;
	cursor:pointer;
}
#special h4
{
	color:#fff;
}

#special p
{
	color:#fff;
}

#special span
{
	color:#fff;
}
.time-slot li
{
	display:inline-block;
	padding: 7px 6px 0;
}
.time-slot li input, .time-slot li a {
    padding: 4px 9px;
    border: none;
    border-radius: 16px;
    -webkit-border-radius: 16px;
    background: #ec7323;
    display: block;
    color: #fff;
    font-size: 12px;
}
.grey-cont {
   background: #f8f6f6 none repeat scroll 0 0;
    border: 1px solid #c3c2c2;
    border-radius: 6px;
    box-shadow: 0 0 2px rgba(255, 255, 255, 0.9) inset;
    float: left;
    margin: 0 0 14px;
    padding: 56px;
    text-align: center;
    width: 100%;
}
option { font-size:16px;  padding-top: 6px;}
.form-control {
    background-color: transparent;
    border: 1px solid #2f2f2f;
    border-radius: 0;
    box-shadow: none;
    color: #000;
}
select {
    background: #eceff8 none repeat scroll 0 0;
    border: 1px solid #000;
    box-shadow: none;
    color: #626262;
    font-size: 14px;
    height: 34px;
    padding-left: 10px;
    transition: all 0.5s ease-in-out 0s;
    width: 100%;
}
</style>
     <script type="text/javascript">
            function validate_upload() {
                //Get reference of FileUpload.
                var fileUpload = document.getElementById("file");

                //Check whether the file is valid Image.
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif)$");
                if (regex.test(fileUpload.value.toLowerCase())) {

                    //Check whether HTML5 is supported.
                    if (typeof (fileUpload.files) != "undefined") {
                        //Initiate the FileReader object.
                        var reader = new FileReader();
                        //Read the contents of Image File.
                        reader.readAsDataURL(fileUpload.files[0]);
                        reader.onload = function (e) {
                            //Initiate the JavaScript Image object.
                            var image = new Image();

                            //Set the Base64 string return from FileReader as source.
                            image.src = e.target.result;

                            //Validate the File Height and Width.
                            image.onload = function () {
                                var height = this.height;
                                var width = this.width;
                                //alert(height+"-"+width);

                                if (height != 109 || width != 109) {
                                    alert("please upload a image as width is 109 and height is 109");
                                    document.getElementById('file').value = '';
                                    return false;
                                }
                                //    alert("Uploaded image has valid Height and Width.");
                                //  return true;
                            };

                        }
                    } else {
                        alert("This browser does not support HTML5.");
                        document.getElementById('file').value = '';
                        return false;
                    }
                } else {
                    alert("Please select a valid Image file.");
                    document.getElementById('file').value = '';
                    return false;
                }
            }
        </script>
</head>

<body>

<div class="page-wrapper">

<!--=================================
 preloader -->
 
<div id="preloader">
  <div class="clear-loading loading-effect"> <span></span> </div>
</div>

<!--=================================
 preloader -->
 
<!--=================================
 header -->

<header id="header" class="header">

 <div class="menu">  
  <!-- menu start -->
   <nav id="menu-1" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container"> 
      <div class="row"> 
       <div class="col-lg-12 col-md-12"> 
        <!-- menu logo -->
        <ul class="menu-logo">
            <li>
                <a href="javascript:void(0);"><img src="logo.png" alt="logo"> </a>
            </li>
        </ul>
        <!-- menu links -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
            <ul class="nav navbar-nav navbar-right" style="margin-top: 2%;">           
                <li><a href="javascript:void(0);" class="page-scroll linnkk" style="color: #fff;padding: 7px 8px 7px 7px;">Welcome <?php echo strtoupper($name);  ?></a></li>
              <li><a href="logout.php" class="page-scroll linnkk" style="background-color: #00a9da;color: #fff;padding: 7px 8px 7px 7px;">Logout</a></li>
            </ul>
          </div></div>		  
		 
      </div>
     </div>
    </section>
   </nav>  
 </div>
</header>

<!--=================================
 header -->


<!--=================================
 page-sidebar-->

<section class="page-sidebar page-section-ptb">
  <div class="container" style="background-color:#F5F5F5">
    <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-3" style="background-color:#F5F5F5;padding:20px;">
         <div class="sidebar-widget">
            <section class="profile-img">
<figure style="text-align:center">
<a title="" href="javascript:void(0);">
    <?php $q=  mysql_fetch_array(mysql_query("select * from tbl_register where `email`='$uname'"));
if($q['profile']!=''){
    

?>
<img  class="img-responsive img-circle" alt="" src="<?php echo $q['profile'];?>" style="width:43%;margin-left:auto;margin-right:auto">
<?php } else {  ?>
<img  class="img-responsive img-circle" alt="" src="user.png" style="width:43%;margin-left:auto;margin-right:auto">
<?php } ?>
</a>
<h2 class="heading16">
<span id="ContentPlaceHolder1_lblPatientName"><?php echo $name; ?> </span>
</h2>
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#profile" >Change Profile image</button>
</figure>

</section>
        </div>
        <!--<div class="sidebar-widget mb-30">
             <h3 class="mt-30 mb-20">About us</h3>
           
        </div>-->   
       </div> 
        <div class="modal fade" id="profile" role="dialog">
                                        <div class="modal-dialog" style="width:50%">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Upload Profile Image</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <form class="form-horizontal" role="form" action="login_check.php?action=profile_image" method="POST" enctype="multipart/form-data">



                                                            


                                                            <div class="form-group">
                                                              <label for="file-upload" class="custom-file-upload">Choose Image
 
</label>

                                                            
                                                                    <input type="file" id="file" name="images"  onchange="return validate_upload()" >

                                                                  
                                                              
                                                            </div>
                                                     

                                                            <div class="form-group">

                                                              
                                                                    <button class="btn btn-info btn-lg" type="submit">Submit</button>
                                                            </div>   
                                                        </form>
                                                    </div><!-- end col -->
                                                </div>

                                                <div class="modal-footer" style="border-top:none;border-bottom:1px solid #CACACA">
                                                  
                                                </div>
                                            </div>



                                        </div>
                                    </div>
        <span id="error" style="display:none;margin-left: 28%; color: #ff0000;">Please select Doctor</span>
	
            		 <h3 class="text-blue text-center" style="margin-bottom:1%">Schedule an Appointment</h3>
   <div class="section-field col-xs-3 col-md-3" style="background-color: #007c9d;border-radius: 17px;color: #fff;padding: 4px 11px 24px 15px;width: 250px;margin-left: 10px;">
          				 	<form class="form-horizontal" role="form" method="post" id="user"> 
							<label for="phone" style="color:#fff;">Specialist *</label>
                    <div class="field-widget">
					
                         <select class="doctor" name="getdoctor" id="getdoctor">
                            <option value="1">Select Specialist</option>
                            <?php $qry = mysql_query("SELECT * FROM tbl_specialities ");
							$sql = mysql_query($qry);
							while($fetch_specialist1 = mysql_fetch_array($qry))
								{
									echo $fld_id1 = $fetch_specialist1['fld_id']; 
									echo $fld_specialities1  = $fetch_specialist1['fld_specialities']; ?>
									<option value="<?php echo $fld_id1; ?>"><?php echo $fld_specialities1; ?></option>
                              <?php } ?>
							
						
                        </select>
                     </div>
                    </div>
                    
                                <div class="section-field col-xs-3 col-md-3" style="background-color: #007c9d;
    border-radius: 17px;
    color: #fff;
    margin-left: 2%;
    padding: 4px 16px 24px 15px;
    width: 250px;">
	
                  <label for="phone" style="color:#fff;">Doctor List *</label>

                 <div class="field-widget">
                   <select id="myselect" name="select" >
                        <option value="xxx">Choose Doctor</option>
                       <?php $qry11 = mysql_query("SELECT * FROM `tbl_doctors` ");
							//$sql1 = mysql_query($qry1);
							while($fetch_specialist11 = mysql_fetch_array($qry11))
								{
									 $fld_id11 = $fetch_specialist11['fld_id']; 
									 $fld_name  = $fetch_specialist11['fld_name']; ?>
									<option value="<?php echo $fld_id11; ?>"><?php echo $fld_name; ?></option>
                              <?php } ?>
                    </select>
                 </div>
                </div>
                
                <div class="section-field col-xs-3 col-md-3" style="  background-color: #007c9d;
    border-radius: 17px;
    color: #fff;
    margin-left: 2%;
    padding: 4px 16px 24px 15px;
    width: 320px;">
                 <label for="phone" style="color:#fff;">Appointment *</label>
                  <div class="field-widget">
				  						  <button class="btn btn-primary"id="submit" style="background-color: #A61F3D;
    color: #fff;width: 37%; margin-top: 3%;">Consult Now</button>					
                   <!-- <input type="button" id="btnconsultnow" name="btnconsultnow" value="Consult Now" style="background-color: #A61F3D;
    color: #fff;width: 40%;"/>-->
                    
                    <!--<input type="button" id="btnschedulenow" name="btnschedulenow" value="Schedule Appointment" style="background-color: #A61F3D;color: #fff;    
    width: 57%;"/>-->
	
	<button class="btn btn-primary" id="schedule" style="background-color: #A61F3D;
    color: #fff;width: 60%; margin-top: 3%;">Schedule Appointment</button>
	</form>
                  </div>
			
	<script>
$( ".doctor" ).change(function() {
  var list = $('#getdoctor').val();
  
   var string = "doctor=" + list;
  $('#ajax-loader').show();
	$('.error').html('Connecting to server please wait');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "get_doctor.php",
data: string,
cache: true,
success: function(html){
$("#show").after(html);
$("#show-list").html(html);
   $('#ajax-loader').hide();
}  
});

return false;
 });

    </script>	
				 
				  
                 </div>
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">     
				 
				 <div class="col-md-9">
              <ul class="nav nav-tabs" style="margin-top:3%">
     <li class="active"><a href="#home"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;Upcoming Appointments</a></li>
     <li><a href="#menu1"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; Past Appointments</a></li>
	 <li><a href="#menu2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit Profile</a></li>
    
  </ul>
  
  <div class="tab-content" style="border:2px solid #F5F5F5;height:500px" >
    <div id="home" class="tab-pane fade in active">
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Appoinment date </th>
        <th>Time</th>
        <th>Doctor</th>
     
		<th>Video Chat</th>
      </tr>
    </thead>
    <tbody>
<?php $dataset = mysql_query("SELECT * FROM `tbl_patientlist` WHERE `consultant_date` >= '$current_date' and  user ='$uname'  order by fld_id desc");
  while($fetch_date1= mysql_fetch_array($dataset)) 
      { 
 $patient_time1 = $fetch_date1['consultant_date'];
 $datetime = $fetch_date1['fld_datetime'];
 $datetimes = $fetch_date1['fld_enddatetime'];
 $gettime = $fetch_date1['fld_datetime']." - ".$fetch_date1['fld_enddatetime'];
 $fld_name = $fetch_date1['fld_name'];
 $fld_docname = $fetch_date1['fld_dcname'];
 $datefromdb = $patient_time1; 	
 $fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$fld_docname'"));
 $doctor_id_fetch_to_name=$fet['fld_name'];
    if ($current_date==$patient_time1){
        if($datetimes > $current_times){
        ?>
      <tr>
        <td><p><?php echo date('d-m-Y',strtotime($patient_time1)); ?></p></td>
        <td><p><?php echo  $gettime;?></p></td>
        <td><p><?php echo $doctor_id_fetch_to_name; ?></p></td>
       <?php if($patient_time1==$current_date && $current_times > $datetime && $current_times <= $datetimes){ ?>
        <td><span style="display:block"><a href="chat.php?dcno=<?php echo $fld_docname; ?>" target="_blank"><img style="width: 35px;cursor:pointer" src="video-chat.png"/></a></span></td>
       <?php } else { ?> 
        <td><button class="btn btn-danger"> Wait for appointment</button><?php } ?></td>
      </tr>
        <?php   } }
 else {
     ?>  <tr>
        <td><p><?php echo date('d-m-Y',strtotime($patient_time1)); ?></p></td>
        <td><p><?php echo  $gettime;?></p></td>
        <td><p><?php echo $doctor_id_fetch_to_name; ?></p></td>
       <?php if($patient_time1==$current_date && $current_times > $datetime && $current_times <= $datetimes){ ?>
        <td><span style="display:block"><a href="chat.php?dcno=<?php echo $fld_docname; ?>" target="_blank"><img style="width: 35px;cursor:pointer" src="video-chat.png"/></a></span></td>
       <?php } else { ?> 
        <td><button class="btn btn-danger"> Wait for appointment</button><?php } ?></td>
      </tr><?php
 }       
        
       } ?>
    </tbody>
  </table>
        </div>
    <div id="menu1" class="tab-pane fade">
     
 <table class="table table-condensed">
    <thead>
      <tr>
        <th>Appointment date </th>
        <th>Time</th>
        <th>Doctor</th>
       
		
      </tr>
    </thead>
    <tbody>
<?php $dataset = mysql_query("SELECT * FROM `tbl_patientlist` WHERE `consultant_date` <=CURDATE() and user ='$uname' order by fld_id desc");
//echo "SELECT * FROM `tbl_patientlist` WHERE `consultant_date` <= CURDATE() and user ='$uname'";
  while($fetch_date1= mysql_fetch_array($dataset)) 
{ 
  $patient_time1 = $fetch_date1['consultant_date'];
  $datetime = $fetch_date1['fld_datetime'];
  $datetimes = $fetch_date1['fld_enddatetime'];
  $gettime = $fetch_date1['fld_datetime']." - ".$fetch_date1['fld_enddatetime'];
  $fld_name = $fetch_date1['fld_name'];
  $fld_dc_id = $fetch_date1['fld_dcname'];
  $datefromdb = $patient_time1; 
  $fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$fld_dc_id'"));
  $doctor_name=$fet['fld_name'];
 if ($current_date==$patient_time1){
        if($datetimes < $current_times){
    ?>

      <tr>
       <td><p><?php echo date('d-m-Y',strtotime($patient_time1)); ?></p></td>
        <td><p><?php echo $gettime; ?></p></td>
        <td><p><?php echo $doctor_name; ?></p></td>

 
      </tr>
<?php  } }   else{    ?>
        <tr>
       <td><p><?php echo date('d-m-Y',strtotime($patient_time1)); ?></p></td>
        <td><p><?php echo $gettime; ?></p></td>
        <td><p><?php echo $doctor_name; ?></p></td>

 
      </tr>
<?php }}
	   ?>

    </tbody>
  </table>

    </div>
    <div id="menu2" class="tab-pane fade refreshtab" >
      <form name="form" method="post" id="form" >
         	<div class="row" >
			<h6 style="text-align:center; margin-top:2%;color:#00A9DA;"> Edit Profile</h6>
         		<div class="col-sm-6" >
                	  <div class="form-group">
                       
                     <?php $fetch_user = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_register` where email = '$uname'"));

				//echo "SELECT * FROM `tbl_patientlist` where fld_email = '$uname'";
                                          $fld_id = $fetch_user['user_id'];
				          $fld_name = $fetch_user['name'];
					  $fld_gender = $fetch_user['fld_gender'];
					  $fld_email = $fetch_user['email'];
					  $fld_phone = $fetch_user['mobile'];
					  $fld_address = $fetch_user['fld_address'];
					  $fld_pincode = $fetch_user['fld_pincode'];
					  $fld_country = $fetch_user['fld_country'];
					  $fld_state = $fetch_user['fld_state'];
					  $fld_city = $fetch_user['fld_city'];
					  $fld_updatedon = $fetch_user['fld_updatedon'];

					 ?>
					 
					   <label>Name*</label>
					   <input type="hidden" value="<?php echo $fld_id; ?>" name="fld_id">
                        <input name="fld_name" type="text" value="<?php echo $fld_name; ?>" id="pname"  class="form-control" placeholder="Name*"  />
                      </div>
                      <div class="form-group">
                       <label>Email*</label>
                        <input name="fld_email" type="text" value="<?php echo $fld_email; ?>" id="pemail"  class="form-control" placeholder="E-MAIL* " />
                      </div>
                        <div class="form-group">
						 <label>Mobile*</label>
                        <input name="fld_phone" type="text" value="<?php echo $fld_phone; ?>" id="pmobile"  class="form-control" placeholder="Mobile Number*"  />
                      </div>
					  
					   <div class="form-group">
					    <label>Choose gender*</label>
                       <select style="background-color:#FFFFFF" name="fld_gender" id="gender">
					   <option value=''>Select Gender</option>
					
                                          <option value='Male' <?php  if($fld_gender=="Male") { ?> selected<?php }  ?>>Male</option>  
					   <option value='Female' <?php  if($fld_gender=="Female") { ?> selected<?php }  ?>>Female</option>
					 
					
					   </select>
					   
					 
                      </div>
                      
                      
                      <div class="form-group">
					   <label>ZipCode*</label>
                         <input name="fld_pincode" type="text" value="<?php echo $fld_pincode; ?>"  id="pzip"  class="form-control zip"/>
                      </div>
                </div>
				
                <div class="col-sm-6">
                <div class="form-group">
                         <label>Country*</label>
                       
                         <input name="fld_country" type="text" value="<?php echo $fld_country; ?>" id="pcountry"  class="form-control"/>
                      </div>
                       <div class="form-group">
                        <label>State*</label>
                     
                         <input name="fld_state" type="text" value="<?php echo $fld_state; ?>"  id="pstate"  class="form-control"/>
                      </div>
                	  <div class="form-group">
                                 <label>City*</label>     
                         <input name="fld_city" type="text" value="<?php echo $fld_city; ?>"  id="pcity"  class="form-control"/>
                      </div>
                      <div class="form-group">
                       <label>Address*</label>
                        <input name="fld_address" type="text" value="<?php echo $fld_address; ?>"  id="paddress" class="form-control"/>
                      </div>    
  					
                      
                </div>
				<div class="form-group">
                     
                       <input id="paddress" class="btn btn-danger Proceed_button" type="button" value="Save Profile" name="address" style="width:25%;float:right">
                      </div>   
         	</div>
			</form>
    </div>
   
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
<script>

$(function() {
	 document.getElementById("pemail").disabled = true;
$(".Proceed_button").click(function() {

var name = $("#pname").val();
var email = $("#pemail").val();
var mobile = $("#pmobile").val();
var gender = $("#gender").val();
var zip = $("#pzip").val();

var country = $("#pcountry").val();
var state = $("#pstate").val();
var city = $("#pcity").val();
var address = $("#paddress").val();

var str = $( "#form" ).serialize(); //get all field values 
if(name == '')
{
	$('.error_login').html('Enter Name');
	$("#pname").focus();
	 $("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
}

if(email == '')
{
	$('.error_login').html('Enter Email address');
	$("#pemail").focus();
	return false;
}
 

if(mobile=='')
{
	$('.error_login').html('Enter Mobile Number');
	$("#pmobile").focus();
	return false;
}


if(gender=='')
{
	$('.error_login').html('Choose Gender');
	$("#gender").focus();
	 $("html, body").animate({ scrollTop: 200 }, "slow");
	return false;
}


if(zip=='')
{
	
	$('.error_login').html('Enter zipcode');
	$("#pzip").focus();
	return false;
}

if(country=='')
{
	$('.error_login').html('Enter Country');
	$("#pcountry").focus();
	return false;
}


if(state=='')
{
	$('.error_login').html('Enter State');
	$("#pstate").focus();
	return false;
}


if(city=='')
{
	$('.error_login').html('Enter Password');
	$("#pcity").focus();
	return false;
}


if(address=='')
{
	$('.error_login').html('Enter Password');
	$("#paddress").focus();
	return false;
}

else 
	
{
	
	$('.error_login').html('Loading please wait....');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "login_check.php?action=update_register",
data: str,
cache: true,
success: function(html){
    $('.errors').show(html);
//$(".refreshtab").load(window.location + " .refreshtab");
//window.location.reload();
}  
});
}
return false;
});
});
</script>
  </div>
      <style>

#menu2 {
  animation: shake 0.30s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-5px, 0, 0);
  }
  
  20%, 80% {
    transform: translate3d(5px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-10px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(10px, 0, 0);
  }
}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th { line-height:10px; }
table p {
    color: #626262;
    font-size: 13px;
    font-weight: normal;
    line-height: 45px;
}
.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
    font-size: 14px;
    font-weight: 600;
        padding: 5px;
}
</style>   
</div>		 
      <script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>          
	  <div class="col-lg-9 col-md-9 col-sm-9 page-content" style="display:none;">
	  
        
         <p>
			<div class="doctor-list" id="show-list">
			
				 <div class="row">
      <img src="ajax-loader.gif" id="ajax-loader" style="margin-left:50%; display:none;">
	   <?php
		 $sql = mysql_query("SELECT distinct doc.fld_name,doc.fld_gender,doc.fld_speciality,doc.fld_languages,doc.fld_image,doc.fld_experience
		 FROM `tbl_doctors` doc where user ='$uname'");	
		 
		  while($rows=mysql_fetch_array($sql))
			{
			$fld_idd = $rows['fld_id'];
			$name = $rows['fld_name'];
			$gender =$rows['fld_gender'];
			$speciality = $rows['fld_speciality'];
			$languages=$rows['fld_languages'];
			$image = $rows['fld_image'];
			$experience = $rows['fld_experience'];
		
		 ?>
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
<a  class="btn btn-primary" href="proceed.php?<?php echo $fld_idd; ?>"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Video Consultation">
<i class="fa fa-video-camera"></i>
</a>
<button class="btn btn-primary"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Voice Consultation">
<i class="fa fa-volume-control-phone"></i>
</button>
<button class="btn btn-primary"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email Consultation">
<i class="fa fa-envelope"></i>
</button>
</div></div>
	  <?php
			}
		?>
	  
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    </div>  
 
		    </div>
		 </p>
        
       </div> 
	  
    </div>
  </div>
</section>
     
   <span id="dataresponse"> </span>
<?php
@include("bottom.php");
?>
<!--=================================
 footer -->


 <!--=================================
 popup-contact -->

<div class="popup-contact">
 <div class="popup-contact-box">
  <a href="#" id="contact-btn"><i class="fa fa-envelope-o"></i></a> 
  <div class="contact-info clearfix">
    <h4 class="mb-30">Send us a message</h4>
    <div id="contact-form" class="contact-form">
      <div class="section-field">
          <div class="field-widget">
          <i class="fa fa-user"></i>  
          <input type="text" name="web" placeholder="name" class="web" id="web">
        </div> 
       </div>
       <div class="section-field">
          <div class="field-widget">
          <i class="fa fa-envelope-o"></i>
          <input id="email" type="email"  placeholder="Email*" name="email">
        </div> 
       </div>
       <div class="section-field clearfix">
        <div class="field-widget">
             <i class="fa fa-pencil"></i>
             <textarea id="message" class="input-message"  placeholder="Comment*" rows="3" name="message"></textarea>
          </div>
        </div>
        <a href="#" class="button-border pull-right clearfix">
            <span>Send</span>
         </a>
    </div>
  </div>
 </div>
</div>

 <!--=================================
 popup-contact -->

 </div>


<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a></div>
 
<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="js/plugins-jquery.js"></script>

<!-- mega menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
 
<!-- socialstream -->
<script src="js/social/socialstream.jquery.js"></script>

<!-- Style Customizer --> 
<script type="text/javascript" src="js/style-customizer.js"></script> 
  
<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
