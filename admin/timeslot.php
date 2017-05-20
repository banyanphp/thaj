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
$fetch_doctor = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='" . $doctor_id . "'"));

$fld_name = $fetch_doctor['fld_name'];
$fld_gender = $fetch_doctor['fld_gender'];
$fld_speciality = $fetch_doctor['fld_speciality'];
$fld_languages = $fetch_doctor['fld_languages'];
$fld_image = $fetch_doctor['fld_image'];
$fld_experience = $fetch_doctor['fld_experience'];
$fld_createdon = $fetch_doctor['fld_createdon'];
$fld_delstatus = $fetch_doctor['fld_delstatus'];

    $fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='" . $userid . "'"));
    $fld_names = $fetch_admin['fld_username'];
    $fld_names = ucfirst($fld_names);
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
                          <?php if(!empty($_GET['timeslot'])){ ?>
                                <div id="timesloterror" style="font-size: large;color: #ff0000;margin-left: 25%;">Already this <?php echo $_GET['timeslot'] ?> timeslot is added.Please choose another time </div>     
                         <?php } ?>
                        <form id="form1" name="form1" method="post" action="addtimeslot.php"enctype="multipart/form-data">	
                            <div id="preview" style="display:none;"></div>
                            <div id="prods" style="float:left" class="span12">

                                <div class="row-fluid">
                                    <div class="span12">
                                        <label>Doctors's Name<span class="f_req">*</span></label>											
                                        <select id="doctorname" name="doctorname" class="span8" onchange="gettimeslot()">
                                            <option value="0">Select</option>
                                            <?php
                                            $catiqry = "SELECT * FROM tbl_doctors where fld_delstatus = 0";
                                            $catiqry1 = mysql_query($catiqry);

                                            while ($row = mysql_fetch_array($catiqry1, MYSQL_ASSOC)) {
                                                $gid = $row['fld_id'];
                                                $dname = $row['fld_name'];
                                                ?>													
                                                <option value="<?php echo $gid; ?>"><?php echo $dname; ?></option>
                                                <?php
                                            }
                                            ?>   
                                        </select>
                                        <!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
                                    </div>
                                </div>	
                                <span id="timeslot"></span>
                                <div class="form-group" id="addtimeslot" style="display:none;">
                                    <label for="txtProductName" class="col-sm-3 control-label">Add New Time Slot </label>
                                    <div class="col-sm-9">
                                        <div class="field_wrapper">
                                            <div>

                                                <a href="javascript:void(0);" class="add_button" title="Add field"><span class="btn btn-success">Add</span></a>
                                            </div>
                                            <span style="color: #ff0000;"> Please provide 24 hours time format Ex: 20:00  for (8:00 PM)</span>
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
                                                var fieldHTML = '<br/><div>From:&nbsp;<input type="text" class="form-control" name="from[]" value="" required/>&nbsp;&nbsp;To:&nbsp;<input type="text" class="form-control" name="to[]" required value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="btn btn-danger" style="margin-left:15px">Remove</span></a></div>'; //New input field html 

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
            function gettimeslot() {
                var doctorname = $("#doctorname").val();
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
            }
        </script>



        <script type="text/javascript" src="jquery/jquery.form.js"></script>
        <script type="text/javascript" src="jquery/jquery.min.js"></script>	   





    </div>

</body>


</html>