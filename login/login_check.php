<?php
@include("../config.php");
@include('common.php');
@include('mail_functionlity.php');


session_start();
$uname = $_SESSION['user'];
$action = $_REQUEST['action'];
$view = $action;
$redirect_page = 0;
switch ($action) {

    case 'register':

        $name = mysql_real_escape_string($_REQUEST['name']);
        $email = mysql_real_escape_string($_REQUEST['email']);
        $password = mysql_real_escape_string($_REQUEST['password']);
        if (!empty($password)) {
            $md5 = md5($password);
        } else {
            $md5 = "";
        }

        $mobile = mysql_real_escape_string($_REQUEST['mobile']);
        $activation = md5($email . time());

        $user_check = mysql_num_rows(mysql_query("select * from tbl_register where email='$email'"));
        if ($user_check == 0) {

            mysql_query("INSERT INTO `tbl_register`(`name`, `email`, `password`, `mobile`,`activation_code`,`fld_status`) VALUES ('$name','$email','$md5','$mobile','$activation','0')") or die(mysql_error());
  
            $to = $email;
            $username = $to;
            $link = "http://drthajskin-haironlineexpert.in/login/activation_verification.php?username=$username&activation=$activation";
            $subject = 'Register Notification | Dr.Thaj';

      $message='<table width="100%" cellpadding="0" cellspacing="0" border="0" id="m_4275388581297042370background-table" style="border-collapse:collapse;padding:0;margin:0 auto;background-color:#ebebeb;font-size:12px">
  <tbody>
    <tr>
      <td valign="top" align="center" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0;width:100%">
	  <table cellpadding="0" cellspacing="0" border="0" align="center" style="border-collapse:collapse;padding:0;margin:0 auto;width:600px">
          <tbody>
            <tr>
              <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0">
			  <table cellpadding="0" cellspacing="0" border="0"  style="border-collapse:collapse;padding:0;margin:0;width:100%">
                  <tbody>
                    <tr>
                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:15px 0px 10px 5px;margin:0"><a href="http://drthajskin-haironlineexpert.in/" style="color:#3696c2;float:left;display:block" target="_blank"> <img width="200" height="100" src="http://drthajskin-haironlineexpert.in/login/logo.png" alt="drthaj" border="0" style="outline:none;text-decoration:none" ></a></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td valign="top" style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:5px;margin:0;border:1px solid #ebebeb;background:#fff"><table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0;width:100%">
                  <tbody>
                    <tr>
                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:0;margin:0"><table cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;padding:0;margin:0">
                          <tbody>
                            <tr>
                              <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:top;padding:10px 20px 15px;margin:0;line-height:18px"><h1 style="font-family:Verdana,Arial;font-weight:bold;font-size:25px;margin-bottom:25px;margin-top:5px;line-height:28px">  Dear  ' . $name . ',</h1>
                                <p style="font-family:Verdana,Arial;font-weight:normal">Your email <a href="mailto:'.$email.'" target="_blank">'.$email.'</a> must be confirmed before using it to log in to our store.</p>
                                <p  style="font-family:Verdana,Arial;font-weight:normal;border:1px solid #c3ced4;padding:13px 18px;background:#f1f1f1"> Use the following values when prompted to log in:<br>
                                  <strong style="font-family:Verdana,Arial;font-weight:normal">Email:</strong> <a href="'.$email.'" target="_blank">'.$email.'</a><br>
                                  <strong style="font-family:Verdana,Arial;font-weight:normal">Password:</strong>***** </p>
                                <p style="font-family:Verdana,Arial;font-weight:normal">Click here to confirm your email and instantly log in (the link is valid only once):</p>
                                <table cellspacing="0" cellpadding="0"  style="border-collapse:collapse;padding:0;margin:0 auto;width:220px;text-align:center">
                                  <tbody>
                                    <tr>
                                      <td style="font-family:Verdana,Arial;font-weight:normal;border-collapse:collapse;vertical-align:middle;padding:0;margin:0 auto;background-color:#3696c2;color:#fff;width:100%;height:40px;display:block;border:0 none;text-align:center;text-transform:uppercase;white-space:nowrap">
                                          <a href="'.$link.'" style="color:#3696c2;width:100%;height:100%;line-height:40px;font-size:15px;display:inline-block;text-decoration:none" target="_blank" >
                                              <span style="color:#fff">Confirm Account</span></a></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p style="font-family:Verdana,Arial;font-weight:normal"> If you have any questions, please feel free to contact us at <a href="mailto:thaj@thaj.com" style="color:#3696c2" target="_blank">thaj@thaj.com</a> or by phone at <a style="color:#3696c2">0422 6577789</a>. </p></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <h5  style="font-family:Verdana,Arial;font-weight:normal;text-align:center;font-size:22px;line-height:32px;margin-bottom:75px;margin-top:30px">Thank you, <span >Thaj</span>
            !</h5></td>
    </tr>
  </tbody>
</table>
                </div>
            </div>
        </td>
        <td style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
            valign="top"></td>
    </tr>
</table>';


 $mail=writeMsg($to,$name,$subject,$message);

if($mail==true){

echo "check your email and activate your account";
}

else{
echo "Error Occured";

}

} else {
echo "Already Registered.Please use Forgot Password";
}
//echo "Register Successfully please Login<br/><br/> ";

break;

case 'login':

$username = mysql_real_escape_string($_REQUEST['email']);
$password = mysql_real_escape_string($_REQUEST['password']);
$md5 = md5($password);
$user_check = mysql_num_rows(mysql_query("select * from tbl_register where email='$username' and password = '$md5' and 	fld_status='1'"));
if ($user_check == 1) {
echo "1";



$user_fetch = mysql_fetch_array(mysql_query("select * from tbl_register where email='$username' and password = '$md5'"));
$_SESSION['user'] = $username;
$_SESSION['name'] = $user_fetch['name'];
$_SESSION['user_id']=$user_fetch['user_id'];
/* echo "<script>window.location.href = 'home.php';</script>"; */
} else {
$count = mysql_num_rows(mysql_query("select * from tbl_register where email='$username' and password = '$md5'"));
if ($count == 1) {

echo "Account Is Not Activated.<a href='send_mail.php?username=$username'>Click here</a> to resend verification mail ";
}
 else 
{
echo "username or password are wrong.";
}
}
break;


case'proceed_to_pay':

$name = mysql_real_escape_string($_REQUEST['name']);
$email = mysql_real_escape_string($_REQUEST['email']);
$mobile = mysql_real_escape_string($_REQUEST['mobile']);
$gender = mysql_real_escape_string($_REQUEST['gender']);
$zip = mysql_real_escape_string($_REQUEST['zip']);
$country = mysql_real_escape_string($_REQUEST['country']);
$state = mysql_real_escape_string($_REQUEST['state']);
$city = mysql_real_escape_string($_REQUEST['city']);
$address = mysql_real_escape_string($_REQUEST['address']);
$modeofconsultant = mysql_real_escape_string($_REQUEST['modeofconsultant']);
$datetime = mysql_real_escape_string($_REQUEST['datetime']);
$enddatetime = mysql_real_escape_string($_REQUEST['enddatetime']);
$datetime = trim($datetime);
$doctor = mysql_real_escape_string($_REQUEST['doctor']);
$speciality = mysql_real_escape_string($_REQUEST['speciality']);
$timedate = mysql_real_escape_string($_REQUEST['date']);
$current_time = date("Y-m-d");
$update = date("Y-m-d");

mysql_query("INSERT INTO `tbl_patientlist`(`fld_name`, `fld_gender`, `fld_email`, `fld_phone`, `fld_address`, `fld_pincode`, `fld_country`, `fld_state`, `fld_city`, `fld_dcname`, `fld_specility`, `fld_datetime`,`fld_enddatetime`, `fld_modeofconsult`, `fld_createdon`, `fld_updatedon`, `fld_delstatus`, `consultant_date`, `user`) VALUES 
('$name','$gender','$email','$mobile','$address','$zip','$country','$state','$city','$doctor','$speciality','$datetime','$enddatetime','$modeofconsultant','$current_time','update','1','$timedate','$uname')") or die(mysql_error());
echo '1';
break;



case'update_register':


$fld_id = mysql_real_escape_string($_REQUEST['fld_id']);
$fld_name = mysql_real_escape_string($_REQUEST['fld_name']);
$fld_gender = mysql_real_escape_string($_REQUEST['fld_gender']);
$fld_email = mysql_real_escape_string($_REQUEST['fld_emails']);
$fld_phone = mysql_real_escape_string($_REQUEST['fld_phone']);
$fld_address = mysql_real_escape_string($_REQUEST['fld_address']);
$fld_pincode = mysql_real_escape_string($_REQUEST['fld_pincode']);
$fld_country = mysql_real_escape_string($_REQUEST['fld_country']);
$fld_state = mysql_real_escape_string($_REQUEST['fld_state']);
$fld_city = mysql_real_escape_string($_REQUEST['fld_city']);

$fld_updatedon = date('Y-m-d H:i:s');
if (mysql_query("UPDATE `tbl_register` SET `name`='$fld_name',`fld_gender`='$fld_gender',`mobile`='$fld_phone',`fld_address`='$fld_address',`fld_pincode`='$fld_pincode',`fld_country`='$fld_country',`fld_state`='$fld_state',`fld_city`='$fld_city' WHERE user_id='$fld_id'")) {
echo "successfully updated";
} else {
echo "Something error occured please try again later";
}
break;
case'update':


$cpassword = mysql_real_escape_string($_REQUEST['cpassword']);
$fld_password = mysql_real_escape_string($_REQUEST['password']);
$password = md5($fld_password);
$email = mysql_real_escape_string($_REQUEST['email']);


if (mysql_query("delete from tbl_forgot_password where email='$email'")) {
if (mysql_query("UPDATE `tbl_register` SET `password`='$password' WHERE email='$email'")) {

$to = $email;
$username = $to;
$link = "http://drthajskin-haironlineexpert.in/login/index.php";
$user_fetch = mysql_fetch_array(mysql_query("select * from tbl_register where email='$email'"));
$NA = $user_fetch['name'];
$subject = 'Change Password Notification | Dr.Thaj';

$message = '<table class="body-wrap" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;"
       bgcolor="#f6f6f6">
    <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
        <td style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
            valign="top"></td>
        <td class="container" width="600"
            style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
            valign="top">
            <div class="content"
                 style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope
                       itemtype="http://schema.org/ConfirmAction"
                       style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;"
                       >
                    <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <td class="content-wrap"
                            style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 30px;border: 3px solid #71B6F9;border-radius: 7px; background-color: #fff;"
                            valign="top">
                            <meta itemprop="name" content="Confirm Email"
                                  style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;"/>
                            <table width="100%" cellpadding="0" cellspacing="0"
                                   style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                 <td class="content-block"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                       Dear  ' . $username . ',
                                    </td>  </tr>
                                    <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                      Password is successfully changed
                                    </td>
                                </tr>
                                <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block"
                                        style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                         <p>For any information related to registration,kindly mail to thaj@thaj.com</p>
                      

                                    </td>
                                </tr>
                                <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block" itemprop="handler" itemscope
                                        itemtype="http://schema.org/HttpActionHandler"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                        <a href="' . $link . '" class="btn-primary" itemprop="url"
                                           style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #10c469; margin: 0; border-color: #10c469; border-style: solid; border-width: 8px 16px;">Click this link to login</a>
                                    </td>
                                </tr>
                                <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                 
                                        <p><b>Regards</b> <br />
                            2nd floor,<br />
                            Balakrishnan Hospital 100 feet Road,  <br />
                            Tatabad<br/>
                            Coimbatore <br />
                             www.drthaj.com<br />
                            <a href="mailto:thaj@thaj.com">thaj@thaj.com</a>
              
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <div class="footer"
                     style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                    <table width="100%"
                           style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <td class="aligncenter content-block"
                                style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;"
                                align="center" valign="top"><a href="#"
                                                               style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; color: #999; text-decoration: underline; margin: 0;">Unsubscribe</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
        <td style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;"
            valign="top"></td>
    </tr>
</table>';


$mail=writeMsg($to,$NA,$subject,$message);
         
if($mail==true){
echo " Password changed Successfully";
}

else{
echo "Error Occured";

}
} else {
echo "Something error occured please try again later";
}
}

break;

case'profile_image':

$image_name = $_FILES['images']['name'];
$tmp_name = $_FILES['images']['tmp_name'];
$size = $_FILES['images']['size'];
$type = $_FILES['images']['type'];
$error = $_FILES['images']['error'];
$rand = rand();
$target_dir = "profiles/";
$img_name = $rand;
$img_name.=$_FILES['images']['name'];



$target_file = $target_dir . $img_name;
if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
$images_arr = $target_file;
}

$q = mysql_query("update tbl_register set profile='$images_arr' where email ='$uname'");

echo "<script>window.location.href = 'doctorslist.php';</script>";
break;

case'change_password':
$user=$_SESSION['user'];

$currentpassword=md5($_POST['cpassword']);
$password=md5($_POST['password']);



//print_r($_SESSION);
$q=mysql_query("select * from  tbl_register where password='$currentpassword' and email='$user'");
//echo "select * from  admin where fld_password='$currentpassword' and user='$user'";
$num =mysql_num_rows($q);
if($num==1){
// echo "11";
$q2=mysql_query("update tbl_register set password='$password' where password='$currentpassword' and email='$user'");
if($q2)
{
echo "1"; 
}
}
else{
echo "2"; 
}
break;
}
?>