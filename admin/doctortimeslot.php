<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$doctor_id = $_SESSION['doctor_id'];
$email = $_SESSION['email'];
$viewemail = $_SESSION['pstemail'];
$fetch_doctor = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='" . $doctor_id . "'"));

$fld_name = $fetch_doctor['fld_name'];
$fld_id= $fetch_doctor['fld_id'];
$fld_gender = $fetch_doctor['fld_gender'];
$fld_speciality = $fetch_doctor['fld_speciality'];
$fld_languages = $fetch_doctor['fld_languages'];
$fld_image = $fetch_doctor['fld_image'];
$fld_experience = $fetch_doctor['fld_experience'];
$fld_createdon = $fetch_doctor['fld_createdon'];
$fld_delstatus = $fetch_doctor['fld_delstatus'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Add / Update Doctors List</title>
    </head>
<style>


input[type=checkbox] {
	visibility: hidden;
}



/* ROUNDED TWO */
.roundedTwo {
	width: 28px;
	height: 28px;
	background: #fcfff4;

	background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
	margin: 20px auto;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;

	-webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
	-moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
	box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
	position: relative;
}

.roundedTwo label {
	cursor: pointer;
	position: absolute;
	width: 20px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	left: 4px;
	top: 4px;

	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);

	background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
	background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
	background: -o-linear-gradient(top, #222 0%, #45484d 100%);
	background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
	background: linear-gradient(top, #222 0%, #45484d 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d',GradientType=0 );
}

.roundedTwo label:after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
	filter: alpha(opacity=0);
	opacity: 0;
	content: '';
	position: absolute;
	width: 9px;
	height: 5px;
	background: transparent;
	top: 5px;
	left: 4px;
	border: 3px solid #fcfff4;
	border-top: none;
	border-right: none;

	-webkit-transform: rotate(-45deg);
	-moz-transform: rotate(-45deg);
	-o-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

.roundedTwo label:hover::after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
	filter: alpha(opacity=30);
	opacity: 0.3;
}

.roundedTwo input[type=checkbox]:checked + label:after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	opacity: 1;
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
                        <h3 class="heading">Add Doctors</h3>
                          <?php if(!empty($_GET['timeslot'])){ ?>
                                <div id="timesloterror" style="font-size: large;color: #ff0000;margin-left: 25%;">Already this <?php echo $_GET['timeslot'] ?> timeslot is added.Please choose another time </div>     
                         <?php } ?>
                        <form id="form1" name="form1" method="post" action="adddoctortimeslot.php"enctype="multipart/form-data">	
                            <div id="preview" style="display:none;"></div>
                            <div id="prods" style="float:left" class="span6">

                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Doctors's Name<span class="f_req">*</span></label>											
                                        <input type="text" name="doctorname" value="<?php echo $fld_name; ?>" disabled>
                                         <input type="hidden" id="doctor" name="doctor_id" value="<?php echo $fld_id; ?>" >
                                        <!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
                                    </div>
                                </div>	
                                <span id="timeslot"></span>
                                <div class="form-group" id="addtimeslot" style="display:none;">
                                    <label for="txtProductName" class="col-sm-3 control-label">Add New Time Slot </label>
                                    <div class="col-sm-9">
                                        <div class="field_wrapper">
                                            <div>
  <span style="color: #ff0000;"> Please provide 24 hours time format Ex: 20:00  for (8:00 PM)</span>
  <br/><br/>
                                                <a href="javascript:void(0);" class="add_button" title="Add field"><span class="btn btn-success">Add</span></a>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="row-fluid">
                                                <div class="span12">
                                <input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
                                </div>
                                </div>-->



                                <div class="form-actions">
                                    <input class="btn btn-inverse" type="submit" id="btnsavedoctdetails" name="btnsavedoctdetails" value="Save Changes"> 
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
    
        <script type="text/javascript">
                                            $(document).ready(function () {
                                                setTimeout(function() {
    $('#timesloterror').hide();
}, 5000); //
                                                var maxField = 11; //Input fields increment limitation
                                                var addButton = $('.add_button'); //Add button selector
                                                var wrapper = $('.field_wrapper'); //Input field wrapper
                                                var fieldHTML = '<br/><div>From:&nbsp;<input type="text" class="form-control" name="from[]" value="" required/>&nbsp;&nbsp;To:&nbsp;<input type="text" class="form-control" name="to[]" required value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="btn btn-danger">Remove</span></a></div>'; //New input field html 

                                                var x = 1; //Initial field counter is 1
                                                $(addButton).click(function () { //Once add button is clicked
                                                    if (x < maxField) { //Check maximum number of input fields
                                                        x++; //Increment field counter
                                                        $(wrapper).append(fieldHTML); // Add field html
                                                    }
                                                });
                                                $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                                                    e.preventDefault();
                                                    $(this).parent('div').remove(); //Remove field html
                                                    x--; //Decrement field counter
                                                });
                                            });
        </script>
        <script type="text/javascript" language="javascript">
           $(document).ready(function () {
                var doctorname = $("#doctor").val();
                
                if (doctorname != '0')
                {




                    // alert('sss');
                    $.ajax({
                        type: "POST",
                        url: 'gettimeslot.php',
                        data: {
                            doctorname: doctorname,
                        },
                        success: function (data)
                        {
                            $('#timeslot').show();
                            $('#addtimeslot').show();
                            $('#timeslot').html(data);

                        },
                    });






                } else if (doctorname == '0')
                {
                    $('#addtimeslot').hide();
                    $('#timeslot').hide();
                }
            });
        </script>



        <script type="text/javascript" src="jquery/jquery.form.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>	   





    </div>

</body>


</html>