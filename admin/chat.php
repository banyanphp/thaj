<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>View / Update Doctor Details</title>

    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       
        
        <div id="maincontainer" class="clearfix">
		
				<?php 
			 @include("header.php");
			?>
			
           </header>            
            <span id="dataresponse"></span>
            <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading" style="">Chat Room</h3>
<h3 style="float:right">Remaining Time:</h3><br/>
<h1><span id="divCounter" style="float:right;margin-right:-107px;margin-top:10px"></span></h1>
                                                        <div class="col-md-12" style="text-align:center">
<?php 
$consultantdate=date("Y-m-d");
$patient_id=$_POST['patient_id'];
$doctor_id=$_POST['doctor_id'];

$fetch=mysql_query("select * from tbl_patientlist where fld_dcname='$doctor_id' and fld_id='$patient_id' and consultant_date='$consultantdate' and  payment_status='1'");
$counts = mysql_num_rows($fetch);
$fetch_data=  mysql_fetch_array($fetch);
$ids= $fetch_data['fld_id'];
//echo "select * from tbl_patientlist where fld_dcname='$doctor_id' and fld_id='$patient_id' and consultant_date='$consultantdate' and  payment_status='1'";
?>
<script>var winGoogle = window.open('<?php echo $fetch_data['fld_video_url']; ?>');
</script>
                                                          <iframe src="<?php echo $fetch_data['fld_video_url']; ?>" target="_blank" frameborder="0" width="800" height="400"></iframe>

                                                 </div>
<br>
<h3> Problem </h3><br>
				<div class="col-md-12"><?php  echo $fetch_data['details']; ?></div>			
                        </div>
                    </div>                   
                </div>
            </div>     
<div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
							<div class="sidebar_inner">
                                
                                <div id="side_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-th"></i> Dashboard
                                            </a>
                                        </div>                                        
										<div class="accordion-inner">
											<ul class="nav nav-list">
											<?php if($_SESSION['userid']==1)
											{ ?>
												<li><a href="add_doctors.php">Add Doctors</a></li>
												<li><a href="doctors.php">View Doctors</a></li>
                                                                                                <li><a href="timeslot.php">Manage Time Slot</a></li>
                                                                                                <li><a href="speciality.php">List  Speciality</a></li>
                                                                                                  <li><a href="langauges.php">Languages</a></li>
                                                                                                
											<?php }  ?>
												<li><a href="patients.php">Today Patient List</a></li>
												<li><a href="upcomingappointments.php">Upcoming Appointments</a></li>
											    <li><a href="pastappointments.php">Past Appointments</a></li>
                                                                                        <?php if($_SESSION['userid']==1)
											{ ?>
                                                                                            <!--<li><a href="doctortimeslot.php">Time slot </a></li>--> 
                                                                                                <?php  } ?>
                                                                                              <?php if($_SESSION['userid']!=1){ ?>
                                                                                          <li><a href="cancelappointments.php">Cancel </a></li>
<?php  } ?>
												  <li><a href="cancel.php">List Canceled Appointments</a></li>
												<?php /*<li><a href="ready-patients.php">Ready Patients</a></li> */?>
											
											</ul>
										</div>
<h3 style="text-align:center">Patient Details</h3>
                           <ul style="list-style: none;font-size: 15px;text-align: center;margin-left: -10px;">
<li>Name:<?php  echo 	$fetch_data['fld_name']; ?></li><br/>
<li>Gender:<?php  echo 	$fetch_data['fld_gender']; ?></li><br/>	
<li onclick="test(<?php  echo 	$fetch_data['fld_id']; ?>)" style="cursor:pointer" >Prescription:<?php  echo $fetch_data['image']; ?></li><br/>  
<span id="tesr" style="font-size:18px"></span>
<li style="cursor:pointer" ><button type="button"  class="btn btn-success" onclick="window.location.href='add_tablets.php?id=<?php  echo $ids; ?>' ">+Add Tablets</button></li><br/>  

                                    </div>
                                 </div>
                                
                                <div class="push"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
      
    

	   <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
<script type="text/javascript" language="javascript">
	$(document).ready(function (e) {
	$("#btnupdatedoctdetails").on('click',(function(e) {
		e.preventDefault();				
		var dcategory = $("#specialitiesSelect").val();
		var docid = $("#docid").val();
		var dname = $("#doctorname").val();
		var dgender = $("#doctorgender").val();		
		var dlanguages = $("#doctorlanguages").val();	
		        var doctorexperience = $("#experience").val();
                    var doctorfees = $("#fees").val();
		
		if(dcategory == "0")
		{
                    $('html, body').animate({ scrollTop: 0 }, 0);
                    $('#errors').show();
                    $('#errors').html('Select Specialities Type');
	          $("#specialitiesSelect").focus();
                   setTimeout(function() {
                        $('#errors').hide();
                    }, 1000);
	
	
		return false;
		}		
		if(dname == "")
		{
		   $('html, body').animate({ scrollTop: 0 }, 0);
                    $('#errors').show();
                     $('#errors').html('Enter Doctor Name');
			
			$("#doctorname").focus();
                           setTimeout(function() {
                        $('#errors').hide();
                    }, 1000);
			return false;
		}	
                  if (doctorexperience == "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor Experience');

                        $("#experience").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
                   if (doctorfees== "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor Fees');

                        $("#fees").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
                 
		if(dgender == "0"){
                              $('#errors').show();
                      $('#errors').html('Select Gender');
		
		$("#doctorgender").focus();
                   setTimeout(function() {
                        $('#errors').hide();
                    }, 1000);
	
		return false;
		}
		if(dlanguages == "0")
                {
		    $('html, body').animate({ scrollTop: 0 }, 0);
                    $('#errors').show();
                       $('#errors').html('Select Speaking Languages');

		$("#doctorlanguages").focus();
                  setTimeout(function() {
                        $('#errors').hide();
                    }, 1000);
		return false;
		}
		
		var fupload = $("#fupload").val();	
            		
			
			/*var Data = $("#form3").serialize(); */
		
			$("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		
			$("#form1").ajaxForm({
			url:"doctors_update_inner.php?dcategory="+dcategory+"&dname="+dname+"&dgender="+dgender+"&dlanguages="+dlanguages+"&aprveprodid="+docid + "&doctorfees=" + doctorfees + "&doctorexperience=" + doctorexperience ,
			   				
				datatype : 'html',
				success: function(data)
				{			
				
				  $('#success').show();  
                                   $('html, body').animate({ scrollTop: 0 }, 0);
				  $('#success').html('Doctor Details is added Successfully');
							
				$('#rightpanel').html(data);        
	
			setTimeout(function(){ $('#success').hide();
                            
   window.location.reload(1);
}, 1000);	//$('#form1').clearForm();
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

<script>

	function fn_deletedoc(dcid)
    {	
	var x = confirm("Are you sure you want to Delete?");
	if (x)
	{
	var url="doctors_inner.php";
    url=url+"?dcid="+dcid+"&op=deldc"	
	xmlhttp1_updcat=GetXmlHttpObject_show();
    if (xmlhttp1_updcat==null)
    {
    alert ("Your browser does not support XMLHTTP!");
    return;
    }
    xmlhttp1_updcat.onreadystatechange=showgroups1;
    try
    {
    xmlhttp1_updcat.open("GET",url,true)
    }
    catch(e1)
    {
    document.write("error1")
    }
    xmlhttp1_updcat.send()
    }
	
    function showgroups1()
    {
    if (xmlhttp1_updcat.readyState==4 || xmlhttp1_updcat.readyState=="complete")
    {
    var res=xmlhttp1_updcat.responseText.trim();    
    if(res=="Successful")
    {
    alert("Selected Doctor Name is Deleted");
    location.href= "doctors.php";
    }
    else
    {
    alert("Failed");    
    location.href="doctors.php";
    }
    }
    }	
	
	}
	
	function GetXmlHttpObject_show()
    {
    var objXMLHttp_show2=null
    if(window.XMLHttpRequest)
    {
    objXMLHttp_show2=new XMLHttpRequest()
    }
    else if(window.ActiveXObject)
    {
    objXMLHttp_show2=new ActiveXObject("Microsoft.XMLHTTP")
    }
    return objXMLHttp_show2;
    }	
 </script>

<script type="text/javascript" language="javascript">


function test(id) {
var id=id;
 $('#tesr').html("Processing...");

     $.ajax({
                    type: "POST",
                    url: "get_img.php",
                    data: {
                        doctor_id: id,
                       

                    },
                    //datatype:string,

                    success: function (data)
                    {
 $('#tesr').html("");

                        $('#dataresponse').html(data);
                        $('#img').modal('show');
                    }
                });
}
</script>	

</div>

    </body>
	   
       <script type="text/javascript" src="jquery/jquery.form.js"></script>
       <script type="text/javascript" src="jquery/jquery.min.js"></script>

                    <script type="text/javascript" src="jquery/jquery.countdownTimer.js"></script>
 <script>
                                $(function(){
                                    $('#ms_timer').countdowntimer({
                                        minutes :10,
                                        seconds : 00,
                                        size : "lg"
                                    });
                                });
                            </script>
                            <script>
//var hoursleft = 0;
var minutesleft = 10; //give minutes you wish
var secondsleft = 00; // give seconds you wish
var finishedtext = "Countdown finished!";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);

}
var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    //var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
}     
if(now >= end1) {     
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
 alert("Time Up");
 winGoogle.close();

} else {
    var value = mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);
</script>
</body>


</html>