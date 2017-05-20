<?php
 @include("../config.php");
@include('common.php');
@include('mail_functionlity.php');

error_reporting(E_ALL ^ E_NOTICE);
session_start();
 
  $email = mysql_real_escape_string($_REQUEST['email']);
       $forgotpassword = md5($email . time());
       
        $user_check = mysql_num_rows(mysql_query("select * from tbl_register where email='$email'"));
    $fetch_user = mysql_fetch_array(mysql_query("select * from tbl_register where email='$email'"));
 $user_name=$fetch_user['name'];
        if ($user_check == 1) {
        
            $forgot_password_check= mysql_num_rows(mysql_query("select * from tbl_forgot_password where email='$email'"));
            if($forgot_password_check==1)
                {
            
                $forgot_password_delete=mysql_query("DELETE FROM tbl_forgot_password where email='$email'");
            }

           $q= mysql_query("INSERT INTO `tbl_forgot_password` (`fld_id`, `email`, `activation`, `status`) VALUES ('', '$email', '$forgotpassword', '0')");
       
          $to = $email;
        $username = $to;
        $link = "http://drthajskin-haironlineexpert.in/login/update_password.php?username=$username&activation=$forgotpassword";
        $subject = 'Forgot Password Notification | Dr.Thaj';

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
                                       Dear  ' . $user_name . ',
                                    </td>  </tr>
                                    <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                       Click this link to Reset your Password For Your account
                                    </td>
                                </tr>
                                  <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="content-block" itemprop="handler" itemscope
                                        itemtype="http://schema.org/HttpActionHandler"
                                        style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                                        valign="top">
                                        <a href="' . $link . '" class="btn-primary" itemprop="url"
                                           style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #10c469; margin: 0; border-color: #10c469; border-style: solid; border-width: 8px 16px;">Reset Your password</a>
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

 
$mail=writeMsg($to,$user_name,$subject,$message);

        if ($mail==true) {
            echo "1";
        } else {
            echo "2";
          
        }


           
        }        
		else {
           echo "3";
        }
    
