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
        <title>Add / Update Doctors List</title>
        	<!-- multiselect -->
            <link rel="stylesheet" href="lib/multi-select/css/multi-select.css" />
		<!-- enhanced select -->
            <link rel="stylesheet" href="lib/chosen/chosen.css" />
        <!-- upload -->
        <style>button.btn.btn-danger.remove_button{
            margin-top: 11px;
}</style>
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
                        <div id="response"style=""></div>
                        <h3 class="heading">Add Medicines</h3>
                        <button type="button" class="btn btn-primary add_button" style="float: right" value="ADD+" ><i class="icon-plus-sign"></i> Add</button>
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="addprocess.php">	
                            <div id="preview" style="display:none;"></div>
                            <div id="errors"style="color: #ff0000;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="success"style="color: #5cb85c;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="prods" style="float:left" class="span12">



                                <div class="row-fluid field_wrapper">
                                    <div class="span9">											
                                        
                                        <input name="field_name[]" id="doctorusername" class="span8" required/>
                                    </div>
                                </div>		






                                
                            

                                <!--<div class="row-fluid">
                                                <div class="span12">
                                <input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
                                </div>
                                </div>-->
                         


                                <div class="form-actions">
                                    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
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
   
			<script src="js/jquery-migrate.min.js"></script>
            <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
            <!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery_cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
			<!-- bootstrap plugins -->
			<script src="js/bootstrap.plugins.min.js"></script>
			<!-- tooltips -->
			<script src="lib/qtip2/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
			<!-- fix for ios orientation change -->
			<script src="js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="lib/antiscroll/antiscroll.js"></script>
			<script src="lib/antiscroll/jquery-mousewheel.js"></script>
			<!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- mobile nav -->
			<script src="js/selectNav.js"></script>
			<!-- common functions -->
			<script src="js/gebo_common.js"></script>
	
            
            <!-- globalize for jQuery UI-->
            <script src="lib/jquery-ui/external/globalize.js"></script>
            <!-- touch events for jquery ui-->
            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- masked inputs -->
            <script src="js/forms/jquery.inputmask.min.js"></script>
            <!-- autosize textareas -->
            <script src="js/forms/jquery.autosize.min.js"></script>
            <!-- textarea limiter/counter -->
            <script src="js/forms/jquery.counter.min.js"></script>
            <!-- datepicker -->
            <script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
            <!-- timepicker -->
            <script src="lib/datepicker/bootstrap-timepicker.min.js"></script>
            <!-- tag handler -->
            <script src="lib/tag_handler/jquery.taghandler.min.js"></script>
            <!-- styled form elements -->
            <script src="lib/uniform/jquery.uniform.min.js"></script>
            <!-- animated progressbars -->
            <script src="js/forms/jquery.progressbar.anim.js"></script>
            <!-- multiselect -->
			<script src="lib/multi-select/js/jquery.multi-select.js"></script>
			<script src="lib/multi-select/js/jquery.quicksearch.js"></script>
            <!-- enhanced select (chosen) -->
            <script src="lib/chosen/chosen.jquery.min.js"></script>
            <!-- TinyMce WYSIWG editor -->
            <script src="lib/tiny_mce/jquery.tinymce.js"></script>
			<!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
			<script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
			<script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
            <!-- colorpicker -->
			<script src="lib/colorpicker/bootstrap-colorpicker.js"></script>
			<!-- password strength checker -->
			<script src="lib/complexify/jquery.complexify.min.js"></script>
            <!-- toggle buttons -->
            <script src="lib/toggle_buttons/jquery.toggle.buttons.js"></script>
			<!-- form functions -->
            <script src="js/gebo_forms.js"></script>
    
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


        <script type="text/javascript" src="jquery/jquery.form.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>	   

<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 1000; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<br/><div ><input type="text" class="form-control " name="field_name[]" value="" style="width:48%;margin-top:11px;margin-right:10px" required/><button type="button" class="btn btn-danger remove_button" value="ADD+" ><i class=""></i> Remove</button></div>'; //New input field html 
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

    </div>

</body>
	


</html>