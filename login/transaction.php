<?php
session_start();

@include("../config.php");
@include('common.php');
@include('mail_functionlity.php');

error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['user'];
$name = $_SESSION['name'];
date_default_timezone_set('Asia/Kolkata');

if ((!empty($_SESSION['msg']) && (!empty($_SESSION['url'])))) {


    $url = $_SESSION['url'];
$msg=$_SESSION['msg'];
    $run_query = mysql_query("select * from tbl_patientlist where `fld_video_url`='$url' and `payment_status`='1'");
  

    $fetch_data = mysql_fetch_array($run_query);
    $name = $fetch_data['fld_name'];
    $gender= $fetch_data['fld_gender'];
if($gender=="Male"){
$names="Mr.";
$names.=$name;

}
else
{
$names="Ms.";
$names.=$name;
}
    $doctorname = $fetch_data['fld_dcname'];
    $time = $fetch_data['fld_datetime'];
    $time.="-";
    $time.=$fetch_data['fld_enddatetime'];
    $time.= "IST";
    $consultantdate = $fetch_data['consultant_date'];
	$details= $fetch_data['details'];
	$email= $fetch_data['fld_email'];
$phone= $fetch_data['fld_phone'];

    $info = mysql_fetch_array(mysql_query("select * from tbl_doctors where fld_id='$doctorname'"));

    $doctor_id = $info['fld_id'];

    $doctor_name = $info['fld_name'];

    $doctor_photo = $info['fld_image'];

    $doctor_speciality = $info['fld_speciality'];


    $fld_doctor_fees = $fetch_data['fl_amount'];
$doctor_mail= $info['email_id'];
  
    $message = '<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody><tr>
            <td align="center" valign="top" style="padding:20px">
                <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="750">

                    <tbody><tr>
                            <td align="center" valign="top"><a href="#" target="_blank"> <img src="http://www.drthajskin-haironlineexpert.in/logo.png" alt="thaj" style="margin-bottom:10px" border="0" class="CToWUd"></a></td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <h1 style="font-size:20px;font-weight:700;line-height:20px;margin:0 0 16px 0">Dear &nbsp;' . $name . ',' . '</h1>
                                <p style="line-height:22px;margin:0;font-size:16px">
                                   You have Successfully made payment for your appointment.we here by confirm your appointment with our doctor.Please verify the information provided this mail.
                                    If you have any questions about your order please call us at 0422-6577789



                                </p>
                                </td></tr>
                        <tr>
                       
                            <td>
                                <table cellspacing="0" cellpadding="0" border="0" width="750">
                                    <thead>
                                        <tr>
                                            <th align="left" width="325" style="font-size:18px;padding:10px 0;font-weight:700;line-height:1em">Appointment Details:</th>
                                           
                                        </tr>
                                    </thead>
             <tbody>
                                        <tr>
                                            <td valign="top" style="padding:7px 0">
                                               
                                   Name:<br/><br/>
                                    Appointment Date:<br/><br/>
                                     Appointment Time:<br/><br/>
                                   
                                   Doctor Name :<br/><br/>
                                   Consultation Fees:<br/><br/>
                                    
                                  
                              
                                  
                                          <td valign="top" style="padding:7px 0">
                                            
                                  
                                     ' . $name . '<br/><br/>
                                      ' . $consultantdate . '<br/><br/>
                                          ' . $time . '<br/><br/>
                                          ' . $doctor_name . '<br/><br/>
                                         ' . $fld_doctor_fees . '<br/><br/>
                                   
                                

                                              
                                            </td>
                                        </tr>
                                    </tbody>
            </table>
            <br>



<p style="margin:0 0 10px 0"></p>
</td>
</tr>
<tr>
    <td align="right" style="text-align:right"><p style="margin:0">Thank you, <strong>Dr Thaj</strong></p></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>';
 $messages = '<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <tbody><tr>
            <td align="center" valign="top" style="padding:20px">
                <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="750">

                    <tbody><tr>
                            <td align="center" valign="top"><a href="#" target="_blank"> <img src="http://www.drthajskin-haironlineexpert.in/logo.png" alt="thaj" style="margin-bottom:10px" border="0" class="CToWUd"></a></td>
                        </tr>

                        <tr>
                            <td valign="top">
                                <h1 style="font-size:20px;font-weight:700;line-height:20px;margin:0 0 16px 0">Hi &nbsp;' . $doctor_name. ',' . '</h1>
                                <p style="line-height:22px;margin:0;font-size:16px">We here by confirm your appointment with '.$names.'</p>
                                </td></tr>
                        <tr>
                       
                            <td>
                                <table cellspacing="0" cellpadding="0" border="0" width="750">
                                    <thead>
                                        <tr>
                                            <th align="left" width="325" style="font-size:18px;padding:10px 0;font-weight:700;line-height:1em">Patient Details:</th>
                                           
                                        </tr>
                                    </thead>
             <tbody>
                                        <tr>
                                            <td valign="top" style="padding:7px 0">
                                               
                                   Name:<br/><br/>
                                    Appointment Date:<br/><br/>
                                     Appointment Time:<br/><br/>
                                   
                                  Problem Description:<br/><br/>
                                    
                                  
                              
                                  
                                          <td valign="top" style="padding:7px 0">
                                            
                                  
                                     ' . $name . '<br/><br/>
                                      ' . $consultantdate . '<br/><br/>
                                          ' . $time . '<br/><br/>
                                          ' . $details. '<br/><br/>
                                        
                                   
                                

                                              
                                            </td>
                                        </tr>
                                    </tbody>
            </table>
            <br>



<p style="margin:0 0 10px 0"></p>
</td>
</tr>
<tr>
    <td align="right" style="text-align:right"><p style="margin:0">Thank you, <strong>Dr Thaj</strong></p></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>';
    $subject = "Appointment";
  
    $to = $email;
   

if($_SESSION['msg']=='y'){
$mail=writeMsg($doctor_mail,$doctor_name,$subject,$messages);
$mail=writeMsg($to,$name,$subject,$message);

$fet = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` where fld_id='$doctorname'"));
$to = $fet['mobile_no'];
$app="New Appointment";
$app.=" ";
$app.="Name:";
$app.=$fetch_data['fld_name'];
$app.=" ";
$app.="Date:";
$app.=$consultantdate;
$app.=" ";
$app.="Time:";

$app.=$time;
		
	$message1 = urlencode($app);
file_get_contents('http://hpsms.dial4sms.com/api/web2sms.php?username=mmvcbe&password=happy1234&to='.$to.'&sender=DrThaj&message='.$message1.'');



         
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$apps="Appointment Created Successfully";
$apps.=" ";
$apps.="Doctor Name:";
$apps.=$doctor_name;
$apps.=" ";
$apps.="Date:";
$apps.=$consultantdate;
$apps.=" ";
$apps.="Time:";

$apps.=$time;
	 $message2 = urlencode($apps);
file_get_contents('http://hpsms.dial4sms.com/api/web2sms.php?username=mmvcbe&password=happy1234&to='.$phone.'&sender=DrThaj&message='.$message2.'');

         
   }


?>
 <!DOCTYPE html>

    <html lang="en" class="no-js">

        <head>

            <meta charset="UTF-8" />

            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

            <title>Transaction</title>

            <meta name="author" content="Reverie Tech" />

            <link rel="stylesheet" type="text/css" href="css/demo.css" />

            <link rel="stylesheet" type="text/css" href="tabs.css" />'

            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        </head>

        <style>

            .ul {

                list-style-type: none;

                margin: 0;

                padding: 0;

                overflow: hidden;



            }



            .ul li {

                float: left;

            }



            .ul li a {

                display: block;

                color: white;

                text-align: center;

                padding: 14px 16px;

                text-decoration: none;



            }



            .ul li a:hover {

                /*  background-color: #00A9DA; */

            }

        </style>

        <body style="background-image:url(../images/slider/slider-02.jpg)">





            <div class="container-fluid">

                <header style="background-color:#A61F3D;height:122px">

                    <img src="logo.png" style="width:20%;float:left">

                    <ul class="ul" style="width:8%;float:right">

    <?php /*   <li><a class="active" href="#home">Home</a></li>

      <li><a href="#news">How it works?</a></li>

      <li><a href="#contact">Top Specialities</a></li>

      <li><a href="#about">Specialist Doctors</a></li> <?php */ ?>

                        <li><a href="index.php"><img src="home.png" style="width: 49%;"></a></li>

                    </ul> 

                </header>



                <section class="tabred" style="margin-top:5%;color:#fff">

                    <ul class="tabs red">



                        <li>

                            <input type="radio" name="tabs red" id="tab6" checked />





                            <div id="tab-content6" class="tab-content">







                                <form method="post" name="register" action="#" id="form">


    <?php
  
    if ($msg == 'y') {


        ?> <h4 >Amount Transferred Successfully</h4>   <?php
    } else if ($msg == 'n') {
        ?> <h4 >Process stopped Please try again Later.</h4>   <?php
                                    }
                                    ?>







                                </form>

                                <form>     

                                    <input type="button" class="btn btn-primary" value="Go Back" onclick="window.location.href = 'doctorslist.php'" style="font-weight:600;background-color:#FFFAFA;color:#FF0000">

                                </form>



                            </div>



                        </li>











                    </ul>

                </section>



                <script type="text/javascript" src="js/jquery-1.10.2.js"></script>



            </div>







        </body>





    </html>

<?php
}
else{

   echo "<script>
    window.location.href='doctorslist.php'
    </script>" ;


}
 unset($_SESSION['msg']); 
     unset($_SESSION['url']); 
   
    ?>

   