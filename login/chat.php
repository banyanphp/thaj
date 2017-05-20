<?php


@include("../config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

@include("user_sessioncheck.php");

$uname = $_SESSION['user'];
$name = $_SESSION['name'];

date_default_timezone_set('Asia/Kolkata');

if (empty($_POST['dcno'] && $_POST['patient_id'] && $_POST['consultantdate'] && $_POST['gettime'])) {

    echo'<script>window.location="doctorslist.php";</script>';
}

//Get Only Current Time 00:00 AM / PMconsultant_date
//$current = date("H:i");

$current = date("H:i", strtotime('+30 minutes'));

/*

  $gettimeslot = mysql_fetch_array(mysql_query("select * from tbl_timeslot where fld_from > '$current'  and fld_delstatus ='0' Limit 3"));

  echo $gettime = $gettimeslot['fld_from']." - ".$gettimeslot['fld_to'];

 */





//$gettime = mysql_fetch_array($gettimeslot1);
//echo $gettimeslotts = $gettime['fld_timeslot'];



/*

  $get_username = mysql_fetch_array(mysql_query("select * from tbl_register where email='$uname'"));

  $name = $get_username['name'];

 */
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

        <title>Chat Room | Dr.Thaj</title>
        <style>
          .right-aligned{
                display:none !important;
            }
           
        </style>


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

            .form-control {

                background-color: transparent;

                border: 1px solid #2f2f2f;

                border-radius: 0;

                box-shadow: none;

                color: #000;

            }

            select {

                background: #eceff8 none repeat scroll 0 0;

                border: 1px solid #000;

                box-shadow: none;

                color: #626262;

                font-size: 14px;

                height: 34px;

                padding-left: 10px;

                transition: all 0.5s ease-in-out 0s;

                width: 100%;

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



   <header id="header" class="header">

                <div class="menu">  
                    <!-- menu start -->
                    <nav id="menu-1" class="mega-menu">
                        <!-- menu list items container -->
                        <section class="menu-list-items">
                            <div class="container"> 
                                <div class="row"> 
                                    <div class="col-lg-12 col-md-12"> 
                                        <!-- menu logo -->
                                        <ul class="menu-logo">
                                            <li>
                                                <a href="doctorslist.php"><img src="logo.png" alt="logo"> </a>
                                            </li>
                                        </ul>
                                        <!-- menu links -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                            <ul class="nav navbar-nav navbar-right" style="margin-top: 2%;">           
                                                <li><a href="javascript:void(0);" class="page-scroll linnkk" style="color: #fff;padding: 7px 8px 7px 7px;">Welcome <?php echo strtoupper($name); ?></a></li>
                                            <!--// <li><a href="logout.php" class="page-scroll linnkk" style="background-color: #00a9da;color: #fff;padding: 7px 8px 7px 7px;">Logout</a></li>-->
                                            
                             
                                            </ul>
                                        </div>
                                    </div>		  

                                </div>
                            </div>
                        </section>
                    </nav>  
                </div>
            </header>



            <!--=================================
            
             header -->





            <!--=================================
            
             page-sidebar-->



            <section class="page-sidebar page-section-ptb">

                <div class="container" style="background-color:#F5F5F5">

                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-3" style="background-color:#F5F5F5;padding:20px;">

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



                        </div> 


   <div class="modal fade" id="profile" role="dialog">
                            <div class="modal-dialog" >

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Profile Image</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12">
                                            <form class="form-horizontal" role="form" action="login_check.php?action=profile_image" method="POST" enctype="multipart/form-data">






                                                <div class="form-group">
                                                    <label for="file-upload" class="custom-file-upload">Choose Image

                                                    </label>


                                                    <input type="file" id="file" name="images"  onchange="return validate_upload()" >



                                                </div>


                                                <div class="form-group">


                                                    <button class="btn btn-info btn-lg" type="submit">Submit</button>
                                                </div>   
                                            </form>
                                        </div><!-- end col -->
                                    </div>

                                    <div class="modal-footer" style="border-top:none;border-bottom:1px solid #CACACA">

                                    </div>
                                </div>



                            </div>
                        </div>
                        
                        
                             <div class="modal fade" id="changepassword" role="dialog">
                            <div class="modal-dialog" >

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Change Password</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12">
                                            <form class="form-horizontal" role="form" id="change-password" method="POST" enctype="multipart/form-data">
 <span class="password_errors"style="color: #ff0000;"></span>
                                                <span class="password_error"style="color: #ff0000;margin-left: 30%;"></span>
                                             
                                                <span class="loading"></span>
                                                <div class="form-group">
                                                    <label for="current-password" >Current Password

                                                    </label>


                                                    <input type="password" id="cpassword" name="cpassword">



                                                </div>
                                                    <div class="form-group">
                                                    <label for="current-password" >Change Password

                                                    </label>


                                                    <input type="password" id="password" name="password">



                                                </div>

                                                <div class="form-group">


                                                    <button class="btn btn-info btn-lg passwordbutton" type="submit">Submit</button>
                                                </div>   
                                            </form>
                                        </div><!-- end col -->
                                    </div>

                                    <div class="modal-footer" style="border-top:none;border-bottom:1px solid #CACACA">

                                    </div>
                                </div>



                            </div>
                        </div>


                        <h3 class="text-blue text-center" style="margin-bottom:1%">Video Chat With Consultant</h3>
<h3 class=" text-center">Consultation will end on</h3>
<h1 class=" text-center"><span id="divCounter" ></span></h1>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("contextmenu", function(e) {
            return false;
        });
        $("#id").on("contextmenu", function(e) {
            return false;
        });
        document.onkeydown = function(e) {
            if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 17 || e.keyCode === 73 || e.keyCode === 117)) {
                return false;
            } else {
                return true;
            }
        };
    });
    var iframeEl = $('#test').contents().get(0);

// Bind event to iframe
$(iframeEl).bind('contextmenu', function(event) {
    return false;
});
</script>   
<?php
$dcno = $_REQUEST['dcno'];

$patient_id = $_REQUEST['patient_id'];

$consultantdate = $_REQUEST['consultantdate'];

$gettime = $_REQUEST['gettime'];
$gettime = trim($gettime);

$getfirsttime = explode("-", $gettime);

$getstarttime = trim($getfirsttime[0]);

$getendtime = trim($getfirsttime[1]);
$fetch=mysql_query("select * from tbl_patientlist where fld_dcname='$dcno' and fld_id='$patient_id' and consultant_date='$consultantdate' and fld_datetime='$getstarttime' and fld_enddatetime='$getendtime' and payment_status='1'");
$counts = mysql_num_rows($fetch);
$fetch_data=  mysql_fetch_array($fetch);
$geturl=$fetch_data['fld_video_url'];
$ids=$fetch_data['fld_id'];
$count = mysql_num_rows(mysql_query("select * from tbl_videochat where `appointment_id`='$ids'"));
//echo "select * from tbl_videochat where `fld_id`='$ids'";

//echo "select * from tbl_patientlist where fld_dcname='$dcno' and fld_id='$patient_id' and consultant_date='$consultantdate' and fld_datetime='$getstarttime' and fld_enddatetime='$getendtime'";

if ($count == 0 && $counts==1) {
    ?>
                            <div class="col-md-9">
<script>var winGoogle = window.open('<?php echo $geturl; ?>');
</script>
                                <iframe src="<?php echo $geturl; ?>" id="test" target="_blank" frameborder="0" width="800" height="400"></iframe>

                            </div>
                            <?php
                        //$insert=mysql_query("INSERT INTO `tbl_videochat` (`doctor_id`, `patientlist_id`,`consultantdate`,`gettime`,`video_url`, `status`) VALUES ('$dcno', '$patient_id','$consultantdate','$gettime','$geturl','1')");
                        }
                        

else {
    ?>                     <script>alert('Already Used');
        window.location.href='doctorslist.php';</script>
        
     <?php
}
       ?>                 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">     			
       <input type="hidden" value="<?php echo $ids; ?>" id="bookid">


                        <style>
cbc8e8b886156f734a0dfd11e4316cbc




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





                        <script>

                            $(document).ready(function () {

                                $(".nav-tabs a").click(function () {

                                    $(this).tab('show');

                                });

                            });

                        </script>          

                        <div class="col-lg-9 col-md-9 col-sm-9 page-content" style="display:none;">





                            <p>

                            <div class="doctor-list" id="show-list">



                                <div class="row">

                    

                                </div>  



                            </div>

                            </p>



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

                                        <ul id="timeSlot" class="time-slot" style="margin-left: -16%;margin-top: 3%;width: 120%;">

<?php
$gettimeslot = mysql_query("select * from tbl_timeslot where fld_from > '$current'  and fld_delstatus ='0' Limit 3");

while ($row = mysql_fetch_array($gettimeslot)) {

    $gettime = $row['fld_from'] . " - " . $row['fld_to'];
    ?>

                                                <li><a href="proceed.php?timeslot=<?php echo $gettime; ?>"><?php echo $gettime; ?></a></li>

    <?php
}
?>			 

                                        </ul>



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


  <script type="text/javascript" src="js/doctorlist.js"></script>
   <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
                  <script type="text/javascript" src="js/jquery.countdownTimer.js"></script>


 <script>
                                $(function(){
                                    $('#ms_timer').countdowntimer({
                                        minutes :10,
                                        seconds : 00,
                                        size : "lg"
                                    });
                                });
                            </script>
                              <script>
//var hoursleft = 0;
  var bookid = $("#bookid").val();
  
var minutesleft = 10; //give minutes you wish
var secondsleft = 00; // give seconds you wish
var finishedtext = "";
var end1;
if(localStorage.getItem("end1")) {
end1 = new Date(localStorage.getItem("end1"));
} else {
end1 = new Date();
end1.setMinutes(end1.getMinutes()+minutesleft);
end1.setSeconds(end1.getSeconds()+secondsleft);

}
var counter = function () {
var now = new Date();
var diff = end1 - now;

diff = new Date(diff);

var milliseconds = parseInt((diff%1000)/100)
    var sec = parseInt((diff/1000)%60)
    var mins = parseInt((diff/(1000*60))%60)
    //var hours = parseInt((diff/(1000*60*60))%24);

if (mins < 10) {
    mins = "0" + mins;
}
if (sec < 10) { 
    sec = "0" + sec;
} 
if(mins==2&&sec==0){
    alert("only two minutes exceed");
}
if(now >= end1) {     
    clearTimeout(interval);
   // localStorage.setItem("end", null);
     localStorage.removeItem("end1");
     localStorage.clear();
    document.getElementById('divCounter').innerHTML = finishedtext;
    alert("Time Up");
 winGoogle.close();
     window.location.href= "videochat.php?id="+ bookid;
} else {
    var value = mins + ":" + sec;
    localStorage.setItem("end1", end1);
    document.getElementById('divCounter').innerHTML = value;
}
}
var interval = setInterval(counter, 1000);
</script>
    </body>

</html>

