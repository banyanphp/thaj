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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add / Update Doctors List</title>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>               
        <div id="maincontainer" class="clearfix">		
				<?php 
			include("header.php");
			?>
			</header>            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
                                                 
							<h3 class="heading">Change Password</h3>
							<form id="form1" name="form1" method="post" enctype="multipart/form-data">	
							<div id="preview" style="display:none;"></div>
								<div id="prods" style="float:left" class="span6">
										<span id="dataresponses" style="color:#5cb85c"></span>
                                                                                <span id="errordata" style="color:#ff0000"></span>
                                                                                 <span class="error_login" style="color:#ff0000"></span>
                                <div class="row-fluid">
										<div class="span12">											
											<label>Current Password <span class="f_req">*</span></label>
											<input type="password"name="cpassword" id="cpassword" class="span8"/>
										</div>
									</div>		
									
									
									
									<div class="row-fluid">
										<div class="span12">											
											<label>Password<span class="f_req">*</span></label>
											<input type="password" name="doctorpassword" id="doctorpassword" class="span8"/>
										</div>
									</div>		
									
											
									<div class="row-fluid">
										<div class="span12">											
											<label>Repeat- Password<span class="f_req">*</span></label>
											<input type="password" name="rdoctorpassword" id="rdoctorpassword" class="span8"/>
										</div>
									</div>		
							
									<!--<div class="row-fluid">
											<div class="span12">
									<input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
									</div>
									</div>-->
									
								
								<div class="form-actions">
                                                                    <button class="btn btn-inverse" type="button" id="btnsavedoctdetails" > Save Changes</button>
									<!--<input type="submit" value="Submit" class="btnSubmit" />-->
									<!--<input id="button" type="submit" value="Upload">-->
									
								
								</div>										
								<div id="divmsgbox"></div>
								</div>
								<div class="span1">
								</div>
								<div id="prodspecs" style="float:right" class="span5">
								</div>
							</form>
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
	$("#btnsavedoctdetails").on('click',(function(e) {
		e.preventDefault();				
		var cpassword = $("#cpassword").val();
		
		var doctorpassword = $("#doctorpassword").val();
		var rdoctorpassword = $("#rdoctorpassword").val();
		if(cpassword == "")
		{
	
                  $('.error_login').html('Enter current password');
		$("#cpassword").focus();
		return false;
		}		
		
		
		if (doctorpassword.length == 0) {
  
        $('.error_login').html('Enter Password');
   $("#doctorpassword").focus();
   return false;
  	}
	// check for minimum length
	var minLength = 6; // Minimum length
	if (doctorpassword.length < minLength) {
             $('.error_login').html('Your password must be at least ' + minLength + ' characters long. Try again.');
	
	        $("#doctorpassword").val('');
		$("#doctorpassword").focus();
	return false;
	}
	
if (doctorpassword != rdoctorpassword) {
        $('.error_login').html('Password does not match. Please make sure.');

  $("#rdoctorpassword").focus();
   return false;
  	}	
	else{
			
			
			$("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		
			$("#form1").ajaxForm({
			url:"change_password_inner.php?cpassword="+cpassword+"&doctorpassword="+doctorpassword+"&rdoctorpassword="+rdoctorpassword,
			   				
				datatype : 'html',
				 success: function(data)
							{   
                                                              $('#divmsgbox').hide();
                                                                 $("#doctorpassword").val('');
                                                              $("#rdoctorpassword").val('');
                                                              $("#cpassword").val('');
                 if(data==1){
								$('#dataresponses').html('Password Successfully Changed');
                                                            }
                                                           else if(data==2){
                                                               $('#errordata').html('Please enter current password ');
                                                            }
                                                            else{
                                                                 $('#errordata').html('Something error Occured.Please Contact Your Service Provider');
                                                            }
								$(document).ready(function()
								{
								setInterval(function(){cache_clear()},3000);
								});
							function cache_clear()
							  {
                                                                $('#dataresponses').hide();
                                                                $('#errordata').hide();
                                                            
						     	}	
							},
				target: '#preview'
			}).submit();
		
		
		
		
	}		
	}));
});
 </script>
 
       <script type="text/javascript" src="jquery/jquery.form.js"></script>
       <script type="text/javascript" src="jquery/jquery.min.js"></script>	   
	   
<script>
function fn_yes()
{
	 alert('Photo Is Uploaded Successfully');
		$('#divmsgbox').html('');
		window.location="dashboard.php";
		
}
function fn_error()
{
	alert('Size is too large. Choose another one');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="dashboard.php";
}
function fn_errorimgaa()
{
	alert('Invalid Image Extension');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="dashboard.php";
	
}


</script>



</div>

    </body>
	    <script type="text/javascript" src="jquery/jquery.form.js"></script>
       <script type="text/javascript" src="jquery/jquery.min.js"></script>	
     
</html>