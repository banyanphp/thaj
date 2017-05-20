<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');
echo $current =  date("H:i");
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
        <title>Patient List | Dashboard</title>
		
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
							<h3 class="heading">Ready Patient List</h3>
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
														<th>Date & Time</th>
														<th>Mode of Consult</th>		
														<!--<th>View</th>-->
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
			<?php
			 $gettimeslot = mysql_query("select * from tbl_timeslot where fld_from > '$current'  and fld_delstatus ='0' Limit 3");
			 while($row = mysql_fetch_array($gettimeslot))
			 {
				$gettime = $row['fld_from']." - ".$row['fld_to'];				 
			
											$seldc = "SELECT * from `tbl_patientlist` where fld_dcname ='$doctor_id' and fld_datetime = '$gettime' ";
											//echo $seldc;
											$no=1;
											$seldc1 = mysql_query($seldc);
											while($row=mysql_fetch_array($seldc1,MYSQL_ASSOC))
											{											
											$patientsidd= $row['fld_id'];
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
											$apdatetime = $row['fld_datetime'];
											$modeofconsult = $row['fld_modeofconsult'];
											?>
											<tr>
											
												<td><?php echo $pname; ?></td>
												<td><?php echo $pgender; ?></td>
												<td><?php echo $pemail111; ?></td>
												<td><?php echo $pphone; ?></td>		
												<td><?php echo $paddress; ?></td>
												<td><?php echo "India" ?></td>
												<td><?php echo $pstate; ?></td>
												<td><?php echo $pcity; ?></td>
												<td><?php echo $apdatetime; ?></td>		
												<td><?php echo $modeofconsult; ?></td>
												<!--<td align="center"><a class="btn btn-inverse" href="view_single_doctor.php?dcid=<?php echo $dcidd; ?>">View</a></td>-->
												<td align="center">
												<a class="btn btn-inverse" id="btnedit" href="ready-video-chat.php?pid=<?php echo $patientsidd; ?>">Video Call</a>
												</td>
											</tr>
											<?php
											}
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
	$("#btnsavesuppprod").on('click',(function(e) {
		e.preventDefault();				
		var category = $("#categoriesSelect").val();
		var catname = $("#categoriesSelect option:selected").text();
		var subcategory = $("#subcatSelect").val();
		var subcatname = $("#subcatSelect option:selected").text();
		var subminicategory = $("#subminicatSelect").val();
		var subminicatname = $("#subminicatSelect option:selected").text();
		var brand = $("#brandSelect").val();		
		var productname = $("#prodname").val();
		var price = $("#txtprice").val();		
		var proddesc = $("#proddesc").val();		
		var prodspecs = $("#prodspecifications").val();
		var fuploads = $("#fileinput").val();
		//var imagname = catname.concat(subcatname,subminicatname,fuploads); 
		if(category == "0"){
		alert("Select Category Name");
		$("#categoriesSelect").focus();
		return false;
		}
		if(subcategory == "0"){
		alert("Select SubCategory Name");
		$("#subcatSelect").focus();
		return false;
		}
		if(subminicategory == "0"){
		alert("Select SubminiCategory Name");
		$("#subminicatSelect").focus();
		return false;
		}
		if(brand == "0"){
		alert("Select Brand Name");
		$("#brandSelect").focus();
		return false;
		}
		if(productname == ""){
			alert("Enter Product Name");
			$("#prodname").focus();
			return false;
		}
		if(prodspecs == "0"){
		alert("Select Atleast One!");
		$("#prodspecifications").focus();
		return false;
		}
		if(price == ""){
			alert("Enter Product Price");
			$("#txtprice").focus();
			return false;
		}		
		if(proddesc == ""){
			alert("Enter Product Description");
			$("#proddesc").focus();
			return false;
		}
		var Data = $("#form3").serialize();
        $.ajax({				
				type:"POST",                                                	  				
				url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+productname+"&prodimage="+fuploads,
				data: 
				{		
				"formData" : Data,				
				},				
				datatype : 'html',
				success: function(data)
				{			
				//alert(data);
				alert("Product is added Successfully");				
				$('#rightpanel').html(data);        
				location.reload();
				}	
			 });
					
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
	var x = confirm("Are You Ready to Call Now?");
	if (x)
	{
		window.location
	//var url="doctors_inner.php";
	//url=url+"?dcid="+dcid+"&op=deldc"	
	//xmlhttp1_updcat=GetXmlHttpObject_show();    
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


</div>

    </body>
</html>