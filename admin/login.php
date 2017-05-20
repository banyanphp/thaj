<?php
@include("config.php");
include('common.php');

error_reporting(E_ALL ^ E_NOTICE);
$oper =$_REQUEST['hidoper'];
if($oper=='1')
{
	$name=$_REQUEST["txtusername"];
	$pswd = $_REQUEST["txtpassword"];	
	$email=$_REQUEST["txtemail"];
	$mob = $_REQUEST["txtmobile"];	
	//$activation=md5($email.time());
		
			$chkexistadmin = selectsinglevalue("SELECT count(*) as retv  FROM tbl_admin WHERE fld_email='$email'");          
					if($chkexistadmin==0)
					{  			
					$insertdata = "INSERT INTO tbl_admin (fld_username,fld_email,fld_password,fld_mobile)
					VALUES	
					('$name','$email','$pswd','$mob')";		
					$result=mysql_query($insertdata);		
					}
}
?>


<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Build99 Admin Panel - Login Page</title>
    
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
    
        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
            <script src="js/ie/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>

        <div class="login_box">
            
            <form action="dashboard.html" method="post" id="login_form">
                <div class="top_b">Sign in to Build99 Admin</div>    
               
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
                    <div class="formRow clearfix">
                        <label class="checkbox"><input type="checkbox" /> Remember me</label>
                    </div>
                      <div class="err" id="add_err" align="center"></div>
                </div>
                
                
                
                <div class="btm_b clearfix">
                    <button class="btn btn-inverse pull-right" type="submit" id="adminlogin">Sign In</button>
                    <span class="link_reg"><a href="#reg_form">Not registered? Sign up here</a></span>
                </div>  
            </form>
            
            <form action="dashboard.html" method="post" id="pass_form" style="display:none">
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
                </div>  
            </form>
            
            <form method="post" id="reg_form" name="reg_form" style="display:none">
                <div class="top_b">Sign up to Build99 Admin</div>
              
                <div id="terms" class="modal hide fade" style="display:none">
                    <div class="modal-header">
                        <a class="close" data-dismiss="modal">×</a>
                        <h3>Terms and Conditions</h3>
                    </div>
                    <!--<div class="modal-body">
                        <p>
                            Nulla sollicitudin pulvinar enim, vitae mattis velit venenatis vel. Nullam dapibus est quis lacus tristique consectetur. Morbi posuere vestibulum neque, quis dictum odio facilisis placerat. Sed vel diam ultricies tortor egestas vulputate. Aliquam lobortis felis at ligula elementum volutpat. Ut accumsan sollicitudin neque vitae bibendum. Suspendisse id ullamcorper tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum at augue lorem, at sagittis dolor. Curabitur lobortis justo ut urna gravida scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae ligula elit.
                            Pellentesque tincidunt mollis erat ac iaculis. Morbi odio quam, suscipit at sagittis eget, commodo ut justo. Vestibulum auctor nibh id diam placerat dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse vel nunc sed tellus rhoncus consectetur nec quis nunc. Donec ultricies aliquam turpis in rhoncus. Maecenas convallis lorem ut nisl posuere tristique. Suspendisse auctor nibh in velit hendrerit rhoncus. Fusce at libero velit. Integer eleifend sem a orci blandit id condimentum ipsum vehicula. Quisque vehicula erat non diam pellentesque sed volutpat purus congue. Duis feugiat, nisl in scelerisque congue, odio ipsum cursus erat, sit amet blandit risus enim quis ante. Pellentesque sollicitudin consectetur risus, sed rutrum ipsum vulputate id. Sed sed blandit sem. Integer eleifend pretium metus, id mattis lorem tincidunt vitae. Donec aliquam lorem eu odio facilisis eu tempus augue volutpat.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn" href="#">Close</a>
                    </div>-->
                </div>
                <div class="cnt_b">
                    
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" id="txtusername" name="txtusername" placeholder="Username" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="txtpassword" name="txtpassword" placeholder="Password" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on">@</span><input type="text" id="txtemail" name="txtemail" placeholder="Your email address" />
                        </div>                       
                    </div>
                    
                     <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on">@</span><input type="text" id="txtmobile" name="txtmobile" placeholder="Mobile" maxlength="10"/>
                        </div>                       
                    </div>
                    <input type="hidden" name="hidoper" id="hidoper" value="0" />	
                     
                </div>
                <div class="btm_b tac">
                    <button class="btn btn-inverse" type="button" onClick="fn_register()">Sign Up</button>
                </div>  
            </form>
            
            <div class="links_b links_btm clearfix">
                <span class="linkform"><a href="#pass_form">Forgot password?</a></span>
                <span class="linkform" style="display:none"><a href="#login_form">Login</a></span>
            </div>
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
            url: "admin_logincheck.php",
            data: "email="+emailid+"&password="+pswd,
					
            success: function(html){
			
				if(html=='true')
					{
						window.location="dashboard.php";							
					}
				else
					{
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
