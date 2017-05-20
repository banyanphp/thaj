<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$doctor_id = $_SESSION['doctor_id'];
$userid = $_SESSION['userid'];

$email = $_SESSION['email'];
$viewemail = $_SESSION['pstemail'];
if($userid!=1){
    ?>
<script>
    window.location.href='error_404.php';
    </script><?php
}
if ($userid != 1) {
    $fetch_doctor = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='" . $doctor_id . "'"));

    $fld_name = $fetch_doctor['fld_name'];
    $fld_gender = $fetch_doctor['fld_gender'];
    $fld_speciality = $fetch_doctor['fld_speciality'];
    $fld_languages = $fetch_doctor['fld_languages'];
    $fld_image = $fetch_doctor['fld_image'];
    $fld_experience = $fetch_doctor['fld_experience'];
    $fld_createdon = $fetch_doctor['fld_createdon'];
    $fld_delstatus = $fetch_doctor['fld_delstatus'];
} else {
    $fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='" . $userid . "'"));
    $fld_names = $fetch_admin['fld_username'];
    $fld_names = ucfirst($fld_names);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add / Update Speciality List</title>
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
                        <h3 class="heading">Add Speciality</h3>
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data">	
                            <div id="preview" style="display:none;"></div>
                            <div id="errors"style="color: #ff0000;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="success"style="color: #5cb85c;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="prods" style="float:left" class="span6">




                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Add Speciality <span class="f_req">*</span></label>	
                                        <input  type="text" name="speciality" id="speciality" class="span8"/>

                                						   
                                          
                                        
                                                                                                     <!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
                                    </div>
                                </div>
  <div class="error"style="color: #ff0000;font-size: medium;margin-bottom: 1%;"></div>
  
      <div id="flash" style="color: #000;font-size: medium;margin-bottom: 1%;"></div>                            <!--<div class="row-fluid">
                                                <div class="span12">
                                <input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
                                </div>
                                </div>-->
                            


                                <div class="form-actions">
                                    <input class="btn btn-inverse submit_button" type="button" id="btnsavedoctdetails" name="btnsavedoctdetails" value="Save Changes"> 
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
                	
$(".submit_button").click(function() {

var speciality = $("#speciality").val();

//var dataString = 'content='+ textcontent;
 var str = $( "#form1" ).serialize();
if(speciality=='')
{
	$('.error').html('Enter speciality');
	$("#speciality").focus();
	return false;
}

 


else 
{
	//alert(str);
	$('.error').html('Connecting to server please wait');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "add_speciality_process.php",
data: str,
cache: true,
success: function(html){
   
    $('.error').html('');
$("#success").html(html);
//document.getElementById('content').value='';
$("#flash").hide();
$('.success').html('');
    document.getElementById("form1").reset();

 
}  
});
}
return false;
});
});
       
        </script>

        <script type="text/javascript" src="jquery/jquery.form.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>	   

 



    </div>

</body>
<script type="text/javascript" src="jquery/jquery.form.js"></script>
<script type="text/javascript" src="jquery/jquery.min.js"></script>	

</html>