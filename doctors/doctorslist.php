<?php
session_start();
@include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="The Corps — Multi-Purpose HTML Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Doctors List | Dr.Thaj</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!-- plugins -->
<link href="css/plugins-css.css" rel="stylesheet" type="text/css" />

<!-- mega menu -->
<link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css" />
 
 <!-- default -->
<link href="css/default.css" rel="stylesheet" type="text/css" />

<!-- main style -->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- responsive -->
<link href="css/responsive.css" rel="stylesheet" type="text/css" />

<!-- Style customizer (Remove these two lines please) -->
<link href="#" data-style="styles" rel="stylesheet">
<link href="css/style-customizer.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/custom.css" rel="stylesheet" type="text/css" />

<style>
.linnkk{
    background-color: #A61F3D;
}
</style>

</head>

<body>

<div class="page-wrapper">

<!--=================================
 preloader -->
 
<div id="preloader">
  <div class="clear-loading loading-effect"> <span></span> </div>
</div>

<!--=================================
 preloader -->
 
<!--=================================
 header -->

<header id="header" class="header">

 <div class="menu">  
  <!-- menu start -->
   <nav id="menu-1" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container"> 
      <div class="row"> 
       <div class="col-lg-12 col-md-12"> 
        <!-- menu logo -->
        <ul class="menu-logo">
            <li>
                <a href="home-1.php"><img id="logo_img" src="images/logo.png" alt="logo"> </a>
            </li>
        </ul>
        <!-- menu links -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
            <ul class="nav navbar-nav navbar-right" style="margin-top: 2%;">           
              <li><a href="javascript:void(0);" class="page-scroll linnkk" style="color: #fff;padding: 7px 8px 7px 7px;">Login</a></li>
              <li><a href="javascript:void(0);" class="page-scroll linnkk" style="background-color: #00a9da;color: #fff;padding: 7px 8px 7px 7px;">Signup</a></li>
              
              
            </ul>
          </div></div>
      </div>
     </div>
    </section>
   </nav>  
 </div>
</header>

<!--=================================
 header -->


<!--=================================
 page-sidebar-->

<section class="page-sidebar page-section-ptb">
  <div class="container">
    <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-3" style="background-color:#F5F5F5;padding:20px;">
         <div class="sidebar-widget">
             <h3 class="mt-0 mb-20">Our Services</h3>
            <div class='widget-menu'>
              <ul>
                 <li><a href='#'><span>Laser Treatment</span></a></li>                
                 <li><a href='#'><span>Acne Treatment </span></a></li>
                 <li><a href='#'><span>Trichology Treatment </span></a></li>
				 <li><a href='#'><span>Skin Treatment </span></a></li>
				 <li><a href='#'><span>Cosmetology & Aesthetic Treatment </span></a></li>
              </ul>
           </div>
        </div> 
        <!--<div class="sidebar-widget mb-30">
             <h3 class="mt-30 mb-20">About us</h3>
             <p>Lorem ipsum dolor sit ametLorem Ipsum Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, <br/> <br/>
              lorem quis bibendum auctor,  consequat ipsum, nec sagittis sem nibh id elit nibh vel velit auctor aliquet. sem nibh  Aenean sollicitudin, </p>
        </div>   -->
       </div> 
      
	
	  <div class="col-lg-9 col-md-9 col-sm-9 page-content">
         <h3 class="text-blue">Schedule an Appointment</h3>
         <p>
			<div class="doctor-list">
				 <div class="row">
      
	   <?php
		 $sql = mysql_query("SELECT distinct doc.fld_name,doc.fld_gender,doc.fld_speciality,doc.fld_languages,doc.fld_image,doc.fld_experience
		 FROM `tbl_doctors` doc");	
		 
		  while($rows=mysql_fetch_array($sql))
			{
			$name = $rows['fld_name'];
			$gender =$rows['fld_gender'];
			$speciality = $rows['fld_speciality'];
			$languages=$rows['fld_languages'];
			$image = $rows['fld_image'];
			$experience = $rows['fld_experience'];
		
		 ?>
	  <div class="col-lg-9 col-md-9">
         <div class="clients-box mb-30 clearfix">
           <div class="clients-photo">
			 <img src="<?php echo $image; ?>" alt="">
			</div>
           <div class="clients-info">
             <!--<h4 style="width:50%">Lorem ipsum dolor sit amet</h4>-->
			 <label id="lblName" style="width:100%"><?php echo $name; ?>   &nbsp;  <a href="#" style="text-decoration:underline;">view profile</a></label> 
			 <ul>
				<li>Gender : <?php echo $gender; ?> </li>
				<li>Speciality : <?php echo $speciality; ?></li>
				<li>Languages Spoken : <?php echo $languages; ?></li>
				<li>Experience : <?php echo $experience; ?></li>
			 </ul>
           </div>
		   
         </div>
      </div>
	  <?php
			}
		?>
	  
     
    </div>  
 
		    </div>
		 </p>
        
       </div> 
    </div>
  </div>
</section>

 
<?php
@include("bottom.php");
?>
<!--=================================
 footer -->


 <!--=================================
 popup-contact -->

<div class="popup-contact">
 <div class="popup-contact-box">
  <a href="#" id="contact-btn"><i class="fa fa-envelope-o"></i></a> 
  <div class="contact-info clearfix">
    <h4 class="mb-30">Send us a message</h4>
    <div id="contact-form" class="contact-form">
      <div class="section-field">
          <div class="field-widget">
          <i class="fa fa-user"></i>  
          <input type="text" name="web" placeholder="name" class="web" id="web">
        </div> 
       </div>
       <div class="section-field">
          <div class="field-widget">
          <i class="fa fa-envelope-o"></i>
          <input id="email" type="email"  placeholder="Email*" name="email">
        </div> 
       </div>
       <div class="section-field clearfix">
        <div class="field-widget">
             <i class="fa fa-pencil"></i>
             <textarea id="message" class="input-message"  placeholder="Comment*" rows="3" name="message"></textarea>
          </div>
        </div>
        <a href="#" class="button-border pull-right clearfix">
            <span>Send</span>
         </a>
    </div>
  </div>
 </div>
</div>

 <!--=================================
 popup-contact -->

 </div>


<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a></div>
 
<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="js/plugins-jquery.js"></script>

<!-- mega menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>
 
<!-- socialstream -->
<script src="js/social/socialstream.jquery.js"></script>

<!-- Style Customizer --> 
<script type="text/javascript" src="js/style-customizer.js"></script> 
  
<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
