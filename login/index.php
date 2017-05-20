<?php 
session_start();

if(!empty($_SESSION['user']))
{
	
	echo'<script>window.location="doctorslist.php";</script>';

}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title>
    <meta name="author" content="Reverie Tech" />
       <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="tabs.css" />'
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
<img src="logo.png"  class="logo_image">
<ul class="ul home-icon">
<?php /*   <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">How it works?</a></li>
  <li><a href="#contact">Top Specialities</a></li>
  <li><a href="#about">Specialist Doctors</a></li> <?php */ ?>
<li><a href="../index.php"><img src="home.png" style="width: 49%;"></a></li>
</ul> 
</header>
       <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Forgot Password </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <form class="form-horizontal" role="form" id="forgot_form" method="post" enctype="multipart/form-data">

                                                            <span id="forgot_login" style=" margin-left: 40%;"></span>
                                                            <div class="form-group"style=" margin-top: 13px;">
                                                                <label class="col-md-4 control-label">Enter Your Email-ID</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" id="forgot_email" name="email" class="form-control" >
                                                                </div>
                                                            </div>



                                                        
                                                            <div class="form-group">

                                                                <div class="col-lg-12">
                                                                    <button class="btn btn-info btn-sm proceedbutton" style="float:right" type="button">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div><!-- end col -->
                                                </div>

                                                <div class="modal-footer" style="border-top:none;border-bottom:1px solid #CACACA">
                                                  
                                                </div>
                                            </div>



                                        </div>
                                    </div>
    <section class="tabred" style="margin-top:5%;color:#fff">
		<ul class="tabs red">
          
          <li>
            <input type="radio" name="tabs red" id="tab6" />
            <label for="tab6">Register</label>
			
            <div id="tab-content6" class="tab-content">
              
              <form method="post" name="register" action="#" id="form">
			  <h5 class="error"></h5>
                          <div id="show"></div>
				<div class="space"></div>
				<div id="flash"></div>
			
                <span class="tabaddon"><i class="fa fa-user fa-2x"></i></span>
                <input class="field" name="name" id="name"  required type="text" placeholder="Name" />
                <span class="tabaddon"><i class="fa fa-envelope fa-2x"></i></span>
                <input class="field" name="email" id="email" required type="email" placeholder="E-mail ID"/>
                <span class="tabaddon"><i class="fa fa-lock fa-2x"></i></span>
                <input class="field" name="password" id="password" required type="password" placeholder="password"/>
                <span class="tabaddon"><i class="fa fa-lock fa-2x"></i></span>
                <input class="field" name="mobile" id="mobile"  required type="text" placeholder="Mobile No" onKeyPress="return isNumberKey(event)"/>
               
             
               <div class="btn">
                  <input type="checkbox" name="checkbox"  style="float: left;" required>
                  <em  style="float: left;">I agree with <a href="terms_conditions.php"> terms and conditions </a></em>
                  <br/>
                   
                 <input type="button" class="submit_button btn btn-primary" value="SignUp" style="height:38px;font-weight:600;background-color:#FFFAFA;color:#FF0000">
                </div>
              </form>
            </div>
			
          </li>

      	 <li>
            <input type="radio" name="tabs red" id="tab5" checked />
            <label for="tab5">Login</label>
			
            <div id="tab-content5" class="tab-content">
              <form method="post" name="register" action="#" id="formlogin"><h5 class="error_login"></h5>
                <div class="social" style="visibility:hidden;"> <a class="twitter" href="#"></a> </div>
               
                <span class="tabaddon"><i class="fa fa-envelope fa-2x"></i></span>
                <input class="field"  required type="email" name="email" id="email_log" placeholder="email address"/>
                <span class="tabaddon"><i class="fa fa-lock fa-2x"></i></span>
                <input class="field" required type="password" name="password" id="password_log" placeholder="password"/>
                <div class="btn">
                  <input type="checkbox" name="checkbox" id="checkbox"  style="float: left;">
                  <em style="float: left;">Keep me logged in </em>
                  <a href="" style="float:right;color:#fff"  data-toggle="modal" data-target="#myModal">Forgot password?</a>
                  <br/>
                  <input type="button" class="login_button btn btn-info" value="Login" style="height:38px;font-weight:600;background-color:#FFFAFA;color:#FF0000">
                </div>
              </form>
            </div>
          </li>
          
          
         
        
	</ul>
	</section>
    

<script type="text/javascript">
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode == 32) {
                return true;
            } else if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        }
    </script>
    <script>
    $('#name').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z.\b ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });
</script>
<!--    Name Validation-->
 
    <script type="text/javascript">
	function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
$(function() {
	
$(".submit_button").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var password = $("#password").val();
var mobile = $("#mobile").val();
 var str = $( "#form" ).serialize();
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//var dataString = 'content='+ textcontent;
 
if(name=='')
{
	$('.error').html('Enter Name');
	$("#name").focus();
	return false;
}
if(email == '')
{
	$('.error').html('Enter Email address');
	$("#email").focus();
	return false;
}
 var x = $("#email").val();
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        $('.error').html('Enter vaild Email address');
	    $("#email").focus();
        return false;
    }
 

if(password=='')
{
	$('.error').html('Enter Password');
	$("#password").focus();
	return false;
}

if(mobile=='')
{
$('.error').html('Enter Mobile');
$("#mobile").focus();
return false;
}
    if (($("input[name*='checkbox']:checked").length)<=0) {
       $('.error').html('Please Accept terms And Conditions');
    }
else 
{
	//alert(str);
	$('.error').html('Connecting to server please wait');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "login_check.php?action=register",
data: str,
cache: true,
success: function(html){
   
$("#show").html(html);
//document.getElementById('content').value='';
$("#flash").hide();
$('.error').html('');
    document.getElementById("form").reset();
$("#content").focus();
  setTimeout(function () {
                            $('#show').hide();
                        }, 5000);
}  
});
}
return false;
});
});

$(function() {

	
$(".login_button").click(function() {

var email = $("#email_log").val();
var password = $("#password_log").val();
var str = $( "#formlogin" ).serialize();

if(email == '')
{
	$('.error_login').html('Enter Email address');
	$("#email_log").focus();
	return false;
}
 

if(password=='')
{
	$('.error_login').html('Enter Password');
	$("#password_log").focus();
	return false;
}


else 
{
	
	$('.error_login').html('Loading please wait....');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "login_check.php?action=login",
data: str,
cache: true,
success: function(html){
    
if(html==1)
{
	window.location.href='doctorslist.php';
}
else{



     $('.error_login').show();
      $('.error_login').html(html); 
   // $('.error_login').html('Wrong Username And Password'); 
      setTimeout(function () {
                            $('.error_login').hide();
                        }, 10000);




}
}

});
}
return false;
});
});
$(function() {
	
$(".proceedbutton").click(function() {

var email = $("#forgot_email").val();

var str = $( "#forgot_form" ).serialize();

if(email == '')
{
	$('#forgot_email').html('Enter Email address');
	$("#forgot_login").focus();
	return false;
}
 
else 
{

	
	$('#forgot_login').html('Loading please wait....');
$("#flash").show();
$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');
$.ajax({
type: "POST",
url: "forgot_password.php",
data: str,
cache: true,
success: function(html){

if(html==1)
{

	$('#forgot_login').html('Password information is sent to your Email');
}
else if(html==3) 
{ 
    $('#forgot_login').html('Wrong username');
    }
    
else 
{ 
$('#forgot_login').html(html);

   // $('#forgot_login').html('Something error found.Please try again Later'); 
}
 
}  
});
}
return false;
});
});
</script>
    
</div>



</body>


</html>