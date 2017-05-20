<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$doctor_id = $_SESSION['doctor_id'];
$userid = $_SESSION['userid'];
if($userid!=1){
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
        <title>Dashboard</title>
		
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
                                                  <h3 class="heading" >View Langauges </h3>
                                                  <input class="btn btn-inverse" type="button" id="btnedit" onclick="window.location.href='addlangauges.php'" value="Add Langauges" style="margin-left: 90%;margin-bottom: 2%;"/>
							<form id="form1" name="form1" method="post">	
								<div id="prods" style="float:left" class="span6">
									<div class="row-fluid">
										<div class="span12" style="width:206%;">										
											<table style="border:1px solid;" class="table table-striped table-bordered table-hover">
												<thead >
													<tr style="pading:10px;">
														
														<th>Speciality</th>
														
														<!-- <th>Size/Grade</th>
														 <th>Edit</th> -->
                                                                                                               
														<th>Action</th>
													
													</tr>
												</thead>
												<tbody>
											<?php
											$seldc = "SELECT * from tbl_languages ";
											$seldc1 = mysql_query($seldc);
											while($row=mysql_fetch_array($seldc1,MYSQL_ASSOC))
											{
											
											
											$dcidd= $row['fld_id'];
											//$rprodsubminicatid= $row['fld_level3id'];
											$fld_specialities = $row['fld_languages'];	
                                                                                     	
											
											
											
											
											?>
											
											
													<tr>
														<td><?php echo $fld_specialities; ?></td>
														
                                                                                                                <td align="center">
														
														<input class="btn btn-inverse" type="button" id="btnedit" onclick="fn_deletedoc('<?php echo $dcidd;?>')" value="Delete"/>
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
	


 	
   
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
<script>

</script>

<script>

	function fn_deletedoc(dcid)
    {	
	
 var result = confirm("Are you sure for delete ?");
              // alert(dcid);
                if (result)
                {
                    // alert('sss');
                    $.ajax({
                        type: "POST",
                        url: 'delete_langauges.php',
                        data: {
                            id: dcid,
                        },
                        success: function (data)
                        {
                            alert(data);
                            // alert("Category is Updated Successfully");    

                            location.reload();
                        },
                    });

                }
	
    }

 </script>


</div>

    </body>
</html>