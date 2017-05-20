<?php


function writeMsg($tomail,$toname,$subject,$msg)
{  

include_once 'phpmailer/PHPMailerAutoload.php'; 

	   
    //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
       $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        //$mail->Debugoutput = 'html';
        //Set the hostname of the mail server
             // sets the prefix to the servier

$mail->Host       = "mail.drthajskin-haironlineexpert.in"; // SMTP server
$mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = true; 
 
$mail->Host       = "drthajskin-haironlineexpert.in"; // sets the SMTP server
$mail->Port       = 587;   
$mail->SMTPAuth   = true;                  // set the SMTP port for the GMAIL server
$mail->Username   = "support@drthajskin-haironlineexpert.in"; // SMTP account username
$mail->Password   = "1q2w3e4r";    
        //Set who the message is to be sent from
        $mail->setFrom('support@drthajskin-haironlineexpert.in', 'Thaj');
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($tomail, $toname);
        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($msg);
        //Replace the plain text body with one created manually
       // $mail->AltBody = 'This is a plain-text message body';
        //Attach an image file
       
        //send the message, check for errors
        
        

            
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
 return true;
}
    

    	
}


