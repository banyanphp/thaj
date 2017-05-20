<?php

@include("config.php");
@include("common.php");
@include("configg.php");
@include("functions.php");
	
	if($_FILES['fupload']['name']) 
	{
		
		$filename = $_FILES['fupload']['name'];
		
   
	$NUM = time();
	$img = explode(".", $filename);
	$ext= end($img);
	$ext= strtolower($ext);
	$final_attachments = $NUM . ".".$ext;
	$size =$_FILES['fupload']['size'];
	$source = $_FILES['fupload']['tmp_name'];
	$sender =$_REQUEST['mail_sender'];
	$receiver=$_REQUEST['mail_recipients'];
	$subject=$_REQUEST['mail_subject'];
	$message=$_REQUEST['mail_message'];
	$target = $path_to_sendmail . $final_attachments;	
		move_uploaded_file($source, $target);
				
		$target1 = str_replace("../","","$target");	
		
		$query="insert into tbl_sendmail (fld_sender,fld_receiver,fld_subject,fld_message,fld_attachments) values ('$sender','$receiver','$subject','$message','$target1')";
        $acesoqry1 = mysql_query($query);
		
		$to = $receiver;		
		$subject = $subject;
		$headers = "MIME-Version: 2.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From: Buil99 <build99.com> ";
		$body = "Hi" ."\r\n";		
		$body .=$message . "\r\n";
		$body .= $target . "\r\n";
		
		
		
		/*$body.='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'."build99.com/Test/pop-up/".'activation/'.$activation.'">'."build99.com/Test/pop-up/".'activation/'.$activation.'</a>';*/
		
		if(mail($to, $subject, $body, $headers))
		{
		echo '<div class="success">Thank you for
		registering! A confirmation email
		has been sent to '.$email.' Please click on the Activation Link to Activate your account </div>';
		//return true;
		}
		
		else
		{
		echo "failed";
		$succ = 2;
		}

}


?>