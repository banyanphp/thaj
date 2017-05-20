<?php
session_start();
@include("../config.php");
error_reporting('0');
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['user'];
$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');
//Get Only Current Time 00:00 AM / PM
//$current = date("H:i");
$current = date("H:i", strtotime('+30 minutes'));

$current_date = date("Y-m-d");
$current_times = date("H:i");
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
<link rel="stylesheet" type="text/css" href="js/revolution/css/extralayers.css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="js/revolution/rs-plugin/css/settings.css" media="screen" />

<!-- Scrollbar -->
<link href="css/portfolio/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
        <!-- Style customizer (Remove these two lines please) -->

        <link href="css/style-customizer.css" rel="stylesheet" type="text/css" />

        <!-- custom style -->
        <link href="css/custom.css" rel="stylesheet" type="text/css" />

<link href="css/style-customizer.css" rel="stylesheet" type="text/css" />
<style>
#error{
display:none;margin-left: 28%; color: #ff0000;
}
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
<?php include 'header.php'?>     

            <!--=================================
             header -->


            <!--=================================
             page-sidebar-->

            <section class="page-sidebar page-section-ptb">
                <div class="container" style="background-color:#F5F5F5">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 profile" style="background-color:#F5F5F5;padding:20px;">
                            <div class="sidebar-widget">
                                <section class="profile-img">
                                    <figure style="text-align:center">
                                        <a title="" href="javascript:void(0);">
                                            <?php
                                            $q = mysql_fetch_array(mysql_query("select * from tbl_register where `email`='$uname' "));
                                            if ($q['profile'] != '') {
                                                ?>
                                                <img  class="img-responsive img-circle" alt="" src="<?php echo $q['profile']; ?>" style="width:43%;margin-left:auto;margin-right:auto">
                                            <?php } else { ?>
                                                <img  class="img-responsive img-circle" alt="" src="user.png" style="width:43%;margin-left:auto;margin-right:auto">
                                            <?php } ?>
                                        </a>
                                        <h2 class="heading16">
                                            <span id="ContentPlaceHolder1_lblPatientName"><?php echo $name; ?> </span>
                                        </h2>
                                      <ul class="nav user_menu pull-right">
                            
                         
                                <li class="dropdown settings">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <button type="button" class="btn btn-info btn-sm " >My Account<b class="caret"></b></button></a>
                                    <ul class="dropdown-menu">
								 
                                    <li><a href="#" data-toggle="modal" data-target="#profile">Change Profile image</a></li>                                
                                    <li><a href="#" data-toggle="modal" data-target="#changepassword">Change Password</a></li>                            
                                    <li><a href="logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                              
                            </ul>    
                            
                                      
                                    </figure>

                                </section>
                            </div>
                            <!--<div class="sidebar-widget mb-30">
                                 <h3 class="mt-30 mb-20">About us</h3>
                               
                            </div>-->   
                        </div> 
                      
                        <span id="error" style="">Please select Doctor</span>
 <span id="process" style="margin-left: 28%; color: #000;"></span>
                        <h3 class="text-blue text-center" style="margin-bottom:1%">Schedule an Appointment</h3>

                        <div class="col-xs-1 col-md-1" style="visibility:hidden" >
                            <form class="form-horizontal" role="form" method="post" id="user"> 
                                <label for="phone" style="color:#fff;">Specialist *</label>
                                <div class="field-widget">

                                    <select class="doctor" name="getdoctor" id="getdoctor">
                                        <option value="1">Select Specialist</option>
                                        <?php
                                        $qry = mysql_query("SELECT * FROM tbl_specialities ");
                                        $sql = mysql_query($qry);
                                        while ($fetch_specialist1 = mysql_fetch_array($qry)) {
                                            echo $fld_id1 = $fetch_specialist1['fld_id'];
                                            echo $fld_specialities1 = $fetch_specialist1['fld_specialities'];
                                            ?>
                                            <option value="<?php echo $fld_id1; ?>"><?php echo $fld_specialities1; ?></option>
<?php } ?>


                                    </select>
                                </div>
                        </div>

                        <div class="section-doctor-field col-md-3" style="">

                            <label for="phone" style="color:#fff;">Doctor List *</label>

                            <div class="field-widget">
                                <select id="myselect" name="select" >
                                    <option value="xxx">Choose Doctor</option>
                                    <?php
                                    $qry11 = mysql_query("SELECT * FROM `tbl_doctors` ");
                                    //$sql1 = mysql_query($qry1);
                                    while ($fetch_specialist11 = mysql_fetch_array($qry11)) {
                                        $fld_id11 = $fetch_specialist11['fld_id'];
                                        $fld_name = $fetch_specialist11['fld_name'];
                                        ?>
                                        <option value="<?php echo $fld_id11; ?>"><?php echo $fld_name; ?></option>
<?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="section-appointment-field  col-md-3" style="">
                            <label for="phone" style="color:#fff;">Appointment *</label>
                            <div class="field-widget">
                                <button class="btn btn-primary"id="submit" style="background-color: #A61F3D;
                                        color: #fff;width: 37%; margin-top: 3%;">Consult Now</button>					
                                                       <!-- <input type="button" id="btnconsultnow" name="btnconsultnow" value="Consult Now" style="background-color: #A61F3D;
                                        color: #fff;width: 40%;"/>-->

<!--<input type="button" id="btnschedulenow" name="btnschedulenow" value="Schedule Appointment" style="background-color: #A61F3D;color: #fff;    
width: 57%;"/>-->

                                <button class="btn btn-primary" id="schedule" style="background-color: #A61F3D;
                                        color: #fff;width: 60%; margin-top: 3%;">Schedule Appointment</button>
                                </form>
                            </div>

                         


                        </div>
                        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">     

                        <div class="col-md-9">
                            <ul class="nav nav-tabs" style="margin-top:3%">
                                <li class="active"><a href="#home"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;Upcoming Appointments</a></li>
                                <li><a href="#menu1"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; Past Appointments</a></li>
                                <li><a href="#menu2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit Profile</a></li>

                            </ul>

                            <div class="tab-content" style="border:2px solid #F5F5F5;height:auto" >
                                <div id="home" class="tab-pane fade in active">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Appoinment date </th>
                                                <th>Time</th>
                                                <th>Doctor</th>

                                                <th>Video Chat</th>
                                                <th>Reschedule</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataset = mysql_query("SELECT * FROM `tbl_patientlist` WHERE `consultant_date` >= '$current_date' and  user ='$uname' and payment_status='1'  order by consultant_date asc");
//echo "SELECT * FROM `tbl_patientlist` WHERE `consultant_date` >= '$current_date' and  user ='$uname' and payment_status='1'  order by consultant_date asc";
                                            while ($fetch_date1 = mysql_fetch_array($dataset)) {

                                                $patient_time1 = $fetch_date1['consultant_date'];
                                                  $patient_id = $fetch_date1['fld_id'];
                                                $datetime = $fetch_date1['fld_datetime'];
                                                $datetimes = $fetch_date1['fld_enddatetime'];
                                                $gettime = $fetch_date1['fld_datetime'] . " - " . $fetch_date1['fld_enddatetime'];
                                                $fld_name = $fetch_date1['fld_name'];
                                                
						$stop_date = date('Y-m-d H:i:s', strtotime(' +1 day'));						$vidourl = $fetch_date1['fld_video_url'];
                                                $fld_docname = $fetch_date1['fld_dcname'];
                                                $datefromdb = $patient_time1;
                                                $fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$fld_docname'"));
                                                $doctor_id_fetch_to_name = $fet['fld_name'];
                                                if ($current_date == $patient_time1) {

                                                    if ($datetimes > $current_times) {

                                                        ?>
                                                        <tr>
                                                            <td><p><?php echo date('d-m-Y', strtotime($patient_time1)); ?></p></td>
                                                            <td><p><?php echo $gettime; ?></p></td>
                                                            <td><p><?php echo $doctor_id_fetch_to_name; ?></p></td>
                                                            <?php if ($patient_time1 == $current_date && $current_times >= $datetime && $current_times <= $datetimes) { ?>
                                                            <td>
                                                                <form action="chat.php" method="post">
                                                                    <input type="hidden" name="dcno" value="<?php echo $fld_docname;?>" >
                                                                    <input type="hidden" name="patient_id" value="<?php echo $patient_id;?>" >
                                                                    <input type="hidden" name="consultantdate" value="<?php echo $patient_time1;?>" >
                                                                    <input type="hidden" name="gettime" value="<?php echo $gettime;?>" >
                                                                    <button class="btn btn-success">Click  to proceed &nbsp;&nbsp;
                                                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        <?php } else { ?> 
                                                                <td><button class="btn btn-danger"> Wait for appointment</button><?php } ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {

                                                    ?>  <tr>
                                                        <td><p><?php echo date('d-m-Y', strtotime($patient_time1)); ?></p></td>
                                                        <td><p><?php echo $gettime; ?></p></td>
                                                        <td><p><?php echo $doctor_id_fetch_to_name; ?></p></td>
        <?php if ($patient_time1 == $current_date && $current_times > $datetime && $current_times <= $datetimes) { ?>
 <td>
                                                                <form action="chat.php" method="post">
                                                                    <input type="hidden" name="dcno" value="<?php echo $fld_docname;?>" >
                                                                    <input type="hidden" name="patient_id" value="<?php echo $patient_id;?>" >
                                                                    <input type="hidden" name="consultantdate" value="<?php echo $patient_time1;?>" >
                                                                    <input type="hidden" name="gettime" value="<?php echo $gettime;?>" >
                                                                    <button class="btn btn-success">Click  to proceed &nbsp;&nbsp;
                                                                        <i class="fa fa-video-camera" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </td>                                                    <?php } else { ?> 
                                                            <td><button class="btn btn-danger"> Wait for appointment</button><?php } ?></td>
                                                              
                                                       <?php  if($patient_time1 > $stop_date) { ?>     <td><button class="btn btn-danger "  onclick="cancel(<?php echo $fld_docname ?>,<?php echo $patient_id?>)"id="cancel"> Reschedule</button></td><?php } ?>
                                                    </tr><?php
                                        }
                                    }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="menu1" class="tab-pane fade">

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Appointment date </th>
                                                <th>Time</th>
                                                <th>Doctor</th>

 <th>Prescription</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $dataset = mysql_query("SELECT * FROM `tbl_patientlist` WHERE  user ='$uname' order by fld_id desc");
//echo "SELECT * FROM `tbl_patientlist` WHERE `consultant_date` <= CURDATE() and user ='$uname'";
                                            while ($fetch_date1 = mysql_fetch_array($dataset)) {
                                                $patient_time1 = $fetch_date1['consultant_date'];
                                                $ids=$fetch_date1['fld_id'];
                                                $datetime = $fetch_date1['fld_datetime'];
                                                $datetimes = $fetch_date1['fld_enddatetime'];
                                                $gettime = $fetch_date1['fld_datetime'] . " - " . $fetch_date1['fld_enddatetime'];
                                                $fld_name = $fetch_date1['fld_name'];
                                                $fld_dc_id = $fetch_date1['fld_dcname'];
                                                $datefromdb = $patient_time1;
                                                $fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$fld_dc_id'"));
                                                $doctor_name = $fet['fld_name'];
                                                if ($current_date == $patient_time1) {
                                                    if ($datetimes < $current_times) {
                                                        ?>

                                                        <tr>
                                                            <td><p><?php echo date('d-m-Y', strtotime($patient_time1)); ?></p></td>
                                                            <td><p><?php echo $gettime; ?></p></td>
                                                            <td><p><?php echo $doctor_name; ?></p></td>
 <td><p><button type="button"  class="btn btn-success" onclick="window.location.href='prescription.php?id=<?php  echo $ids; ?>' ">view Prescription</button></p></td>


                                                        </tr>
        <?php }
    }  else if($current_date > $patient_time1) { ?>
                                                    <tr>
                                                        <td><p><?php echo date('d-m-Y', strtotime($patient_time1)); ?></p></td>
                                                        <td><p><?php echo $gettime; ?></p></td>
                                                        <td><p><?php echo $doctor_name; ?></p></td>
 <td><p><button type="button"  class="btn btn-success" onclick="window.location.href='prescription.php?id=<?php  echo $ids; ?>' ">view Prescription</button></p></td>


                                                    </tr>
    <?php }
}
?>

                                        </tbody>
                                    </table>

                                </div>
                                <div id="menu2" class="tab-pane fade refreshtab" >
                                    <form name="form" method="post" id="form" >
                                        <span class="error_login" style="color:#ff0000;margin-left: 30%;"></span>
                                        <span class="updatee" style="color:#5cb85c;margin-left: 30%;"></span>
                                        <div class="row" style="margin-top:4%;">

                                            <div class="col-sm-6" >
                                                <div class="form-group">

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
                                                    <input type="hidden" value="<?php echo $fld_id; ?>" name="fld_id">
                                                    <input name="fld_name" type="text" value="<?php echo $fld_name; ?>" id="pname"  class="form-control" placeholder="Name*"  />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email*</label>
                                                    <input name="fld_email" type="text" value="<?php echo $fld_email; ?>" id="pemail"  class="form-control" placeholder="E-MAIL* " />
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile*</label>
                                                    <input name="fld_phone" type="text" value="<?php echo $fld_phone; ?>" id="pmobile"  class="form-control" placeholder="Mobile Number*" onKeyPress="return isNumberKey(event)"  />
                                                </div>

                                                <div class="form-group">
                                                    <label>Choose gender*</label>
                                                    <select style="background-color:#FFFFFF" name="fld_gender" id="gender">
                                                        <option value=''>Select Gender</option>

                                                        <option value='Male' <?php if ($fld_gender == "Male") { ?> selected<?php } ?>>Male</option>  
                                                        <option value='Female' <?php if ($fld_gender == "Female") { ?> selected<?php } ?>>Female</option>


                                                    </select>


                                                </div>


                                                <div class="form-group">
                                                    <label>ZipCode*</label>
                                                    <input name="fld_pincode" type="text" value="<?php echo $fld_pincode; ?>"  id="pzip"  class="form-control zip"/>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Country*</label>

                                                    <input name="fld_country" type="text" value="<?php echo $fld_country; ?>" id="pcountry"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>State*</label>

                                                    <input name="fld_state" type="text" value="<?php echo $fld_state; ?>"  id="pstate"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>City*</label>     
                                                    <input name="fld_city" type="text" value="<?php echo $fld_city; ?>"  id="pcity"  class="form-control"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address*</label>
                                                    <input name="fld_address" type="text" value="<?php echo $fld_address; ?>"  id="paddress" class="form-control"/>
                                                </div>    


                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="fld_emails" value="<?php echo $fld_email; ?>">
                                                <input id="paddress" class="btn btn-danger Proceed_button" type="button" value="Save Profile" name="address" style="width:25%;float:right">
                                            </div>   
                                        </div>
                                    </form>
                                </div>

                              
                            </div>
                            <style>

                                #menu2 {
                                    animation: shake 0.30s cubic-bezier(.36,.07,.19,.97) both;
                                    transform: translate3d(0, 0, 0);
                                    backface-visibility: hidden;
                                    perspective: 1000px;
                                }

                                @keyframes shake {
                                    10%, 90% {
                                        transform: translate3d(-5px, 0, 0);
                                    }

                                    20%, 80% {
                                        transform: translate3d(5px, 0, 0);
                                    }

                                    30%, 50%, 70% {
                                        transform: translate3d(-10px, 0, 0);
                                    }

                                    40%, 60% {
                                        transform: translate3d(10px, 0, 0);
                                    }
                                }
                                .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th { line-height:10px; }
                                table p {
                                    color: #626262;
                                    font-size: 13px;
                                    font-weight: normal;
                                    line-height: 45px;
                                }
                                .table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
                                    font-size: 14px;
                                    font-weight: 600;
                                    padding: 5px;
                                }
                            </style>   
                        </div>		 
                       

                    </div>
                </div>
            </section>

    <footer class="footer-widget">

   <div class="container"> 

    <div class="row">
<div class="col-lg-12 col-md-12 text-center">

        <p class="text-white mt-15 mb-20"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> Dr.THAJ</a> All Rights Reserved </p>

      </div>

      <div class="col-lg-12 col-md-12  text-center">


            <a href="privacy_policy.php" style="color: #fff;  font-size: 12px;" >Privacy Policy</a>|
            
             <a href="terms_conditions.php"style="    color: #fff;  font-size: 12px;">Terms and Conditions</a>
      </div>

      <div class="col-lg-12 col-md-12">

        <div class="footer-widget-social">

            

       
        

       </div>

      </div>

    </div>    

   </div>

 

</footer>
            <span id="dataresponse"> </span>
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
         <script src="js/jquery.appear.js"></script>
        <!-- custom -->
        <script type="text/javascript" src="js/custom.js"></script>
        <!-- portfolio -->
<script type="text/javascript" src="js/portfolio/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- hover -->
<script type="text/javascript" src="js/portfolio/jquery.directional-hover.js"></script>

  <script type="text/javascript" src="js/doctorlist.js"></script>

    <script>
    $('#pname').keypress(function(e) {
        
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

    </body>
</html>
