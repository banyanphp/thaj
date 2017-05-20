<?php
session_start();
@include("config.php");
include('common.php');
//@include("user_sessioncheck.php");
if(!empty($_SESSION['uname']))
{
	
	echo'<script>window.location="patients.php";</script>';

}
error_reporting(E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DR.Thaj - Admin Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="css/blue.css" />
        <!-- tooltip -->    
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
             
    </head>
    <body>

        <div class="login_box">
            
            <form method="post" id="login_form">
                <div class="top_b">Sign in to DR.Thaj Admin</div>    
               
                <div class="cnt_b">
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" >
                        </div>
                    </div>
                   
                      <div class="err" id="add_err" align="center"></div>
                </div>
                
                
                
                <div class="btm_b clearfix">
                    <button class="btn btn-inverse pull-right" type="submit" id="adminlogin">Sign In</button>                    
                </div>  
            </form>
            
            <form method="post" id="pass_form" style="display:none">
                <div class="top_b">Can't sign in?</div>    
                    <div class="alert alert-info alert-login">
                    Please enter your email address. You will receive a link to create a new password via email.
                </div>
                <div class="cnt_b">
                    <div class="formRow clearfix">
                        <div class="input-prepend">
                            <span class="add-on">@</span><input type="text" placeholder="Your email address" />
                        </div>
                    </div>
                </div>
                <div class="btm_b tac">
                    <button class="btn btn-inverse" type="submit">Request New Password</button>
                    <span class="linkform"><a href="#login_form">Login</a></span>
                </div>  
            </form>
            
           
        </div>
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate.min.js"></script>
        <script src="js/jquery.actual.min.js"></script>
        <script src="lib/validation/jquery.validate.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
                //* boxes animation
                form_wrapper = $('.login_box');
                function boxHeight() {
                    form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);   
                };
                form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
                    var target  = $(this).attr('href'),
                        target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'        : form_wrapper.height()
                    }); 
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height   : target_height,
                            marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height'        : ''
                            }); 
                        });
                    });
                    e.preventDefault();
                });               
           
            });
        </script>
        
        <script>
$(document).ready(function (){
  $("#adminlogin").click(function (){ 
        emailid = $("#username").val();
        pswd = $("#password").val();
        if($("#username").val()== "")
		{		
		//$("#add_err").html("Enter Username");	
		//$("#add_err").html("Enter Username");
            alert("Enter the Username");
			$('#username').focus();
			return false;
		}
		if($("#password").val()=="")
		{
			//$("#add_err").html("Enter Password");
			alert("Enter the Password");
			$('#password').focus();
			return false;
		}
        else
		
		$.ajax({
            type: "POST",
            url: "supplier_logincheck.php",
            data: "email="+emailid+"&password="+pswd,					
            success: function(html){	
              //alert(html);			
				if(html=="true")
					{			
						//alert("1");				
						window.location="doctors.php";							
					}
				if(html=="trueing")
					{			
						//alert("1");				
						window.location="patients.php";							
					}
				else
					{
					//alert("2");	
					$("#add_err").html("Wrong username or password");						
					}
				},
				beforeSend:function()
					{
					//$("#add_err").html("Loading...")
					$("#add_err").html("<div class='msgboxinfo'><img src='ajax-loader.gif'/></div>");
					}
				}); 
				
				return false;				               		
     });
});
</script>


<script>

function fn_register()
	{		
	    var f = document.reg_form;	
		if(f.txtusername.value == "")
			{
				alert ("Enter the Name");								
				f.txtusername.focus();				
				return false;				
			}
			
		if(f.txtpassword.value=="")
			{
				alert("Enter the Password");			
				f.txtpassword.focus();
				return false;
			}		
			
			if (f.txtemail.value == "")
			{
				alert ("Enter the Email");			
				f.txtemail.focus();
				return false;	
			}
			
		 if (isValidEmail(f.txtemail.value) == false)
			{
			alert("Enter Valid Email ID");
			f.txtemail.focus();
			return false;			
			}

 		function isValidEmail(val)
			{
			var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
			if (!val.match(re))
				{
				return false;
				} 
			}
			
			
		if(isNaN(f.txtmobile.value)||f.txtmobile.value.indexOf(" ")!=-1)
		   {
			  alert("Enter the valid Mobile number");			
			 	 f.txtmobile.focus();
			 	 return false; 
		   }
		
	   if (f.txtmobile.value == "")
		   {
				alert("Enter the Mobile Number");			
				f.txtmobile.focus();
				return false;
		   }
	   if (f.txtmobile.value.length<10)
		   {
				alert("Enter 10 Digits Mobile number");			
				f.txtmobile.focus();
				return false;
		   }
	  
		f.hidoper.value=1;
		f.action = "login.php";
		f.method = "post";
		f.submit();		
		return false;
			}
</script>

        
    </body>
</html>
