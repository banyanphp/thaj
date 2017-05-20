function fn_sendmail()
{
	var f = document.new_message_form;
	
		if(f.mail_sender.selectedIndex == 0)
		{			
			alert ("Select Sender");
			f.mail_sender.focus();
			return false;
			
		}
		
		if(f.mail_recipients.value == "")
		{
			alert ("Enter Recipients");
			f.mail_recipients.focus();
			return false;
			
		}
		
		if (f.mail_subject.value == "")
		{
			alert ("Enter Subject");
			f.txtemail.focus();
			return false;	
		}
			
		
		 if(f.mail_message.value == "")
		 {
		 alert("Enter Message");
		 f.mail_message.focus();
		 return false;		 
		 }	   
		 
   	    f.hidoper.value=1;
		f.action = "lib/plupload/examples/upload.php";
		f.method = "post";
		f.submit();
		return false;	
}
