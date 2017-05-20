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
		<link rel="stylesheet" href="../login/css/pikaday.css">
    <link rel="stylesheet" href="../login/css/site.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head><style>
input[type=checkbox] {
	
	width: 25px !important;;
	height: 25px !important;
	margin-right:10px !important;
	background: #eee !important;
	border:1px solid #ddd !important;
	font-size:10px;
}
	
    </style>
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
							<h3 class="heading">Cancel</h3>
							
							<div id="preview" style="display:none;"></div>
								<div id="prods" style="float:left" class="span12">
						<div id='dateandtime' style='color:#ff0000'></div>
                                                        	<span id="dataresponses"> </span>
                                <div class="row-fluid">
										<div class="span12">											
											<label>Please select date<span class="f_req">*</span></label>
											<input type="text" id="datepicker" placeholder="Choose a date" class="span8">   
										</div>
									</div>
									  <div class="row-fluid"style="
    margin-left: 27px;
">
										<div class="span12">											
											<label name='check'>Please select Time<span class="f_req">*</span></label>
											<?php  $gettimeslot = mysql_query("select * from tbl_timeslot where  doctor_id='$doctor_id' ");
			 while($row = mysql_fetch_array($gettimeslot)) { $gettime = $row['fld_from']." - ".$row['fld_to'];?>
			 
			 <input type="checkbox" value="<?php echo $gettime ?>" name='c_id' style='margin-bottom:10px'><span style="font-size: large;"><?php echo $gettime ?><br/> </span>  <?php  } ?>
										</div>
									</div>
									
									
									
									
							
								
								<div class="form-actions">
									<button class="btn btn-danger" onclick="bundle('<?php echo $doctor_id; ?>','<?php echo "1";?>')"style="border-radius: 60px;" ><i class="fa fa-times" ></i> Remove</button>
									<!--<input type="submit" value="Submit" class="btnSubmit" />-->
									<!--<input id="button" type="submit" value="Upload">-->
									
								
								</div>										
								<div id="divmsgbox"></div>
								</div>
								<div class="span1">
								</div>
								<div id="prodspecs" style="float:right" class="span5">
								</div>
							
                        </div>
                    </div>                   
                </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
   
	

</div>

    </body> 	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script> 
	 	<script src="../login/pikaday.js"></script>
    <script>
	var date= new Date();
    var picker = new Pikaday(
    {
	
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(),
        maxDate: new Date(date.getFullYear(), date.getMonth() + 2, 0),
    
    });

    </script>	
<script>
function bundle(doctor_id,action){
	
	 var selected = new Array();
			
	var date= datepicker.value;
	

 $("input:checkbox[name=c_id]:checked").each(function() {
    selected.push($(this).val());
  });
var count= selected.length;
//alert(count);
if(count>0 & date!='' ) {


 var result= confirm ("Are you sure for cancel appoinments ?");	
	 if(result)
	 {


  $.ajax({
                    type: "POST",
                    url: 'remove_appointments.php',
                    data: {
                       doctor_id:doctor_id,
					   action:action,
					   c_id:selected,
					   date:date,
						},
					
			    	 success: function(data)
							{   
                                                            alert(data);
								$('#dataresponses').html(data);
								$(document).ready(function()
								{
								setInterval(function(){cache_clear()},1000);
								});
							function cache_clear()
							  {
								window.location.reload(true);
						     	}	
							},
    
				
});	
	 }
} 
else{
    $('#dateandtime').html('Please select date and time');
 setTimeout(function() {
    $('#dateandtime').hide();
}, 1000); //

}
	 }

</script>
	
     
</html>