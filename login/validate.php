<?php
session_start();

@include("../config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

@include("user_sessioncheck.php");

$uname = $_SESSION['user'];
$fee = $_SESSION['time_fee'];

if ((!isset($_POST['doctor'])) && (!isset($_POST['time'])) && (!isset($_POST['date'])) && (!isset($_POST['type']))) {
    unset($_SESSION['timeslot']);

    unset($_SESSION['times']);

    unset($_SESSION['doctor_id']);

    echo "<script>
        window.location.href='doctorslist.php'
        </script>";
}


$get_username = mysql_fetch_array(mysql_query("select * from tbl_register where email='$uname'"));

$name = $get_username['name'];

$email = $get_username['email'];

$mobile = $get_username['mobile'];





$_SESSION['doctor'] = mysql_real_escape_string($_REQUEST['doctor']);

$_SESSION['time'] = mysql_real_escape_string($_REQUEST['timeslot']);



$_SESSION['date'] = $_REQUEST['date'];

$_SESSION['type'] = mysql_real_escape_string($_REQUEST['type']);



$doctor = $_SESSION['doctor'];

$time = $_SESSION['time'];

$date = $_SESSION['date'];

$type = $_SESSION['type'];

unset($_SESSION['timeslot']);

unset($_SESSION['times']);

unset($_SESSION['doctor_id']);




$time = trim($time);

$getfirsttime = explode("-", $time);

$getstarttime = trim($getfirsttime[0]);

$getendtime = trim($getfirsttime[1]);

$info = mysql_fetch_array(mysql_query("select * from tbl_doctors where fld_id='$doctor'"));

$doctor_id = $info['fld_id'];

$doctor_name = $info['fld_name'];

$doctor_photo = $info['fld_image'];

$doctor_speciality = $info['fld_speciality'];
if ($fee == 1) {
    $fld_doctor_fees = $info['fld_doctor_fees'];
} else if ($fee == 2) {
    $fld_doctor_fees = $info['fld_doctor_fees1'];
}
$getspeciality = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_specialities` where fld_id = '" . $doctor_speciality . "'"));

$langua = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_languages` where fld_id = '" . $languages . "'"));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="The Corps — Multi-Purpose HTML Template" />
        <meta name="author" content="potenzaglobalsolutions.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>Doctors List | Dr.Thaj</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />
        <!-- bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- plugins -->
        <link href="css/plugins-css.css" rel="stylesheet" type="text/css" />
        <!-- mega menu -->
        <link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css" />
        <!-- default -->
        <link href="css/default.css" rel="stylesheet" type="text/css" />
        <!-- main style -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <!-- responsive -->
        <link href="css/responsive.css" rel="stylesheet" type="text/css" />
        <!-- Style customizer (Remove these two lines please) -->
        <link href="#" data-style="styles" rel="stylesheet">
        <link href="css/style-customizer.css" rel="stylesheet" type="text/css" />
        <!-- custom style -->
        <link href="css/custom.css" rel="stylesheet" type="text/css" />
        <style>
            .linnkk{
                background-color: #A61F3D;
            }
            #special
            {
                background-color: #00a9da;
                padding: 7px 0 0 2px;
                height:220px;
                cursor:pointer;
            }
            #special h4
            {
                color:#fff;
            }
            #special p
            {
                color:#fff;
            }
            #special span
            {
                color:#fff;
            }
            .time-slot li
            {
                display:inline-block;
                padding: 7px 6px 0;
            }
            .time-slot li input, .time-slot li a {
                padding: 4px 9px;
                border: none;
                border-radius: 16px;
                -webkit-border-radius: 16px;
                background: #ec7323;
                display: block;
                color: #fff;
                font-size: 12px;
            }
            .grey-cont {
                background: #f8f6f6 none repeat scroll 0 0;
                border: 1px solid #c3c2c2;
                border-radius: 6px;
                box-shadow: 0 0 2px rgba(255, 255, 255, 0.9) inset;
                float: left;
                margin: 0 0 14px;
                padding: 56px;
                text-align: center;
                width: 100%;
            }
            option { font-size:16px;  padding-top: 6px;}
        </style>
    </head>
    <body>
        <div class="page-wrapper">
            <!--=================================
               preloader -->
            <div id="preloader">
                <div class="clear-loading loading-effect"> <span></span> </div>
            </div>
            <!--=================================
               preloader -->
            <!--=================================
               header -->
<?php include 'header.php'; ?>
            <!--=================================
               header -->
            <!--=================================
               page-sidebar-->
            <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
            <script>
                $(function () {

                    //	alert('dsf');

                    $(".Proceed_button").click(function () {



                        var name = $("#pname").val();

                        var email = $("#pemail").val();

                        var mobile = $("#pmobile").val();

                        var gender = $("#gender").val();

                        var zip = $("#pzip").val();



                        var country = $("#pcountry").val();

                        var state = $("#pstate").val();

                        var city = $("#pcity").val();

                        var address = $("#paddress").val();

                        var prescription = $("#prescription").val();
                        var details = $("#details ").val();
                        var page = $("#page").val();

                        var str = $("#form").serialize(); //get all field values 

                        //alert(str);

                        if (name == '')

                        {

                            $('.error_login').html('Enter Name');

                            $("#pname").focus();

                            $("html, body").animate({scrollTop: 0}, "slow");

                            return false;

                        }



                        if (email == '')

                        {

                            $('.error_login').html('Enter Email address');

                            $("#pemail").focus();

                            return false;

                        }





                        if (mobile == '')

                        {

                            $('.error_login').html('Enter Mobile Number');

                            $("#pmobile").focus();

                            return false;

                        }





                        if (gender == '')

                        {

                            $('.error_login').html('Choose Gender');

                            $("#gender").focus();

                            $("html, body").animate({scrollTop: 200}, "slow");

                            return false;

                        }

                        if (page == '')

                        {

                            $('.error_login').html('Enter Age');

                            $("#page").focus();

                            $("html, body").animate({scrollTop: 200}, "slow");

                            return false;

                        }




                        if (zip == '')

                        {



                            $('.error_login').html('Enter zipcode');

                            $("#pzip").focus();

                            return false;

                        }



                        if (country == '')

                        {

                            $('.error_login').html('Enter Country');

                            $("#pcountry").focus();

                            return false;

                        }





                        if (state == '')

                        {

                            $('.error_login').html('Enter State');

                            $("#pstate").focus();

                            return false;

                        }





                        if (city == '')

                        {

                            $('.error_login').html('Enter Password');

                            $("#pcity").focus();

                            return false;

                        }





                        if (address == '')

                        {

                            $('.error_login').html('Enter Password');

                            $("#paddress").focus();

                            return false;

                        }


                        if (details == '')

                        {

                            $('.error_login').html('Enter details about your problem');

                            $("#details").focus();

                            return false;

                        } else

                        {
                            document.form.submit();
                            //alert(str);


                            /*
                             $('.error_login').html('Loading please wait....');
                       
                             $("#flash").show();
                       
                             $("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
                       
                             $.ajax({
                       
                             type: "POST",
                       
                             url: "login_check.php?action=proceed_to_pay",
                       
                             data: str,
                       
                             cache: true,
                       
                             success: function(html){
                       
                             alert(html);
                       
                             if(html==1)
                       
                             {
                       
                             window.location.href='doctorslist.php';
                       
                             }
                       
                       
                       
                             else { $('.error_login').html('Server Timeout'); }
                       
                       
                       
                             }  
                       
                             });
                       
                             */ }

                        return false;

                    });

                });

            </script>
            <section class="page-sidebar page-section-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:5%">
                            <ul class="list-option">
                                <li> <a><img src="doctor.png" style="width:53%"><br/>Doctor Name <br/> <?php echo $doctor_name; ?> </a></li>
                                <li><a> <img src="doctor.png" style="width:53%"><br/>Speciality <br/> <?php echo $getspeciality['fld_specialities']; ?></a> </li>
                                <li><a><img src="doctor.png" style="width:53%"><br/>Date & Time <br/> <?php echo $time; ?></a></li>
                                <li> <a><img src="doctor.png" style="width:53%"><br/>Mode of Consultation <br/> <?php echo $type; ?></a></li>
                            </ul>
                        </div>
                        <div class="row" style="margin-top:3%">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><i class="fa fa-credit-card"></i> Payment Details </div>
                                    <!-- /panel-heading -->
                                    <h5 class="error_login" style="text-align:center;margin-top:1%;color:#FF0000"></h5>
                                    <div class="panel-body payment">
                                        <!-- tabs left -->
                                        <div class="tabbable tabs-left">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="a">
                                                    <!-- row start -->
                                                    <form name="form" method="post" id="form" name="form" action="techprocess/techprocess.php" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
<?php
$root_url = 'http://drthajskin-haironlineexpert.in/login/'
?>
                                                                    <input type="hidden" class="form-control" name="returnURL" value='<?php echo $root_url . 'techprocess/techprocess.php'; ?>'/>
                                                                    <?php $strNo = rand(1, 1000000);
                                                                    $strCurDate = date('d-m-Y'); ?>
                                                                    <input type="hidden" class="form-control" name="reqType" value="T"/>
                                                                    <input type="hidden" class="form-control" name="userid" value="<?php echo $uname; ?>"/>
                                                                    <input type="hidden" class="form-control" name="mrctCode" value="L112268"/>
                                                                    <input type="hidden" class="form-control" name="mrctTxtID" value="<?php echo $strNo; ?>"/>
                                                                    <input type="hidden" class="form-control" name="currencyType" value="INR"/>
                                                                    <!-- price value to be changed -->
                                                                    <input type="hidden" class="form-control" name="amount" value="<?php echo $fld_doctor_fees; ?>.00">
                                                                    <input type="hidden" class="form-control" name="itc" value="NIC~TXN0001~122333~rt14154~8 mar 2014~Payment~forpayment"/>
                                                                    <input type="hidden" class="form-control" name="reqDetail" value="DrTh_<?php echo
                                                                    $fld_doctor_fees;
                                                                    ?>.0_0.0"/>
                                                                    <input type="hidden" class="form-control" name="txnDate" value="<?php echo $strCurDate; ?>"/>
                                                                    <input type="hidden" class="form-control" name="bankCode" value="NA"/>
                                                                    <input type="hidden" class="form-control" name="s2SReturnURL" value="https://tpslvksrv6046/LoginModule/DrTh.jsp"/>
                                                                    <input type="hidden" class="form-control" name="tpsl_txn_id" value="NA"/>
                                                                    <input type="hidden" class="form-control" name="custID" value="19872627"/>
                                                                    <input type="hidden" class="form-control" name="custname" value="test"/>
                                                                    <input type="hidden" value="1319387261FPTURM" name="iv">
                                                                    <input type="hidden" value="8960851697CHYSTX" name="key">
                                                                    <input type="hidden" value="https://www.tpsl-india.in/PaymentGateway/TransactionDetailsNew.wsdl" name="locatorURL">
                                                                    <input type="hidden" value="<?php echo $doctor_id; ?>" name="doctor">
                                                                    <input type="hidden" value="<?php echo $getstarttime; ?>" name="datetime">
                                                                    <input type="hidden" value="<?php echo $getendtime; ?>" name="enddatetime">
                                                                    <input type="hidden" value="<?php echo $date; ?>" name="date">
                                                                    <input type="hidden" value="<?php echo $type; ?>" name="modeofconsultant">
                                                                    <input type="hidden" value="<?php echo $getspeciality['fld_specialities']; ?>" name="speciality">
                                                                    <?php
                                                                    $fetch_user = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_register` where email = '$uname'"));



                                                                    //echo "SELECT * FROM `tbl_patientlist` where fld_email = '$uname'";

                                                                    $fld_id = $fetch_user['user_id'];

                                                                    $fld_name = $fetch_user['name'];

                                                                    $fld_gender = $fetch_user['fld_gender'];

                                                                    $fld_email = $fetch_user['email'];

                                                                    $fld_phone = $fetch_user['mobile'];

                                                                    $fld_address = $fetch_user['fld_address'];

                                                                    $fld_pincode = $fetch_user['fld_pincode'];

                                                                    $fld_country = $fetch_user['fld_country'];

                                                                    $fld_state = $fetch_user['fld_state'];

                                                                    $fld_city = $fetch_user['fld_city'];
                                                                    ?>
                                                                    <label>Name*</label>
                                                                    <input name="name" type="text" value="<?php echo $fld_name; ?>" id="pname"  class="form-control" placeholder="Name*"  />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email*</label>
                                                                    <input name="email" type="text" value="<?php echo $email; ?>" id="pemail"  class="form-control" placeholder="E-MAIL* "  />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Mobile*</label>
                                                                    <input name="mobile" type="text" value="<?php echo $fld_phone; ?>" id="pmobile"  class="form-control" placeholder="Mobile Number*" onKeyPress="return isNumberKey(event)" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Gender*</label>
                                                                    <select style="background-color:#FFFFFF" name="gender" id="gender">
                                                                        <option value=''>Select Gender</option>
                                                                        <option value='Male' <?php if ($fld_gender == "Male") { ?> selected<?php } ?>>Male</option>
                                                                        <option value='Female' <?php if ($fld_gender == "Female") { ?> selected<?php } ?>>Female</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Age*</label>
                                                                    <input name="age" type="text" value=""  id="page"  class="form-control zip"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Explain Your Problem*</label>
                                                                    <textarea name="details" id="details" class="form-control"/></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Country*</label>
                                                                    <input name="country"   value="<?php echo $fld_country; ?>" type="text" id="pcountry"  class="form-control"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>State*</label>
                                                                    <input name="state" type="text"  value="<?php echo $fld_state; ?>"  id="pstate"  class="form-control"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>City*</label>     
                                                                    <input name="city" type="text"  value="<?php echo $fld_city; ?>"  id="pcity"  class="form-control"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address*</label>
                                                                    <input name="address" type="text"  value="<?php echo $fld_address; ?>"  id="paddress" class="form-control"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Zip Code*</label>
                                                                    <input name="zip" type="text" value="<?php echo $fld_pincode; ?>"  id="pzip"  class="form-control zip"/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Prescription*</label>
                                                                    <input name="uploadedimage" type="file"    id="prescription" onchange="return ValidateFileUpload()"/>
                                                                </div>
                                                            </div></div>
                                                        <div class="row">
                                                             <div class="col-sm-12">
                                                             <div class="form-group">
                                                                <label>Consultation for  others</label>

                                                                <input name="self" type="checkbox"  value="1"   id="new" style=" 
                                                                       height: 14px;
                                                                       margin-top: 19px;
                                                                       margin-left: -43%;
                                                                       "/><br>

                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: 0px;">          
                                                                <div class="form-group" id="othersname" style="display:none;">
                                                                    <label>Name*</label>
                                                                    <input name="othersname" type="text"  class="form-control" />
                                                                </div></div>
                                                            <div class="col-sm-6" style="">   
                                                                <div class="form-group" id="othergender" style="display:none;">
                                                                    <label>Gender*</label>
                                                                    <select style="background-color:#FFFFFF" name="othergender">
                                                                        <option value=''>Select Gender</option>
                                                                        <option value='Male' >Male</option>
                                                                        <option value='Female' >Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6" style="padding-left: 0px;">         
                                                                <div class="form-group" id="othersage" style="display:none;">
                                                                    <label>Age*</label>
                                                                    <input name="othersage" type="text"  class="form-control" />
                                                                </div></div>


                                                        </div>
                                                </div>
                                            </div>
                                            </form>
                                            <!-- /row closed -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /tabs -->
                            </div>
                            <!-- /panel-body --> 
                        </div>
                    </div>
                    <div class="col-sm-3" style="float:right">
                        <h5>Total Amount Payable</h5>
                        <h4>
<?php echo $fld_doctor_fees; ?> INR</h4>
                        <input type="button"  value="Proceed to pay"  class="btn btn-primary btn-lg Proceed_button" />
                    </div>
                </div>
        </div>
    </section>
    <div class="modal fade" id="myModal-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Consult Now </h4>
                </div>
                <div class="modal-body" style="height:280px">
                    <div class="grey-cont col-sm-8 col-sm-offset-2">
                        <form  role="form" class="loginform" id="singleprodform" name="singleprodform" method="post">
                            <h5 align="center">Doctor Availability - <?php echo date("l F dS Y"); ?></h5>
                            <div id="SlotContainer" style=" margin-left: 25%;width: 60%;">
                                <ul id="timeSlot" class="time-slot" style="margin-left: -16%;margin-top: 3%;width: 116%;"><li><a href="doctors/doctorslist.php">13:45 - 14:00</a></li><li><a href="doctors/doctorslist.php">14:00 - 14:15</a></li><li><a href="doctors/doctorslist.php">14:15 - 14:30</a></li></ul>
                                <h6 align="center" style=" margin-left: -24px;margin-top: 20px;width: 287px;">Premium Slots (within 45 mins) Rs 400/-</h6>
                            </div>
<?php /* ?><input type="button" name="btnsave_supplier" id="btnsave_supplier(<?php echo $supplierid; ?>)" class="btn btn-primary loginbtn" value="Send Enquiry"><?php */ ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
@include("bottom.php");
?>
    <!--=================================
       footer -->
    <!--=================================
       popup-contact -->

    <!--=================================
       popup-contact -->
</div>
<style>
    .list-option {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }
    .list-option li {
        float: left; width: 23%;
    }
    .list-option li a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }
    .form-control {
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        color: #555;
        display: block;
        font-size: 14px;
        height: 34px;
        line-height: 1.42857;
        padding: 6px 12px;
        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
        width: 100%;
    }
</style>
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
    $('#pname').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });
</script>
<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a></div>
<!--=================================
   jquery -->
<!-- jquery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- plugins-jquery -->
<script type="text/javascript" src="js/plugins-jquery.js"></script>
<!-- mega menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
<!-- socialstream -->
<script src="js/social/socialstream.jquery.js"></script>
<!-- Style Customizer --> 
<script type="text/javascript" src="js/style-customizer.js"></script> 
<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
        function ValidateFileUpload() {

            var fuData = document.getElementById('prescription');
            var FileUploadPath = fuData.value;

            //To check if user upload any file
            if (FileUploadPath == '') {
                alert("Please upload an image");

            } else {
                var Extension = FileUploadPath.substring(
                        FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

                //The file uploaded is an image

                if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                        || Extension == "jpeg" || Extension == "jpg") {

                    // To Display
                    if (fuData.files && fuData.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(fuData.files[0]);
                    }

                }

                //The file upload is NOT an image
                else {
                    alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
                    document.getElementById('prescription').value = '';
                }
            }
        }
</script>
<script type="text/javascript">
    $(function () {
        $("#new").click(function () {
            if ($(this).is(":checked")) {

                $("#othersname").show();
                $("#othergender").show();
                $("#othersage").show();

            } else {
                $("#othersname").hide();
                $("#othergender").hide();
                $("#othersage").hide();
            }
        });
    });
</script>
</body>
</html>

