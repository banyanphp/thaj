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
$aprveprodid = $_GET['dcid'];

$lvl2catiqry = "SELECT * FROM tbl_doctors where  fld_id = '$aprveprodid'";
$lvl2catiqry1 = mysql_query($lvl2catiqry);
while ($row1 = mysql_fetch_array($lvl2catiqry1, MYSQL_ASSOC)) {

    $dcname = $row1['fld_name'];

    $dcname = $row1['fld_name'];
    $gender = $row1['fld_gender'];
    $specilities = $row1['fld_speciality'];
    $laguages = $row1['fld_languages'];
    $image = $row1['fld_image'];
    $expericne = $row1['fld_experience'];
    $fees = $row1['fld_doctor_fees'];
    $catlevel2id = $row1['fld_languages'];
 $phone = $row1['mobile_no'];
$email= $row1['email_id'];
    $imagepath = 'doctors_images/';

    $dcimages = $imagepath . $image;
}
$fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='" . $userid . "'"));
$fld_names = $fetch_admin['fld_username'];
$fld_names = ucfirst($fld_names);
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>View / Update Doctor Details</title>
        <link rel="stylesheet" href="lib/multi-select/css/multi-select.css" />
        <!-- enhanced select -->
        <link rel="stylesheet" href="lib/chosen/chosen.css" />
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       

        <div id="maincontainer" class="clearfix">

<?php
include("header.php");
?>

        </header>            

        <div id="contentwrapper">
            <div class="main_content">
                <div class="row-fluid">
                    <div class="span12">
                        <div id="response"style="margin-left:60%"></div>
                        <h3 class="heading">View / Update Doctor Details</h3>
                        <form id="form1" name="form1" method="post" enctype="multipart/form-data">	
                            <div id="errors"style="color: #ff0000;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="success"style="color: #5cb85c;font-size: medium;margin-left: 13%; margin-bottom: 1%;"></div>
                            <div id="preview" style="display:none;"></div>
                            <div id="prods" style="float:left" class="span6">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Speciality Category<span class="f_req">*</span></label>											
                                        <select id="specialitiesSelect" name="specialitiesSelect" class="span8">												
<?php
$catiqry = "SELECT distinct fld_id, fld_specialities FROM tbl_specialities where fld_delstatus = 0";
$catiqry1 = mysql_query($catiqry);

while ($row = mysql_fetch_array($catiqry1, MYSQL_ASSOC)) {
    $sepcialitiesid = $row['fld_id'];
    $sepcialitiesname = $row['fld_specialities'];
    ?>
                                                <option value="<?php echo $sepcialitiesid; ?>" <?php if ($specilities == $sepcialitiesid) echo 'selected'; ?>><?php echo $sepcialitiesname; ?></option>													
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
                                        <input name="doctorname" id="doctorname" class="span8" value="<?php echo $dcname; ?>"/>
                                        <input name="docid" id="docid" class="span8" value="<?php echo $aprveprodid; ?>" type="hidden"/>
<?php /* echo $dcimages = $imagepath.$image; */ ?>
                                    </div>
                                </div>	
<div class="row-fluid">
                                    <div class="span12">											
                                        <label>Doctor Phone<span class="f_req">*</span></label>
                                      
                                        <input name="doctorphone" id="phone" class="span8" value="<?php echo $phone; ?>" type="text"/>

                                    </div>
                                </div>	
<div class="row-fluid">
                                    <div class="span12">											
                                        <label>Doctor Email<span class="f_req">*</span></label>
                                      
                                        <input name="doctoremail" id="email" class="span8" value="<?php echo $email; ?>" type="text"/>

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
                                                <option value="<?php echo $gid; ?>" <?php if ($gender == $gid) echo 'selected'; ?>><?php echo $gname; ?></option>
                                                <?php
                                            }
                                            ?>   
                                        </select>

                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Languages <span class="f_req">*</span></label>	
                                        <select name="doctorlanguages" id="doctorlanguages" value="0" multiple data-placeholder="Choose a Country..." class="chzn_b span12">				<option value="0">Select</option>
<?php
$catiqry = "SELECT *  FROM tbl_languages where fld_delstatus = 0";
$catiqry1 = mysql_query($catiqry);

while ($row = mysql_fetch_array($catiqry1, MYSQL_ASSOC)) {
    $gid = $row['fld_id'];
    $gname = $row['fld_languages'];
    ?>													
                                                <option value="<?php echo $gid; ?>" <?php
                                                $languages = trim($laguages);

                                                $languagesaray = explode(",", $languages);
                                                $count = count($languagesaray);
                                                $lan = "";
                                                for ($i = 0; $i < $count; $i++) {
                                                    $languagesval = $languagesaray[$i];



                                                    if ($languagesval == $gid)
                                                        echo 'selected';
                                                }
                                                ?>>
                                                <?php echo $gname; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>   

                                            <div class="span6">

                                            </div>

                                        </select>




                                                             <!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Experience(in Years)<span class="f_req">*</span></label>
                                        <input  type="text" name="experience" id="experience"  value="<?php echo $expericne; ?> " class="span8"/>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Fees(in Rupees)<span class="f_req">*</span></label>
                                        <input type="text"  name="fees" id="fees" value="<?php echo $fees; ?> " class="span8"/>
                                    </div>
                                </div>



                                <div class="row-fluid">
                                    <div class="span12">											
                                        <label>Doctor Image<span class="f_req"></span></label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new">

<?php
if (file_exists($dcimages)) {
    ?>
                                                    <div style="width: 80px; height: 80px;" class="fileupload-new thumbnail">
                                                        <img src="<?php echo $dcimages; ?>" alt="<?php echo $dcname; ?>"/>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div style="width: 80px; height: 80px;" class="fileupload-new thumbnail">
                                                        <img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" />
                                                    </div>
                                                    <?php
                                                }
                                                ?>												

                                                <div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                                                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="fupload" name="fupload" /></span>
                                                <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions">									
                                    <input class="btn btn-inverse" type="button" id="btnupdatedoctdetails" value="Approve"/>

                                    <a class="btn btn-inverse" href="doctors.php">Cancel</a>								
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
            $(document).ready(function () {
                //* show all elements & remove preloader
                setTimeout('$("html").removeClass("js")', 1000);
            });
        </script>

        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script type="text/javascript" language="javascript">
                                    $(document).ready(function (e) {
                                        $("#btnupdatedoctdetails").on('click', (function (e) {
                                            e.preventDefault();
                                            var dcategory = $("#specialitiesSelect").val();
                                            var docid = $("#docid").val();
                                            var dname = $("#doctorname").val();
var doctorphone= $("#phone").val();
                                            var dgender = $("#doctorgender").val();
                                            var dlanguages = $("#doctorlanguages").val();
                                            var doctorexperience = $("#experience").val();
                                            var doctorfees = $("#fees").val();
  var doctoremail = $("#email").val();

                                            if (dcategory == "0")
                                            {
                                                $('html, body').animate({scrollTop: 0}, 0);
                                                $('#errors').show();
                                                $('#errors').html('Select Specialities Type');
                                                $("#specialitiesSelect").focus();
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
 if (doctorphone== "")
                                            {
                                                $('html, body').animate({scrollTop: 0}, 0);
                                                $('#errors').show();
                                                $('#errors').html('Enter Doctor Phone');

                                                $("#phone").focus();
                                                setTimeout(function () {
                                                    $('#errors').hide();
                                                }, 1000);
                                                return false;
                                            }
 if (doctoremail == "")
                                            {
                                                $('html, body').animate({scrollTop: 0}, 0);
                                                $('#errors').show();
                                                $('#errors').html('Enter Email Id');

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
                                            if (doctorfees == "")
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

                                            if (dgender == "0") {
                                                $('#errors').show();
                                                $('#errors').html('Select Gender');

                                                $("#doctorgender").focus();
                                                setTimeout(function () {
                                                    $('#errors').hide();
                                                }, 1000);

                                                return false;
                                            }
                                            if (dlanguages == "0")
                                            {
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


                                            /*var Data = $("#form3").serialize(); */

                                            $("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");

                                            $("#form1").ajaxForm({
                                                url: "doctors_update_inner.php?dcategory=" + dcategory + "&dname=" + dname + "&dgender=" + dgender + "&dlanguages=" + dlanguages + "&aprveprodid=" + docid + "&doctorfees=" + doctorfees + "&doctorexperience=" + doctorexperience + "&doctorphone =" + doctorphone + "&doctoremail =" + doctoremail ,
                                                datatype: 'html',
                                                success: function (data)
                                                {


                                                    $('#success').show();
                                                    $('html, body').animate({scrollTop: 0}, 0);
                                                    $('#success').html("Updated Successfully");

                                                    $('#rightpanel').html(data);

                                                    setTimeout(function () {
                                                        $('#success').hide();

                                                      window.location.href='doctorslist.php';
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
                                        document.getElementById('divmsgbox').innerHTML = '';
                                        window.location = "aadmin.php";

                                    }
                                    function fn_errorimgaa()
                                    {
                                        alert('Invalid Image Extension');
                                        document.getElementById('divmsgbox').innerHTML = '';
                                        window.location = "aadmin.php";

                                    }
        </script>

        <script>

            function fn_deletedoc(dcid)
            {
                var x = confirm("Are you sure you want to Delete?");
                if (x)
                {
                    var url = "doctors_inner.php";
                    url = url + "?dcid=" + dcid + "&op=deldc"
                    xmlhttp1_updcat = GetXmlHttpObject_show();
                    if (xmlhttp1_updcat == null)
                    {
                        alert("Your browser does not support XMLHTTP!");
                        return;
                    }
                    xmlhttp1_updcat.onreadystatechange = showgroups1;
                    try
                    {
                        xmlhttp1_updcat.open("GET", url, true)
                    } catch (e1)
                    {
                        document.write("error1")
                    }
                    xmlhttp1_updcat.send()
                }

                function showgroups1()
                {
                    if (xmlhttp1_updcat.readyState == 4 || xmlhttp1_updcat.readyState == "complete")
                    {
                        var res = xmlhttp1_updcat.responseText.trim();
                        if (res == "Successful")
                        {
                            alert("Selected Doctor Name is Deleted");
                            location.href = "doctors.php";
                        } else
                        {
                            alert("Failed");
                            location.href = "doctors.php";
                        }
                    }
                }

            }

            function GetXmlHttpObject_show()
            {
                var objXMLHttp_show2 = null
                if (window.XMLHttpRequest)
                {
                    objXMLHttp_show2 = new XMLHttpRequest()
                } else if (window.ActiveXObject)
                {
                    objXMLHttp_show2 = new ActiveXObject("Microsoft.XMLHTTP")
                }
                return objXMLHttp_show2;
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


    </div>

</body>

</html>