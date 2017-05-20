

<?php

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
                            <div id="errors"style="color: #ff0000;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="success"style="color: #5cb85c;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="prods" style="float:left" class="span6">



                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Create Username <span class="f_req">*</span></label>
                                        <input name="doctorusername" id="doctorusername" class="span8"/>
                                    </div>
                                </div>		



                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Create Password<span class="f_req">*</span></label>
                                        <input name="doctorpassword" id="doctorpassword" class="span8" type="password"/>
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
                                        <label>Doctor Phone<span class="f_req">*</span></label>
                                        <input name="doctorphone" id="phone" class="span8" onKeyPress="return isNumberKey(event)"/>
                                    </div>
                                </div>	
<div class="row-fluid">
                                    <div class="span12">											
                                        <label>Doctor Email<span class="f_req">*</span></label>
                                        <input name="doctoremail" id="email" class="span8"/>
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

                                            while ($row = mysql_fetch_array($catiqry1, MYSQL_ASSOC)) {
                                                $gid = $row['fld_id'];
                                                $gname = $row['fld_gender'];
                                                ?>													
                                                <option value="<?php echo $gid; ?>"><?php echo $gname; ?></option>
                                                <?php
                                            }
                                            ?>   
                                        </select>
                                        <!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
                                    </div>
                                </div>	

                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Experience(in Years)<span class="f_req">*</span></label>
                                        <input  type="text" name="experience" id="experience" class="span8"/>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Fees(in Rupees)<span class="f_req">*</span></label>
                                        <input type="text" min="1" name="fees" id="fees" class="span8" onKeyPress="return isNumberKey(event)"/>
/>
                                    </div>
                                </div>
                                
                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Speciality Category<span class="f_req">*</span></label>											

<!--                                        <textarea name="specialitiesSelect" id="specialitiesSelect" class="span8" rows="2" cols="50"></textarea>-->


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
                                        <label>Languages <span class="f_req">*</span></label>	

								
								<select name="doctorlanguages" id="doctorlanguages" value="0" multiple data-placeholder="Choose a Languages..." class="chzn_b span12">
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
                                        <label>Doctor Image<span class="f_req"></span></label>
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

        <script type="text/javascript" language="javascript">
            $(document).ready(function (e) {
                $("#btnsavedoctdetails").on('click', (function (e) {
                    e.preventDefault();
                    var dcategory = $("#specialitiesSelect").val();
                    var dname = $("#doctorname").val();
                    var dgender = $("#doctorgender").val();
                    var dlanguages = $("#doctorlanguages").val();
                   
                    var doctorpassword = $("#doctorpassword").val();
                    var doctorusername = $("#doctorusername").val();
                    var doctorexperience = $("#experience").val();
                    var doctorfees = $("#fees").val();
    var doctorvideo = $("#doctorvideo").val();
   var dphone= $("#phone").val();
  var demail= $("#email").val();
                    if (doctorusername == "")

                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Username');

                        $("#doctorusername").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);

                        return false;
                    }


                    if (doctorpassword == "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Password');

                        $("#doctorpassword").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
                    if (dname == "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor Name');

                        $("#doctorname").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
 if (dphone == "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor Phone Number');

                        $("#phone").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
 if (demail== "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor Email Id');

                        $("#email").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
var x = $("#email").val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
 $('#errors').html('Enter vaild Email address');
 
	    $("#email").focus();
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
                    if (doctorvideo== "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Doctor video url');

                        $("#video").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
                    if (dcategory == "")
                    {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Enter Speciality');

                        $("#specialitiesSelect").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }





                    if (dgender == "0") {
                        $('#errors').show();
                        $('#errors').html('Select Gender');

                        $("#doctorgender").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }
                    if (dlanguages == "0") {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Select Speaking Languages');

                        $("#doctorlanguages").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }

                    var fupload = $("#fupload").val();
                    if (fupload == "") {
                        $('html, body').animate({scrollTop: 0}, 0);
                        $('#errors').show();
                        $('#errors').html('Please choose the image');

                        $("#fupload").focus();
                        setTimeout(function () {
                            $('#errors').hide();
                        }, 1000);
                        return false;
                    }

                    /*var Data = $("#form3").serialize(); */

                    $("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");

                    $("#form1").ajaxForm({
                        url: "supplier_inner.php?dcategory=" + dcategory + "&dname=" + dname + "&dgender=" + dgender + "&dlanguages=" + dlanguages + "&doctorusername=" + doctorusername + "&doctorpassword=" + doctorpassword + "&doctorfees=" + doctorfees + "&doctorexperience=" + doctorexperience + "&doctorphone =" + dphone + "&doctoremail =" + demail ,
                        datatype: 'html',
                        success: function (data)
                        {
                            $('#success').show();
                            $('html, body').animate({scrollTop: 0}, 0);
                            $('#success').html('Doctor DetaIls is added Successfully');

                            $('#rightpanel').html(data);

                            setTimeout(function () {
                                $('#success').hide();

                               window.location.href='doctors.php';
                            }, 1000);	//$('#form1').clearForm();
                        },
                        target: '#preview'
                    }).submit();



                }));
            });
        </script>

        <script type="text/javascript" src="jquery/jquery.form.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>	   
<script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode == 32) {
                return true;
            } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        }
    </script>
        <script>
            function fn_yes()
            {
                alert('Photo Is Uploaded Successfully');
                $('#divmsgbox').html('');
                window.location = "dashboard.php";

            }
            function fn_error()
            {
                alert('Size is too large. Choose another one');
                document.getElementById('divmsgbox').innerHTML = '';
                window.location = "dashboard.php";
            }
            function fn_errorimgaa()
            {
                alert('Invalid Image Extension');
                document.getElementById('divmsgbox').innerHTML = '';
                window.location = "dashboard.php";

            }


        </script>

    <script>
    $('#doctorname').keypress(function(e) {
        
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });
</script>
<script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode == 32) {
                return true;
            } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        }
    </script>

    </div>

</body>
	


</html>
