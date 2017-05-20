<?php 

session_start();

 @include("../config.php");

@include('common.php');

if(!empty($_SESSION['user']))

{

	

	echo'<script>window.location="doctorslist.php";</script>';



}

if(!empty($_GET['username'])) {

?>

<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

    <meta charset="UTF-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <title>Login</title>

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

            <label for="tab6">Forgot Password</label>

			

            <div id="tab-content6" class="tab-content">

             

                <?php 

                	$activation=$_GET['activation'];

                        $email=$_GET['username'];

             $q=mysql_num_rows(mysql_query("select * from tbl_forgot_password where email='$email' and activation='$activation'")); if($q==1){?>

              <form method="post" name="register" action="#" id="form">

			  <h5 class="error"></h5>

				<div class="space"></div>

				<div id="flash"></div>

				<div id="show"></div>

             

                <span class="tabaddon"><i class="fa fa-lock fa-2x"></i></span>

                <input class="field" name="password" id="password" required type="password" placeholder="Password"/>

        

                               <span class="tabaddon"><i class="fa fa-lock fa-2x"></i></span>

                <input class="field" name="cpassword" id="cpassword" required type="password" placeholder="Confirm Password"/>

             

                <div class="btn">

               

                    <input type="hidden" value="<?php echo $email; ?>" name="email" id="email">

                 <input type="button" class="submit_button btn btn-primary" value="Submit" style="height:38px;font-weight:600;background-color:#FFFAFA;color:#FF0000">

                </div>

              </form>

             <?php } else { ?>

                <form>     

                    <input type="button" class="btn btn-primary" value="Activation link is Expired" style="font-weight:600;background-color:#FFFAFA;color:#FF0000">

                    <input type="button" class="btn btn-primary" value="Go Back" onclick="window.location.href='index.php'" style="font-weight:600;background-color:#FFFAFA;color:#FF0000">

                </form>

             <?php } ?>

            </div>

			

          </li>





          

         

        

	</ul>

	</section>

    

    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>

    <script type="text/javascript">

	function validateEmail(email) {

  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(email);

}

$(function() {

	

$(".submit_button").click(function() {



var password = $("#password").val();

var cpassword = $("#cpassword").val();

 var str = $( "#form" ).serialize();

  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//var dataString = 'content='+ textcontent;

if (password == 0) {

  $('.error').html('Enter Password'); 

  $("#password").focus();

   return false;

  	}

	// check for minimum length

	var minLength = 6; // Minimum length

	if (password.length < minLength) {

	  $('.error').html('Your password must be at least ' + minLength + ' characters long. Try again.');

	password.value = "";

	 $("#password").focus();

	return false;

	}

	

if (password != cpassword) {

    $('.error').html("Password does not match. Please make sure.");

    $("#cpassword").focus();

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

 









else 

{



$('.error').html('Connecting to server please wait');

$("#flash").show();

$("#flash").fadeIn(400).html('<span class="load">Loading..</span>');

$.ajax({

type: "POST",

url: "login_check.php?action=update",

data: str,

cache: true,

success: function(html){



$("#show").after(html);

//document.getElementById('content').value='';

$("#flash").hide();

$('.error').html('');

    document.getElementById("form").reset();

$("#content").focus();

   setTimeout(function () {

                          window.location.href='index.php';

                        }, 1000);

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

<?php } ?>