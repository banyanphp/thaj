<?php
session_start();
$session_id = session_id();
echo $session_id.'<br/>';
echo $ses = session_regenerate_id();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
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
							<h3 class="heading">Add Doctors</h3>
							<form id="form1" name="form1" method="post" enctype="multipart/form-data">	
							<div id="preview" style="display:none;"></div>
								<div id="prods" style="float:left" class="span6">
									<div class="row-fluid">
										<div class="span12">
											<label>Speciality Category<span class="f_req">*</span></label>											
											<select id="specialitiesSelect" name="specialitiesSelect" class="span8">
												<option value="0">Select</option>
												<?php												
												$catiqry = "SELECT distinct fld_id, fld_specialities FROM tbl_specialities where fld_delstatus = 0";
												$catiqry1 = mysql_query($catiqry);												
												while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
													{
													$sepcialitiesid = $row['fld_id'];
													$sepcialitiesname = $row['fld_specialities'];						
													?>													
													<option value="<?php echo $sepcialitiesid;?>"><?php echo $sepcialitiesname; ?></option>
													<?php                                          
													}
													?>   
											</select>
											<!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
										</div>
									</div>								
																
									<div class="row-fluid">
										<div class="span12">											
											<label>Doctor Name<span class="f_req">*</span></label>
											<input name="doctorname" id="doctorname" class="span8"/>
										</div>
									</div>		
									
									<div class="row-fluid">
										<div class="span12">
											<label>Doctors's Gender<span class="f_req">*</span></label>											
											<select id="doctorgender" name="doctorgender" class="span8">
												<option value="0">Select</option>
												<?php												
												$catiqry = "SELECT distinct fld_id, fld_gender FROM tbl_gender where fld_delstatus = 0";
												$catiqry1 = mysql_query($catiqry);
												
												while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
													{
													$gid = $row['fld_id'];
													$gname = $row['fld_gender'];						
													?>													
													<option value="<?php echo $gid;?>"><?php echo $gname; ?></option>
													<?php                                          
													}
													?>   
											</select>
											<!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
										</div>
									</div>	
									
									
									<div class="row-fluid">
										<div class="span12">
											<label>Languages <span class="f_req">*</span></label>											
											<select id="doctorlanguages" name="doctorlanguages" class="span8">
												<option value="0">Select</option>
												<?php												
												$catiqry = "SELECT distinct fld_id,fld_languages FROM tbl_languages where fld_delstatus = 0";
												$catiqry1 = mysql_query($catiqry);
												
												while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
													{
													$lid = $row['fld_id'];
													$lname = $row['fld_languages'];						
													?>													
													<option value="<?php echo $lid;?>"><?php echo $lname; ?></option>
													<?php                                          
													}
													?>   
											</select>
											<!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
										</div>
									</div>
									
									
									<!--<div class="row-fluid">
											<div class="span12">
									<input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
									</div>
									</div>-->
										<div class="row-fluid">
											<div class="span12">											
  												<label>Product Image<span class="f_req"></span></label>
												<div class="controls">
												<div data-provides="fileupload" class="fileupload fileupload-new">												
												<div style="width: 80px; height: 80px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" /></div>
												<div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
												<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="fupload" name="fupload" /></span>
												<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
											</div> 
										</div>
									</div>
								</div>
								
								
								<div class="form-actions">
									<input class="btn btn-inverse" type="button" id="btnsavedoctdetails" name="btnsavedoctdetails" value="Save Changes"> 
									<!--<input type="submit" value="Submit" class="btnSubmit" />-->
									<!--<input id="button" type="submit" value="Upload">-->
									<button class="btn">Cancel</button>
								
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
		var dcategory = $("#specialitiesSelect").val();
		var dname = $("#doctorname").val();
		var dgender = $("#doctorgender").val();		
		var dlanguages = $("#doctorlanguages").val();	
		
		if(dcategory == "0")
		{
		alert("Select Specialities Type");
		$("#specialitiesSelect").focus();
		return false;
		}		
		if(dname == "")
		{
			alert("Enter Doctor Name");
			$("#doctorname").focus();
			return false;
		}		
		if(dgender == "0"){
		alert("Select Doctor Gender");
		$("#doctorgender").focus();
		return false;
		}
		if(dlanguages == "0"){
		alert("Select Speaking Languages");
		$("#doctorlanguages").focus();
		return false;
		}
		
		var fupload = $("#fupload").val();	
		if(fupload == ""){
			alert("Please choose the image");
			$("#fupload").focus();
			return false;
		}		
			
			/*var Data = $("#form3").serialize(); */
		
			$("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		
			$("#form1").ajaxForm({
			url:"supplier_inner.php?dcategory="+dcategory+"&dname="+dname+"&dgender="+dgender+"&dlanguages="+dlanguages,
			   				
				datatype : 'html',
				success: function(data)
				{			
				//alert(data);
				alert("Doctor Detials is added Successfully");				
				$('#rightpanel').html(data);        
				location.reload();
				},
				target: '#preview'
			}).submit();
		
			// $.ajax({				
			//	type:"POST",                                                	  				
			//	url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+productname+"&prodimage="+fuploads,
			//	data: 
			//	{		
			//	"formData" : Data,				
			//	},				
			//	datatype : 'html',
			//	success: function(data)
			//	{			
			//	alert(data);
			//	alert("Product is added Successfully");				
			//	$('#rightpanel').html(data);        
			//	location.reload();
			//	}	
			// });
					
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