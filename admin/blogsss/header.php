<?php
@include("config.php");	
@include('common.php');
@include("user_sessioncheck.php");
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$selectedcity =$_SESSION['city'];
$useremail = $_SESSION["user_name"];
$user_fb_email = $_SESSION['user_email']; 
$user_login_email = $_SESSION['user_login_email'];
$gmail_login = $_SESSION['gmail_login'];

if($selectedcity=="")
{
    $selectedcity ="Coimbatore";
}
?>


<!-- google plus login-->

<?php  ########## Google Settings.. Client ID, Client Secret #############
/*$google_client_id 		= '905214875887-u1ob2ojgqihij6t9j8e996o5m0rgtd0k.apps.googleusercontent.com';
$google_client_secret 	= 'ScEVjO19LHTZyz25Nuj0pcx4';
$google_redirect_url 	= 'http://www.build99.com/index.php';
$google_developer_key 	= 'AIzaSyCDEV06zWBGUjZlQikH3UDH5pR4zry0b5c';*/

	

require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_Oauth2Service.php';
session_start();

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$oauth2 = new Google_Oauth2Service($client);
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  
  $url = $_SERVER['REQUEST_URI'];
  $path1 = explode('/', $url);
  $tok = explode('?',$path1[1]);
  $code = $tok[1];
  if($code == 'code=4')
  { ?>
	<script type="text/javascript">
   	// Javascript URL redirection
    window.location.replace("http://www.build99.com/");
	</script>
	//header('Location: ' . filter_var($redirect));
  <?php }
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}


if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();

  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
  session_start();
  $_SESSION['gmail_login'] = $email;
  $personMarkup = $email;

  $_SESSION['token'] = $client->getAccessToken();
  
				$check_exist = selectsinglevalue("SELECT count(*) as retv FROM tbl_users WHERE fld_useremail='$email'");
				if($check_exist == 0)
				{ 
					$insertdata = "INSERT INTO tbl_users(fld_useremail,fld_userpswd,fld_usermobile,fld_city,fld_cityid,fld_agree,fld_activationcode,fld_gmail_status)
					VALUES	
					('$email','','','','','','','1')";
					$result=mysql_query($insertdata);
					session_start();
					$_SESSION['gmail_login'] = $email;
				}
				
				else
				{ 
					$query1 = "select fld_useremail from tbl_users where fld_useremail='$email'"; 
					$query = mysql_query($query1);
					while($row=mysql_fetch_array($query))
					{
					$user_email = $row['fld_useremail'];
					session_start();
					$_SESSION['gmail_login'] = $user_email;
					}
				
				}
  
  
} else {
  $authUrl = $client->createAuthUrl();
}


?> 
<!-- google plus login end-->


<link href="log1.png" rel="shortcut icon">
<link href="log1.png" type="image/png" rel="icon">
<div class="topmenus">
<div class="container">
    <ul>
    <li><a href="http://blog.build99.com">BLOG</a></li>
    <li><a href="#brands">BRANDS</a></li>
    <li><a href="build99-about-us.html#contact-section">CAREERS</a></li>
    <div class="socailsection">
    <div class="loginregister">    
    <?php 
    if($useremail != "")
    { 
    ?>      
    <?php /*Welcome &nbsp;<a href="#" title="<?php echo $useremail;?>"><?php echo $useremail;?></a> | <a href="logout.php">Log Out</a></span>*/ ?>
	 <a class="account" title="<?php echo $useremail;?>"><?php echo ucfirst($useremail);?></a> |
		<a class="sub" href="logout.php">Log Out</a>
    <?php
    }
	else if($user_fb_email != '')
	{ ?>
	 <?php /*Welcome &nbsp;<a href="#" title="<?php echo $user_fb_email;?>"><?php echo $user_fb_email;?></a> | <a href="logout.php">Log Out</a></span>*/ ?>
	<a class="account" title="<?php echo $user_fb_email;?>"><?php echo ucfirst($user_fb_email);?></a> |
		<a class="sub" href="logout.php">Log Out</a>
     
	<?php
	}
	else if($user_login_email != '')
	{ ?>
	<?php /* Welcome &nbsp;<a href="#" title="<?php echo $user_login_email;?>"><?php echo $user_login_email;?></a> | <a href="logout.php">Log Out</a></span>*/ ?>
	
    <a class="account" title="<?php echo $user_login_email;?>"><?php echo ucfirst($user_login_email);?></a> |
		<a class="sub" href="logout.php">Log Out</a>
    	
	<?php
	}
	else if($gmail_login != '')
	{ ?>
	<?php /* Welcome &nbsp;<a href="#" title="<?php echo $user_login_email;?>"><?php echo $user_login_email;?></a> | <a href="logout.php">Log Out</a></span>*/ ?>
	
    <a class="account" title="<?php echo $gmail_login;?>"><?php echo ucfirst($gmail_login);?></a> |
	   <a class="sub" href="logout.php">Log Out</a>
    	
	<?php
	}	
	else
    { 
    ?>
    <a data-toggle="modal" href="#myModal">Login</a> | <a href="#myModal" data-toggle="modal">Register</a>
    <?php
    }
    ?>
    
    </div>
    <?php
    if($user_login_email !="")
    {
    ?>  
    <div class="socialicons" style="float: right;"> <a href="https://www.facebook.com/Build99.IN?ref=hl" target="_blank" ><img src="images/fb_icon.png" width="24" alt="facebook" class="iconimg" ></a> <a href="https://twitter.com/Build99" target="_blank"><img src="images/twitter_icon.png"  width="24" alt="twitter" class="iconimg" ></a> <a href="https://plus.google.com/118037049304875181135" target="_blank"><i class="icon-gplus"></i><img src="images/google_icon.png"  width="24" alt="Google plus" class="iconimg" ></a></div>
    <?php
    }
    else
    {
    ?>
    <div class="socialicons"> <a href="https://www.facebook.com/Build99.IN?ref=hl" target="_blank" ><img src="images/fb_icon.png" width="24" alt="facebook" class="iconimg" ></a> <a href="https://twitter.com/Build99" target="_blank"><img src="images/twitter_icon.png"  width="24" alt="twitter" class="iconimg" ></a> <a href="https://plus.google.com/118037049304875181135" target="_blank"><i class="icon-gplus"></i><img src="images/google_icon.png"  width="24" alt="Google plus" class="iconimg" ></a></div>
    <?php    
    }
    ?>
    </div>
    </ul>
        
        </div>
 </div>

<div class="page-header">
  <div class="container searchmenus">
    <div class="logosection"> <a href="Home"><img src="images/logo.png" width="141" alt="Build99 logo"></a></div>
    <!--<div class="searchnav">
    	<div class="input-group">

          <div class="input-group-btn">
          <select class="form-control selectbrand shdnone">
  <option>Brand</option>
  <option>Supplier</option>
  <option>Customer</option>

</select>

          </div><input type="text" class="shdnone form-control inputsearch" placeholder="Search by Brand, Supplier, Customer">
        <div class="input-group-btn">

            <button type="button" class="btn btn-default bluecolorbtn" tabindex="-1"><span class="hide-480">Search</span><span class="show-480"><span class="glyphicon glyphicon-search"></span></span></button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
              <li><a href="#">Brand</a></li>
              <li><a href="#">Supplier</a></li>
              <li><a href="#">Customer</a></li>
            </ul>
          </div></div>

    </div>-->
    
    <div class="locationtop" style="float:right">
        <div class="maparrow" style="margin-left:-21px;margin-top:3px;"><span class="glyphicon glyphicon-map-marker"></span></div>
      
			<select id="ddlselectcity" class="chosen-select" style="width:150px;box-shadow:0 0 4px rgba(0, 0, 0, 0.27);
  border-radius: 4px;height:30px;">
				<?php
				$catiqry = "SELECT distinct fld_cityid,fld_city FROM tbl_city where fld_delstatus=0";
				$catiqry1 = mysql_query($catiqry);
				while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
					{
					$cityid = $row['fld_cityid'];
					$city = $row['fld_city'];																		
					?>
					<option value="<?php echo $cityid;?>" <?php if($selectedcity == $city) echo 'selected'; ?>><?php echo $city; ?></option>
					<?php                                          
					}
				?>   
			</select>
    </div>
    <div class="err" id="success-city"></div>
     
    
    <!--<input type="text" id="area" />-->
    <!--<div class="searchnav">
    	<div class="input-group">

          <div class="input-group-btn">
          <select class="form-control selectbrand shdnone">
  <option>Brand</option>
  <option>Supplier</option>
  <option>Customer</option>

</select>

          </div><input type="text" class="shdnone form-control inputsearch" placeholder="Search by Brand, Supplier, Customer">
        <div class="input-group-btn">

            <button type="button" class="btn btn-default bluecolorbtn" tabindex="-1"><span class="hide-480">Search</span><span class="show-480"><span class="glyphicon glyphicon-search"></span></span></button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
              <li><a href="#">Brand</a></li>
              <li><a href="#">Supplier</a></li>
              <li><a href="#">Customer</a></li>
            </ul>
          </div></div>

    </div>-->
    
  </div>
  
</div>



<div class="franchise">
  <?php @include("franchise.php"); ?>
  </div>
	<div class="modal fade loginsignup" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <!--<h4 class="modal-title" id="myModalLabel">Login</h4> -->
        <p><img src="images/logo.png" width="140" alt="" /></p>
      </div>
      <div class="modal-body">


      <div class="">
    	 <ul id="logintabs" class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#login" role="tab" data-toggle="tab" id="loginfrm">Login</a></li>
              <li class=""><a href="#signup" role="tab" data-toggle="tab" id="signupfrm">Sign up</a></li>
  	 	 </ul>
    
        <div id="logintabContent" class="tab-content">
        <div id="login_results"></div>
              <div class="tab-pane fade active in" id="login">
              <br/>              
              <div class="err" id="add_err"></div>
                    <form role="form" class="loginform" autocomplete="off">
        
              <div class="logininput">
                <input type="email" class="form-control" id="txtloginemail" name="txtloginemail" placeholder="Enter email" required="true">
              </div>
              <div class="logininput">
                <input type="password" class="form-control" id="txtloginpswd" name="txtloginpswd" placeholder="Password" required="true">
              </div>
              <div class="logininput">
                   <select class="form-control" id="ddllogincity" name="ddllogincity">
                   	  <option value="0">Select City</option>
                      <option value="1">Coimbatore</option>
                      <option value="2">Chennai</option>
                      <option value="3">Madurai</option>
        		 </select>
              </div>
              
        
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
              <button type="submit" id="submit_btn" class="btn btn-primary loginbtn ">Login</button>
        
            </form>
                    <div class="loginseprateOr">
                        <div class="orline"><img src="images/or.jpg" alt="" /></div>
                    </div>
                    <div class="signinwith">
                        <a onclick="FBLogin();"><img src="images/fbsignin.jpg" alt="" /></a>
                       <?php /*?> <?php
                        if(isset($authUrl)) //user is not logged in, show login button
						{
							echo '<a class="login" href="'.$authUrl.'"><img src="images/googlesingin.jpg" alt="" /></a>';
						}
                        
						?><?php */?>
					<?php
					if(isset($authUrl)) //user is not logged in, show login button
					{
						echo '<a class="login" href="'.$authUrl.'"><img src="images/googlesingin.jpg" /></a>';
					}
					
					?>
	                    
                    </div>
              </div>
	           <div id="signup_results"></div>
              <div class="tab-pane fade" id="signup">
               <br/>
              <div class="err" id="Success"></div>
                 <form role="form" class="signupform" id="signform" name="signform" autocomplete="off">
        
              <div class="logininput">
                <input type="email" class="form-control" placeholder="Enter email" id="txtsignupemail" name="txtsignupemail" required="true">
                <!--<img id="tick" src="icons/tick.png" width="10" height="10"/>
				<img id="cross" src="icons/cross.png" width="10" height="10"/>-->
              </div>
              <div class="logininput">
                <input  class="form-control"  placeholder="Mobile number" id="txtsignupmobile" name="txtsignupmobile" required="true">
              </div>
              <div class="logininput">
                   <input type="password" class="form-control"  placeholder="Password" id="txtsignuppswd" name="txtsignuppswd" required="true">
              </div>
        
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="checkme" name="checkme" required="true"> Agree Terms & Conditions
                </label>
              </div>
              <button type="submit" id="signup_btn" class="btn btn-primary loginbtn">Sign up</button>
        
            </form>
              </div>
    
        </div>
  	  </div>


      </div>

    </div>
  </div>
</div>
   
	<div class="modal fade" id="register_success" data-toggle="register_success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Build99.com</h4></center>
      </div>
      <div class="modal-body">
        <p>Thanks for your Registration</p>
        <p>An activation code is sent to your registered mailid.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
 
 
 <div class="modal fade loginsignup" id="myModalcity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   
	<div class="modal-header" style="background:white;border-bottom:1px solid #e5e5e5;margin-left:-210px;padding:15px;width:789px">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p><img src="images/logo.png" width="140" alt=""></p>
    </div>
	
      <div class="loginmodal modal-body">

       <div class="selectcitylogins">
       <div class="headinglogins"> Choose city</div>
			<?php
				$catiqry = "SELECT distinct fld_cityid,fld_city,fld_citylogo FROM tbl_city where fld_delstatus=0";
				$catiqry1 = mysql_query($catiqry);
				while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
					{
					$cityid = $row['fld_cityid'];
					$city = $row['fld_city'];
					$cityimages = $row['fld_citylogo'];
					$citypath = "Cities/";
					$citylogo = $citypath.$cityimages;
					?>
			
		   <div class="citysection"><img src="<?php echo $citylogo;?>" title="<?php echo $city;?>" alt="<?php echo $city;?>-Build99" style="width:100%;height:100%"></div>
		   
		   <?php
		   }
		   ?>		   
		   <!--<div class="citysection"><img src="Cities/Coimbatore-Build99.jpg" title="Coimbatore" alt="Coimbatore-Build99"></div>
		   <div class="citysection"><img src="Cities/Madurai-Build99.jpg" title="Madurai" alt="Madurai-Build99"></div>
		   <div class="citysection"><img src="Cities/Bangalore-Build99.jpg" title="Bangalore" alt="Bangalore-Build99"></div>
		   <div class="citysection"><img src="Cities/Hyderabad-Build99.jpg" title="Hyderabad" alt="Hyderabad-Build99"></div>
		   <div class="citysection"><img src="Cities/Ahmedabad-Build99.jpg" title="Ahmedabad" alt="Ahmedabad-Build99"></div>
		   <div class="citysection"><img src="Cities/Cochin-Build99.jpg" title="Cochin" alt="Cochin-Build99"></div>
		   <div class="citysection"><img src="Cities/Delhi-Build99.jpg" title="Delhi" alt="Delhi-Build99"></div>
		   <div class="citysection"><img src="Cities/Jaipur-Build99.jpg" title="Jaipur" alt="Chennai-Build99"></div>
		   <div class="citysection"><img src="Cities/Chennai-Build99.jpg" title="Chennai" alt="Chennai-Build99"></div>-->
       </div>

      </div>

    
  </div>
</div>
 
 <!--<div class="modal fade loginsignup" id="myModalcity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   
	<div class="modal-header" style="background:white;border-bottom:1px solid #e5e5e5;margin-left:-210px;padding:15px;width:789px">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <p><img src="images/logo.png" width="140" alt=""></p>
    </div>
	
      <div class="loginmodal modal-body">

       <div class="selectcitylogins">
       <div class="headinglogins"> Choose city</div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
	   <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       <div class="citysection"></div>
       </div>

      </div>

    
  </div>
</div>-->
 
 <?php
$action = $_REQUEST["action"];
switch($action){
	case "fblogin":
	include 'facebook.php';
	$appid 		= "696318363777617";
	$appsecret  = "2988275ced89058dce08836f3f5056d9";
	$facebook   = new Facebook(array(
  		'appId' => $appid,
  		'secret' => $appsecret,
  		'cookie' => TRUE,
	));
	$fbuser = $facebook->getUser();
	if ($fbuser) {
		try {
		    $user_profile = $facebook->api('/me');
             print_r($user_profile["email"]);
		}
		catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		$user_fbid	= $fbuser;
		$user_email = $user_profile["email"];
		$user_fnmae = $user_profile["first_name"];
		$user_image = "https://graph.facebook.com/".$user_fbid."/picture?type=large";
		
		// $code=mysql_query("SELECT fld_userid FROM tbl_user WHERE fld_activationcode='$code_active'");
		
		$check_select = mysql_query("SELECT fld_useremail FROM tbl_users WHERE fld_useremail = '$user_email'");
		echo "INSERT INTO tbl_users(fld_useremail, fld_userpswd ,fld_usermobile ,fld_city,fld_cityid,fld_agree,fld_activationcode,fld_userstatus,fld_fbstatus) VALUES ('$user_email','','','','','','','0','1')";
			
		if(mysql_num_rows($check_select) == 0)
		{
			echo "coming";
			$insertfbdata = "INSERT INTO tbl_users(fld_useremail, fld_userpswd ,fld_usermobile ,fld_city,fld_cityid,fld_agree,fld_activationcode,,fld_userstatus,fld_fbstatus) VALUES ('$user_email','','','','','','','0','1')";				
			
			$result=mysql_query($insertfbdata);			
		}		
		
	}
	break;
}
?>

<script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '696318363777617', // replace your app id here
	channelUrl : 'http://www.build99.com/home', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			location.reload();
		}
	}, {scope: 'email,user_likes'});
}
</script>

<script>
$('#logintabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
<script>
$(document).ready(function() {
//$('#myModalcity').modal('show');
});
</script>

<style>
#tick{display:none}
#cross{display:none}	
</style>

<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn").click(function() { 
       
	    var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#login input[required=true],#login select[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       if(proceed)
	   {		   
		   username=$("#txtloginemail").val();
		   password=$("#txtloginpswd").val();
		   	
		   $.ajax({
		   type: "POST",
		   url: "logincheck.php",
		   data: "name="+username+"&pwd="+password,
		   success: function(html){    
			if(html='true')    {
			 //$("#add_err").html("right username or password");
			 location.reload();
			}
			else    {
			 $("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<center><img src='icons/cross.png' /> Invalid username or password </center>");
			}
		   },
		   beforeSend:function()
		   {
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html("<center><img src='ajax.gif' /> Loading...</center>")
		   }
		  });
		return false;
	   }
        
    });
    
   
});
</script>

<!--Email Avalability Checking start-->
<script>
$(document).ready(function(){
$('#txtsignupemail').keyup(username_check);
});
	
function username_check(){	
var username = $('#txtsignupemail').val();
if(username == "" || username.length < 6){
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "checkavailability.php",
   data: 'email='+ username,
   cache: false,
   success: function(response){
if(response == 0){
	$('#txtsignupemail').css('border', '1px red solid');	
	$('#tick').hide();
	$('#cross').fadeIn();
	}else{
	$('#txtsignupemail').css('border', '1px green solid');
	$('#cross').hide();
	$('#tick').fadeIn();
	     }

}
});
}
}
</script>
<!--Email Avalability Checking end-->

<script>
$(document).ready(function() {
    $("#signup_btn").click(function() { 
       
	    var proceed = true;
		
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#signup input[required=true],#signup checkbox[required=true]").each(function(){					
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       if(proceed)
	   {		   
		   signupemail=$("#txtsignupemail").val();
		   signupmobile=$("#txtsignupmobile").val();
		   signuppswd=$("#txtsignuppswd").val();	
		   
		      $.ajax({
		   type: "POST",
		   url: "signup_inner.php",
			data: "signupemail="+signupemail+"&signupmobile="+signupmobile+"&signuppswd="+signuppswd,
		    success: function(html){    
			if(html=='Valid'){
			 //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
			 
			 $('#myModal').modal('hide');
			 $("#signform").trigger( "reset" );
			 $("#Success").css('display', 'inline', 'important');
			 $("#Success").html("");

			 $('#register_success').modal('show');
			 
			 //location.reload();
			}			
		   },
		   beforeSend:function()
		   {
			$("#Success").css('display', 'inline', 'important');
            $("#Success").html("<center> Loading...</center>");
			//$("#Success").html("<center><img src='ajax.gif' /> Loading...</center>")
		   }
		  });
		   	 
		   return false;
	   }
        
    });
    
   
});
</script>



<script>
$('#carousel1').carousel();
</script>
<script>
jQuery('ul.nav li.dropdown').hover(function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(00).fadeIn();
  jQuery(this).addClass('menucartshow')
}, function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(00).fadeOut();
  jQuery(this).removeClass('menucartshow')
});

jQuery('.dropdown-menun').hover(function() {
   jQuery(this).find('li.dropdown').addClass('menucartshow');
   },
   function() {
  jQuery(this).find('li.dropdown').removeClass('menucartshow');
  });

</script>
<script>
$(function() {
$('#menu').cycle({
    fx:     'scrollHorz',
    speed:  'fast',
    timeout: 0,
    next:   '#next2',
    prev:   '#prev2'
});
});
        // invoke the carousel
$('#myCarousel23').carousel({
  interval: 3000
});

</script>
<script>

 jQuery(window).scroll(function () {
            var threshold = 40;
        if (jQuery(window).scrollTop() >= 40)
            jQuery('.searchmenus').addClass('margintopasign');
        else
            jQuery('.searchmenus').removeClass('margintopasign');
        });

</script>
<script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>


<script>
$(document).ready(function() {
        $("#ddlselectcity").change(function() {
        var area=$('#ddlselectcity option:selected').text();
        var area = ($('option:selected', this).text());
        //alert(selectedcity);


$.ajax({
type: "POST",
url: "choosecity.php",
data: "area="+area,
success: function(html){
//alert("success");
location.reload();
},
 beforeSend:function()
		   {
		      //$('body').html('<div id="overlay"><img src="ajax.gif" class="loading_circle" alt="loading" /></div>');
              
              //$("#Success").css('display', 'inline', 'important');
              //$("#Success").html("<center> Loading...</center>");
			  $("#success-city").html("<center><img src='ajax.gif' /></center>");
		   }
});
});   

});

</script>

<script>
function goToByScroll(id){
          // Reove "link" from the ID
        id = id.replace("link", "");
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
    }

    $("#sidebar > ul > li > a").click(function(e) { 
          // Prevent a page reload when a link is pressed
        e.preventDefault(); 
          // Call the scroll function
        goToByScroll($(this).attr("id"));           
    });
</script>

<style>
 .hoveropen .firstmenustyle
{
  display: block !important;
}
</style>


<script>
var $content= $('div.menuDescription');
var $links=$('.menu-link').hover(function(){
   /* "this" is element being hovered*/
   var index= $links.index(this);
   $content.stop().hide().eq(index).fadeIn();
    $(".dropdown").removeClass('hoveropen');

},function(){
       $(".dropdown").hover(
  function () {
    $(this).addClass('hoveropen');
  },
  function () {
    $(this).removeClass('hoveropen');
  }
  );
})

       $(".firstmenustylemenulink").hover(
  function () {
    $(".firstmenustyle").show();
  }
  );

</script>

<style>
 .hoveropen .firstmenustyle
{
  display: block !important;
}
</style>


<script>
var $content= $('div.menuDescription2');
var $links=$('.menu-link').hover(function(){
   /* "this" is element being hovered*/
   var index= $links.index(this);
   $content.stop().hide().eq(index).fadeIn();
    $(".dropdown").removeClass('hoveropen');

},function(){
       $(".dropdown").hover(
  function () {
    $(this).addClass('hoveropen');
  },
  function () {
    $(this).removeClass('hoveropen');
  }
  );
})

       $(".firstmenustylemenulink").hover(
  function () {
    $(".firstmenustyle").show();
  }
  );

</script>

	<!--choose city with searchable start-->
  <script src="chosen_js/chosen.jquery.js" type="text/javascript"></script>
  <link rel="stylesheet" href="chosen_css/chosen.css">
 
  <style>
  .chosen-container { width:150px !important;}  
  </style>
  
<script>
$(function(){
    $('select').chosen({
        search_contains: true
		
    });  
})
</script>

 <!--choose city with searchable end-->
 
 <script type="text/javascript">
window.fbAsyncInit = function() {
	FB.init({
	appId      : '696318363777617', // replace your app id here
	channelUrl : '//WWW.build99.COM/channel.html', 
	status     : true, 
	cookie     : true, 
	xfbml      : true  
	});
};
(function(d){
	var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement('script'); js.id = id; js.async = true;
	js.src = "//connect.facebook.net/en_US/all.js";
	ref.parentNode.insertBefore(js, ref);
}(document));

function FBLogin(){
	FB.login(function(response){
		if(response.authResponse){
			window.location.href = "actions.php?action=fblogin";
		}
	}, {scope: 'email,user_likes'});
}
</script>

 
<script type="text/javascript" src="slimscroll-city/jquery.slimscroll.js"></script>
<script type="text/javascript" src="slimscroll-city/jquery.slimscroll.min.js"></script>
<script>

 $(function(){
      $('.selectcitylogins').slimScroll({          
          disableFadeOut: false          
      });

    });
</script>
 
