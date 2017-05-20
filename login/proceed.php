<?php
session_start();

@include("../config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

@include("user_sessioncheck.php");

$uname = $_SESSION['user'];

if((!isset($_SESSION['times']))&&(!isset($_SESSION['timeslot']))&&(!isset($_SESSION['doctor_id']))){
    echo "<script>
        window.location.href='doctorslist.php'
        </script>";
}

unset($_SESSION['doctor']);

unset($_SESSION['time']);

unset($_SESSION['date']);

unset($_SESSION['type']);



$get_username = mysql_fetch_array(mysql_query("select * from tbl_register where email='$uname'"));

$name = $get_username['name'];
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





                        <h3 class="text-blue text-center" style="margin-bottom:1%;margin-top:30px">Schedule an Appointment</h3>









                        <div class="col-lg-9 col-md-9 col-sm-9 page-content">

                            <p>

                            <div class="doctor-list" id="show-list">			

                                <div class="row">

                                    <img src="ajax-loader.gif" id="ajax-loader" style="margin-left:50%; display:none;">

<?php
$timeslott = trim($_SESSION['timeslot']);

$todaydate = $_SESSION['times'];

$doctor_id = $_SESSION['doctor_id'];







$sql = "SELECT distinct doc.fld_id,doc.fld_name,doc.fld_gender,doc.fld_speciality,doc.fld_languages,doc.fld_image,doc.fld_experience

		 FROM `tbl_doctors` doc where doc.fld_id='$doctor_id'";

/*

  $sql = "SELECT distinct doc.fld_id,doc.fld_name,doc.fld_gender,doc.fld_speciality,doc.fld_languages,doc.fld_image,doc.fld_experience

  FROM `tbl_doctors` doc Join tbl_patientlist patients on patients.fld_dcname != doc.fld_id where patients.fld_datetime!= '$timeslott' and patients.consultant_date !='$todaydate'"; */

$qury = mysql_query($sql);

while ($rows = mysql_fetch_array($qury)) {

    $doctor_id = $rows['fld_id'];

    $name = $rows['fld_name'];

    $genders = $rows['fld_gender'];

    $speciality = $rows['fld_speciality'];

    $languages = $rows['fld_languages'];


    $image = $rows['fld_image'];

    $path = "../admin/doctors_images/";

    $images = $path . $image;

    $experience = $rows['fld_experience'];

    $getspeciality = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_specialities` where fld_id = '" . $speciality . "'"));

$getgender = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_gender` where fld_id = '" . $genders . "'"));
$gender=$getgender['fld_gender'];

  
    ?>





                                        <div class="col-lg-9 col-md-9">

                                            <div class="clients-box mb-30 clearfix">

                                                <div class="clients-photo">

    <?php if ($image == '') { ?>

                                                        <img src="doctor.png" alt="" style="width:100%;">

    <?php } else { ?>

                                                        <img src="<?php echo $images; ?>" alt="">

    <?php } ?>

                                                </div>

                                                <div class="clients-info">

                                                    <!--<h4 style="width:50%">Lorem ipsum dolor sit amet</h4>-->

                                                   

                                                    <ul>
<li>Doctor Name : <?php echo $name; ?> </li>
                                                        <li>Gender : <?php echo $gender; ?> </li>

                                                        <li>Speciality : <?php echo $getspeciality['fld_specialities']; ?></li>

                                                        <li>Languages Spoken : 
    <?php
    $languages = trim($languages);

    $languagesaray = explode(",", $languages);
    $count = count($languagesaray);
    $lan = "";
    for ($i = 0; $i < $count; $i++) {
        $languagesval = $languagesaray[$i];

        $langua = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_languages` where `fld_id` = '$languagesval'"));

        $lan.= $langua['fld_languages'];
        $lan.=",";
        ?>


                                                            <?php
                                                            }
                                                            $lan = substr($lan, 0, -1);
                                                            echo $lan;
                                                            ?></li>


 <li>Experience : <?php echo $experience; ?> Years</li>
  <li>Appointment Date : <?php echo $todaydate; ?></li>
                                                        <li>Appointment time : <?php echo $timeslott; ?></li>

                                                    </ul>

                                                </div>



                                            </div>

                                        </div>

                                        <div class="col-md-3">

                                            <p class="btn btn-info">

                                                <span class="heading14">Consultation Fee</span><?php $doctor = mysql_fetch_array(mysql_query("select * from  tbl_doctors where `fld_id`='$doctor_id'")); ?>

                                                <span id="" class="btn btn-danger"><?php 
 if($_SESSION['time_fee']==1){ echo $doctor['fld_doctor_fees']; } elseif($_SESSION['time_fee']==2){
echo $doctor['fld_doctor_fees1'];
}?></span>

                                            </p>

                                            <div style="margin-top:13%">

                                                <h5>Make an Appointment</h5>

                                                <form action="validate.php" method="post">

                                                    <input type="hidden" name="doctor" value="<?php echo $rows['fld_id']; ?>">

                                                    <input type="hidden" name="timeslot" value="<?php echo $timeslott; ?>">

                                                    <input type="hidden" name="date" value="<?php echo $todaydate; ?>">

                                                    <input type="hidden" name="type" value="video">

                                                    <button type="submit"  class="btn btn-primary"   type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Video Consultation">

                                                        <i class="fa fa-video-camera"></i></button>

                                                </form>

                                                </a><?php /* <a class="btn btn-primary" href="validate.php?doctor=<?php echo $doctor_id; ?>&timeslot=<?php echo $_REQUEST['timeslot']; ?>&type=voice"  type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Voice Consultation">

                                                          <i class="fa fa-volume-control-phone"></i>

                                                          </a>

                                                          <a class="btn btn-primary" href="validate.php?doctor=<?php echo $doctor_id; ?>&timeslot=<?php echo $_REQUEST['timeslot']; ?>&type=email" type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Email Consultation">

                                                          <i class="fa fa-envelope"></i>

                                                          </a> */ ?>

                                            </div></div>

                                                <?php
                                            }
                                            ?>



                                    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

                                </div>  



                            </div>

                            </p>



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


            <a href="privacy_policy.php" style=" color: #fff;  font-size: 12px;" >Privacy Policy</a>|
             <a href="terms_conditions.php"style="    color: #fff; font-size: 12px;">Terms and Conditions</a>
      </div>

      <div class="col-lg-12 col-md-12">

        <div class="footer-widget-social">

            

       
        

       </div>

      </div>

    </div>    

   </div>

 

</footer>


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



        <!-- custom -->

        <script type="text/javascript" src="js/custom.js"></script>



    </body>

</html>

