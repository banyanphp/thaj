<?php

@include("config.php");

@include('common.php');

error_reporting(E_ALL ^ E_NOTICE);

//$uname = $_SESSION['user'];

date_default_timezone_set('Asia/Kolkata');



if($_SESSION['user']!="")

{

	echo'<script>window.location="login/index.php";</script>';



} 

else {

//Get Only Current Time 00:00 AM / PM 

 //$current = date("H:i");

 $current =  date("H:i" , strtotime('+30 minutes'));

 

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="keywords" content="" />

<meta name="description" content="" />

<meta name="author" content="" />

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>DR.Thaj LASER SKIN | HAIR CLINIC | Coimbatore</title>



<!-- Favicon -->

<link rel="shortcut icon" href="images/favicon.ico" />



<!-- bootstrap -->

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />



<!-- plugins -->

<link href="css/plugins-css.css" rel="stylesheet" type="text/css" />

  

<!-- revoluation -->

<link rel="stylesheet" type="text/css" href="js/revolution/css/extralayers.css" media="screen" /> 

<link rel="stylesheet" type="text/css" href="js/revolution/rs-plugin/css/settings.css" media="screen" />



<!-- Scrollbar -->

<link href="css/portfolio/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />



<!-- main style -->

<link href="css/style.css" rel="stylesheet" type="text/css" />



<!-- responsive -->

<link href="css/responsive.css" rel="stylesheet" type="text/css" />



<!-- Style customizer (Remove these two lines please) -->



<link href="css/style-customizer.css" rel="stylesheet" type="text/css" />



<!-- custom style -->

<link href="css/custom.css" rel="stylesheet" type="text/css" />



<style>

#special

{

	background-color: #00a9da;

    padding: 7px 0 0 2px;

	height:220px;

	cursor:pointer;

}

#special h4

{

	color:#fff;

}



#special p

{

	color:#fff;

}



#special span

{

	color:#fff;

}

.time-slot li

{

	display:inline-block;

	padding: 7px 6px 0;

}

.time-slot li input, .time-slot li a {

    padding: 4px 9px;

    border: none;

    border-radius: 16px;

    -webkit-border-radius: 16px;

    background: #ec7323;

    display: block;

    color: #fff;

    font-size: 12px;

}

.grey-cont {

   background: #f8f6f6 none repeat scroll 0 0;

    border: 1px solid #c3c2c2;

    border-radius: 6px;

    box-shadow: 0 0 2px rgba(255, 255, 255, 0.9) inset;

    float: left;

    margin: 0 0 14px;

    padding: 56px;

    text-align: center;

    width: 100%;

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

 

 


<header id="header" class="header" style="background-color:#000">

  <div id="home"></div>

    <div class="menu-main"style="height: 22px;">
      <div class="container"> 

       

 <div class="row" style="float:right;font-size:12px;color:#fff"> 
 <div class="col-md-12"> 
         <div class="contact-add col-md-12 col-sm-6 col-xs-12" style="float:right;font-size:15px">Contact Us:
          

        +91 936 2666 789</p>
         </div>


</div></div>
</div>
</div>

<header id="header" class="header">

  <div id="home"></div>

    <div class="menu-main">
      <div class="container"> 

       <div class="row"> 
 <div class="col-md-12"> 

   
</div>
 <div class="container"> 

       <div class="row"> 
     <div id="menu" class="navbar navbar-default">


        <div class="col-md-12"> 

          <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

              <span class="sr-only">Toggle navigation</span> 

              <span class="icon-bar"></span>

              <span class="icon-bar"></span>

               <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="index.php"> <img id="logo_img" src="logo.png" alt=""></a>

          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">

              <li><a href="#home" class="page-scroll">Home</a></li>

              <li><a href="#about" class="page-scroll">How it works?</a></li>

              <li><a href="#service" class="page-scroll">Top Specialities</a></li>

              <li><a href="#team" class="page-scroll">Specialist Doctors</a></li>              

              <li><a href="#contact" class="page-scroll">Contact</a></li>

              

              <li><a href="login/index.php" class="page-scroll">Login</a></li>

              <li><a href="login/index.php" class="page-scroll" style="background-color: #00a9da;color: white;padding: 12px 16px 10px 13px;">Signup</a></li>

              

              

            </ul>

          </div>

        </div>

       </div>

      </div>

    </div>

  </div>

</header>



<!--=================================

 header -->

 



<!--=================================

slider- -->

 

<div class="rev-slider-2" style="background-image:url(images/slider/slider-02.jpg);height:600px;">

 <div class="tp-banner-container">

    <div class="tp-banner" style="z-index:999999;height: 540px;">

    <br/>

    <br/>

    <br/>

        <h3 align="center"> <span style="color:#EC7323">Consult a doctor </span>, Anytime, Anywhere! </h3>

            <br/>

    <br/>

   		

        	 <div id="register-form" class="register-form" style="z-index:999999;">

           

            

            <div class="row">

            		

                 				<div class="section-fields col-xs-3 col-md-3">

                     <label for="phone" style="color:#fff;">Specialist *</label>

                    <div class="field-widget">

                        <select class="doctor" name="getdoctor" id="getdoctor">

                            <option value="Day">Select Specialist</option>

                            <?php 
                            $qry = mysql_query("SELECT * FROM tbl_specialities ");

							

							while($fetch_specialist1 = mysql_fetch_array($qry))

								{

									echo $fld_id1 = $fetch_specialist1['fld_id']; 

									echo $fld_specialities1  = $fetch_specialist1['fld_specialities']; ?>

									<option value="<?php echo $fld_id1; ?>"><?php echo $fld_specialities1; ?></option>

                              <?php } ?>

							

						

                        </select>

                     </div>

                    </div>

                    

                                <div class="section-doctor-field col-xs-3 col-md-3">

                  <label for="phone" style="color:#fff;">Doctor List *</label>

                 <div class="field-widget">

                   <select id="myselect" name="select" >

                        <option value="Month">Choose Doctor</option>

                       <?php $qry11 = mysql_query("SELECT * FROM `tbl_doctors` ");

							//$sql1 = mysql_query($qry1);

							while($fetch_specialist11 = mysql_fetch_array($qry11))

								{

									 $fld_id11 = $fetch_specialist11['fld_id']; 

									 $fld_name  = $fetch_specialist11['fld_name']; ?>

									<option value="<?php echo $fld_id11; ?>"><?php echo $fld_name; ?></option>

                              <?php } ?>

                    </select>

                 </div>

                </div>

                

                <div class="section-appointment-field col-xs-3 col-md-3" >

                 <label for="phone" style="color:#fff;">Appointment *</label>

                  <div class="field-widget">

				  

				   <button class="btn btn-primary" style="background-color: #A61F3D;

    color: #fff;width:35%; margin-top: 3%;"onclick="window.location.href='login/index.php'">Consult Now</button>

                   

              

	

	<button class="btn btn-primary" style="background-color: #A61F3D;color: #fff;width: 60%; margin-top: 3%;"onclick="window.location.href='login/index.php'">Schedule Appointment</button>

                  </div>

				  

                 </div>
 
     

                 
                </div>

                               

               </div>

         

         

   <div class="tp-bannertimer tp-bottom"></div> 

  </div> 

 </div>    

</div>    



<!--=================================

slider -->





<!--=================================

action box- -->



<section class="action-box">

  <div class="container">

    <div class="row">

      <div class="col-lg-8 col-md-8">

        <h3 class="text-white">Established in 1999, our clinic, Dr. Thaj Laser Skin & Hair Clinic, has over seven centers to date and is the region’s leader in advanced skin care and hair care services.</h3>

       <!-- <p class="text-white">We are the pioneers in introducing the most advanced lasers to skincare and hair removal problems in the south of India viz., Kerala, Tamilnadu and Pondicherry states.</p>-->

      </div>

      <div class="col-lg-4 col-md-4 text-right action-box-button mt-40">

         

          <a class="button button-black" href="#">

            <span>Schedule an Appointment</span>

            <i class="fa fa-download"></i>

         </a>

      </div>

    </div>

  </div>

</section>

 

<!--=================================

action box- -->



<hr class="mr" />

 

<!--=================================

feature- -->



<section id="about" class="white-bg custom-content page-section-pt">

 <div class="container-fluid">

  <div class="row">

  

   <div class="col-lg-12 col-md-12 col-sm-12">

    <img class="img-responsive center-block" src="how-it-works.png" alt="">   

   </div>

  </div>

 </div>

</section> 



<!--=================================

feature- -->



 <!--=================================

 key-features -->



<section id="service" class="key-features white-bg page-section-ptb">

  <div class="container">

    <div class="row">

      <div class="col-lg-12 col-md-12">

        <div class="section-title-1 text-center">

          <h1 class="text-blue">Our Services</h1>

          <div class="title-line"></div>

          <p> See some of our best services</p>

        </div>

       </div>

      </div>

      <div class="row">

        <div class="col-lg-4 col-md-4 col-sm-4" >

          <div class="feature-2 text-center mb-30 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s" id="special">

            <span class="icon-layers" aria-hidden="true"></span>

            <h4 class="text-back pt-20 pb-20">Laser Treatment</h4>

            <p>At Dr. Thaj Laser Clinic, we believe that everyone deserves perfect skin, which is why our laser treatments are designed to improve your skin texture and the tone dramatically.</p>

          </div>

        </div>

        

     <div class="col-lg-4 col-md-4 col-sm-4">

          <div class="feature-2 text-center mb-30 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.5s" id="special">

            <span class="icon-picture" aria-hidden="true"></span>

            <h4 class="text-back pt-20 pb-20">Acne Treatment</h4>

            <p>Acne is a skin disorder that happens as a result of the action of hormones and other substances on the skin’s sebaceous glands (oil glands) and hair follicles.</p>

          </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">

          <div class="feature-2 text-center mb-30 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.5s" id="special">

            <span class="icon-heart" aria-hidden="true"></span>

            <h4 class="text-back pt-20 pb-10">Trichology Treatment</h4>

            <p>Hair loss – The one issue that all of us will go through in our lifetime; causing grief and lack of confidence. Hair loss affects our character and behaviour as well.</p>

          </div>

        </div>

        

      

        

     </div>

     <div class="row">

     

     	<div class="col-lg-4 col-md-4 col-sm-4">

          <div class="feature-2 text-center mb-30 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1.5s" id="special">

            <span class="icon-heart" aria-hidden="true"></span>

            <h4 class="text-back pt-20 pb-10">Skin Treatment</h4>

            <p>Rising temperatures, fluctuating weather, unpredictable climatic variations – Your skin is taking toll on all these external factors. Skin care is no more considered to be a luxurious way of living, it’s essential</p>

          </div>

        </div>

     

       <div class="col-lg-4 col-md-4 col-sm-4">

          <div class="feature-2 text-center wow fadeInUp" data-wow-delay="0.8s" data-wow-duration="1.5s" id="special">

            <span class="icon-mouse" aria-hidden="true"></span>

            <h4 class="text-back pt-20 pb-10">Cosmetology & Aesthetic Treatment</h4>

            <p>The ageing changes first appear on our face as laxity and sagging. The skin on your body may also be affected, including your upper arms, thighs, and abdomen</p>

          </div>

        </div>

       

     </div>

   </div>

</section>



<!--=================================

  key-features -->



<hr class="mr" />





<hr class="mr" />



<!--=================================

our-team  -->



 <section id="team" class="our-team white-bg page-section-ptb">

   <div class="container">

     <div class="row">

       <div class="col-lg-12 col-md-12">

       <div class="section-title-1 text-center">

          <h1 class="text-blue">Specialist Doctors</h1>

          <div class="title-line"></div>

          <p>List of people who matter in our concern</p>

        </div>

       </div> 

    </div>

  <div class="team">

   <div class="row">

   

      <div class="col-lg-3 col-md-3 col-sm-6 col-sm-push-2">

         <div class="team-box active">

          <img alt="Dr.C.P.Thajudheen.jpg" src="doctors/Dr.C.P.Thajudheen.jpg" class="img-responsive"> 

            <div class="team-overlay text-center"> 

                <div class="info">

                   <h5 class="text-white">Dr. C.P. Thajudheen MD</h5>

                 <span>Cosmetic  Dermatologist &  Laser Surgeon,</span>

               </div>

             </div>

        </div>

       </div>
 <div class="col-lg-3 col-md-3 col-sm-6 col-sm-push-2">

       <div class="team-box active">

        <img alt="" src="doctors/Dr.Jyothy.k.jpg" class="img-responsive"> 

          <div class="team-overlay text-center"> 

              <div class="info">

                 <h5 class="text-white">Dr. Jyothy.K MD DVD </h5>

               <span>Dermatologist</span>

             </div>

       </div>

      </div>

     </div> 
      <div class="col-lg-3 col-md-3 col-sm-6 col-sm-push-2">

       <div class="team-box active">

        <img alt="" src="doctors/Priyadharsini.jpg" class="img-responsive"> 

          <div class="team-overlay text-center"> 

              <div class="info">

                 <h5 class="text-white">Dr.Priyadharsini</h5>

               <span>Dermatologist </span>

             </div>

              
       </div>

      </div>

     </div> 
	

   </div>

  </div>

 </div>

</section>



<!--=================================

our-team -->





<!--=================================

 Choose Your Pricing-->



<!--<section class="pricing gray-bg page-section-ptb">

  <div class="container">

    <div class="row">

       <div class="col-lg-12 col-md-12">

        <div class="section-title-1 text-center">

          <h1 class="text-blue">Choose Your Pricing</h1>

          <div class="title-line"></div>

          <p>We manage  yor business</p>

        </div>

      </div>

    </div>

    <div class="row">

      <div class="col-lg-3 col-md-3 col-sm-6">

       <div class="pricing-table text-center">

        <div class="pricing-title">

           <h3>Standard</h3>

           <span>Starting at</span>

         <div class="pricing-prize">

           <h2 class="text-blue">19.99 $</h2>

           <span>Per month</span>

         </div>  

       </div>

       <div class="pricing-list">

         <ul>

           <li>Wordpress</li>

           <li>HTML5 & CSS 3</li>

           <li class="text-light-blue">PSD Files</li>

           <li class="text-light-blue">Unlimited Support</li>

         </ul>

       </div>

       <div class="pricing-order">

         <a class="button-border" href="#"><span>Order Now!</span></a>

       </div>

     </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">

       <div class="pricing-table active text-center">

        <div class="pricing-ribbon">

          <img src="images/ribbon-2.png" alt="">

        </div>

        <div class="pricing-title">

           <h3 class="text-white text-bg">Medium</h3>

           <div class="pricing-bg">

            <span>Starting at</span>

            <div class="pricing-prize">

            <h2 class="text-blue">49.99 $</h2>

            <span>Per month</span>

           </div>

         </div>  

       </div>

       <div class="pricing-list">

         <ul>

           <li>Wordpress</li>

           <li class="text-light-blue">HTML5 & CSS 3</li>

           <li>PSD Files</li>

           <li class="text-light-blue">Unlimited Support</li>

         </ul>

       </div>

       <div class="pricing-order">

         <a class="button-border-white" href="#"><span>Order Now!</span></a>

       </div>

     </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">

       <div class="pricing-table text-center">

        <div class="pricing-title">

           <h3>Premium</h3>

           <span>Starting at</span>

         <div class="pricing-prize">

           <h2 class="text-blue">79.99 $</h2>

           <span>Per month</span>

         </div>  

       </div>

       <div class="pricing-list">

         <ul>

           <li>Wordpress</li>

           <li>HTML5 & CSS 3</li>

           <li>PSD Files</li>

           <li class="text-light-blue">Unlimited Support</li>

         </ul>

       </div>

       <div class="pricing-order">

         <a class="button-border" href="#"><span>Order Now!</span></a>

       </div>

     </div>

    </div>

    <div class="col-lg-3 col-md-3 col-sm-6">

       <div class="pricing-table pricing-table-border text-center">

        <div class="pricing-title">

           <h3>Ultimate</h3>

           <span>Starting at</span>

         <div class="pricing-prize">

           <h2 class="text-blue">99.99 $</h2>

           <span>Per month</span>

         </div>  

       </div>

       <div class="pricing-list">

         <ul>

           <li>Wordpress</li>

           <li>HTML5 & CSS 3</li>

           <li>PSD Files</li>

           <li>Unlimited Support</li>

         </ul>

       </div>

       <div class="pricing-order">

         <a class="button-border" href="#"><span>Order Now!</span></a>

       </div>

     </div>

    </div>

  </div>

 </div>

</section>-->



<!--=================================

 Choose Your Pricing-->

 

 

 <!--=================================

 Our Blog -->

<!--

<section id="blog" class="our-blog page-section-ptb">

  <div class="container">

    <div class="row">

     <div class="col-lg-12 col-md-12">

        <div class="section-title-1 text-center">

          <h1 class="text-blue">Our Blog </h1>

          <div class="title-line"></div>

          <p> Read what we say in our  blog</p>

        </div>

       </div>

    </div>

     <div class="row">

     <div class="col-lg-12 col-md-12">

      <div class="owl-carousel-2">

   <div class="item">

    <div class="blog-box">

     <div class="blog-info">

      <h4 class="text-black mb-30"> <a href="#"> Does your life lack meaning</a></h4>

     <span><i class="fa fa-user"></i> By The Corps</span>

     <span><i class="fa fa-calendar-check-o"></i> 21th April 2016 </span>

     <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with amazing talents who realize only a small percentage of their potential this truth.</p>

     <a class="blog-btn" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>

      </div> 

      <div class="blog-box-img" style="background-image:url(images/blog/01.jpg);"></div>

         <span class="border"></span>

    </div>

   </div>

   <div class="item">

    <div class="blog-box active ">

     <div class="blog-info">

      <h4 class="text-black mb-30"> <a href="#"> Supercharge your motivation</a></h4>

     <span><i class="fa fa-user"></i> By The Corps</span>

     <span><i class="fa fa-calendar-check-o"></i> 21th April 2016 </span>

     <p>We also know those epic stories, those modern-day legends surrounding the early failures of such supremely successful folks as Michael Jordan and Bill Gates. We can look a bit further back in time to Albert Einstein. </p>

     <a class="blog-btn" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>

      </div> 

      <div class="blog-box-img" style="background-image:url(images/blog/02.jpg);"></div>

         <span class="border"></span>

    </div>

   </div>

   <div class="item">

    <div class="blog-box">

      <div class="blog-info">

        <h4 class="text-black mb-30"> <a href="#">  Helen keller a teller & a seller </a></h4>

     <span><i class="fa fa-user"></i> By The Corps</span>

     <span><i class="fa fa-calendar-check-o"></i> 21th April 2016 </span>

     <p>I truly believe Augustine’s words are true and if you look at history you know it is true. There are many people in the world with amazing talents who realize only a small percentage of their potential orld with amazing.</p>

     <a class="blog-btn" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>

      </div>

      <div class="blog-box-img" style="background-image:url(images/blog/03.jpg);"></div>

         <span class="border"></span>

    </div>

   </div>

   <div class="item">

    <div class="blog-box">

      <div class="blog-info">

        <h4 class="text-black mb-30"> <a href="#"> Lost the secret of dazzling </a></h4>

     <span><i class="fa fa-user"></i> By The Corps</span>

     <span><i class="fa fa-calendar-check-o"></i> 21th April 2016 </span>

     <p>Positive pleasure-oriented goals are much more powerful motivators than negative fear-based ones. Although each is successful separately, the right combination of both is the most powerful motivational force known.</p>

     <a class="blog-btn" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>

      </div>

      <div class="blog-box-img" style="background-image:url(images/blog/04.jpg);"></div>

         <span class="border"></span>

    </div>

   </div>

   <div class="item">

    <div class="blog-box">

      <div class="blog-info">

        <h4 class="text-black mb-30"> <a href="#">Does your life lack meaning</a></h4>

     <span><i class="fa fa-user"></i> By The Corps</span>

     <span><i class="fa fa-calendar-check-o"></i> 21th April 2016 </span>

     <p>Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when things don’t go.</p>

     <a class="blog-btn" href="#">Read more <i class="fa fa-long-arrow-right"></i></a>

      </div>   

      <div class="blog-box-img" style="background-image:url(images/blog/05.jpg);"></div> 

         <span class="border"></span>

    </div>

     </div>

    </div>

     </div>

    </div>

 </div>

</section>

-->

 <!--=================================

 Our Blog -->

 



<!--=================================

 contact-->



<section id="contact" class="contact bg-2 bg-opacity-black-70 page-section-ptb">

   <div class="container">

     <div class="row">

       <div class="col-lg-4 col-md-4 col-sm-4">

         <div class="get-in-touch">

           <h2 class="text-white">Get in Touch</h2>

           <p class="text-white pt-20 pb-20">If you have any question about Laser Skin Care, please fill out this form below. We'll reply as soon as we can.</p>

         </div>

         <div class="contact-add">

           <i class="fa fa-map-marker"></i>

           <p class="text-white">2nd floor, Balakrishnan Hospital

100 feet Road, Tatabad, Coimbatore</p>

         </div>

         <div class="contact-add">

           <i class="fa fa-phone"></i>

           <p class="text-white"> 0422 6577789<br/>0422 4371789 <br>936 2666 789</p>
         </div>

         <div class="contact-add">

           <i class="fa fa-envelope-o"></i>

           <p class="text-white">1800 102 3789 (Toll free)</p>

         </div>

       </div>

       <div class="col-lg-8 col-md-8 col-sm-8">

        <h2 class="text-white">Contact Us</h2>

           <p class="text-white pt-20 pb-20">It would be great to hear from you! If you got any questions, please do not hesitate to send us a message. We are looking forward to hearing from you! We reply within <span class="tooltip-content-2" data-placement="top" data-toggle="tooltip" data-original-title="Mon-Fri 10am–7pm (GMT +1)"> 24 hours !</span></p>

         <div class="contact-form" id="contact-form">

          

           <div class="section-field">

            <i class="fa fa-user"></i>

            <input type="text" name="name" placeholder="Name*" id="name">

           </div> 

           <div class="section-field">

              <i class="fa fa-envelope-o"></i>

              <input type="email" name="email" placeholder="Email*" id="email">

            </div>

           <div class="section-field">

              <i class="fa fa-file-text-o"></i>

              <input type="text" name="web" placeholder="Web*" class="web" id="web">

            </div>

           <div class="section-field textarea mb-20">

             <i class="fa fa-pencil"></i>

             <textarea name="message" rows="5" placeholder="Comment*" class="input-message" id="message"></textarea>

            </div>

            <a class="button-border" href="#">

            <span>Send your message</span>

          </a>

         </div>

       </div>

     </div>

   </div>

</section>



<!--=================================

 contact-->

 



<!--=================================

 footer -->



<footer class="footer-widget">

   <div class="container"> 

    <div class="row">

      <div class="col-lg-12 col-md-12 text-center">

        <p class="text-white mt-15 mb-20"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> Dr.THAJ</a> All Rights Reserved </p>

      </div>

      <div class="col-lg-12 col-md-12  text-center">


            <a href="login/privacy_policy.php" style="color: #fff;  font-size: 12px;" >Privacy Policy</a>|
            
             <a href="login/terms_conditions.php"style="    color: #fff;  font-size: 12px;">Terms and Conditions</a>
      </div>

      <div class="col-lg-12 col-md-12">

        <div class="footer-widget-social">

         <ul> 

          <li><a href="#" data-tooltip="facebook"><i class="fa fa-facebook"></i></a></li>

          <li><a href="#" data-tooltip="twitter"><i class="fa fa-twitter"></i></a></li>

          <li><a href="#" data-tooltip="Pinterest"><i class="fa fa-pinterest-p"></i> </a></li>        

          <li><a href="#" data-tooltip="linkedin"><i class="fa fa-linkedin"></i> </a></li>

         </ul>

       </div>

      </div>

    </div>    

   </div>

 

</footer>



<!--=================================

 footer -->

 



 </div>



<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a></div>

  <span id="dataresponse"></span>

<!--=================================

 jquery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 

<!-- jquery  -->

<script type="text/javascript" src="js/jquery.min.js"></script>

 

<!-- bootstrap -->

<script type="text/javascript" src="js/bootstrap.min.js"></script>



<!-- plugins-jquery -->

<script type="text/javascript" src="js/plugins-jquery.js"></script>



<!-- appear -->

<script src="js/jquery.appear.js"></script>



<!-- portfolio -->

<script type="text/javascript" src="js/portfolio/jquery.mCustomScrollbar.concat.min.js"></script>



<!-- hover -->

<script type="text/javascript" src="js/portfolio/jquery.directional-hover.js"></script>

 

<!-- popup -->

<script src="js/popup/jquery.magnific-popup.js"></script>



<!-- counter -->

<script src="js/counter/jquery.countTo.js"></script>



<!-- Wow paralax --> 

<script type="text/javascript" src="js/wow.min.js"></script>



<!-- Style Customizer --> 

<script type="text/javascript" src="js/style-customizer.js"></script> 



<!-- revoluation -->

<script type="text/javascript" src="js/revolution/rs-plugin/js/jquery.themepunch.tools.min.js"></script>   

<script type="text/javascript" src="js/revolution/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

 

 <!-- custom -->

<script type="text/javascript" src="js/custom.js"></script>

 

<script type="text/javascript">

        jQuery(document).ready(function() {

          jQuery('.tp-banner').show().revolution(

          {

            dottedOverlay:"none",

            delay:9000,

            startwidth:1270,

            startheight:540,

            hideThumbs:200,

            thumbWidth:100,

            thumbHeight:50,

            thumbAmount:5,

            

            navigationType:"off",

            navigationArrows:"solo",

            navigationStyle:"preview4",

            

            touchenabled:"on",

            onHoverStop:"on",

            

            swipe_velocity: 0.7,

            swipe_min_touches: 1,

            swipe_max_touches: 1,

            drag_block_vertical: false,

                        

                        parallax:"mouse",

            parallaxBgFreeze:"on",

            parallaxLevels:[7,4,3,2,5,4,3,2,1,0],

                        

            keyboardNavigation:"off",

            

            navigationHAlign:"center",

            navigationVAlign:"bottom",

            navigationHOffset:0,

            navigationVOffset:20,



            soloArrowLeftHalign:"left",

            soloArrowLeftValign:"center",

            soloArrowLeftHOffset:20,

            soloArrowLeftVOffset:0,



            soloArrowRightHalign:"right",

            soloArrowRightValign:"center",

            soloArrowRightHOffset:20,

            soloArrowRightVOffset:0,

                

            shadow:0,

            fullWidth:"off",

            fullScreen:"off",



            spinner:"spinner4",

            

            stopLoop:"off",

            stopAfterLoops:-1,

            stopAtSlide:-1,



            shuffle:"off",

            

            autoHeight:"off",           

            forceFullWidth:"off",   

            hideThumbsOnMobile:"off",

            hideNavDelayOnMobile:1500,            

            hideBulletsOnMobile:"off",

            hideArrowsOnMobile:"off",

            hideThumbsUnderResolution:0,

            

            hideSliderAtLimit:0,

            hideCaptionAtLimit:0,

            hideAllCaptionAtLilmit:0,

            startWithSlide:0,

            fullScreenOffsetContainer: ".header"  

          });

        }); 

      </script>

 

</body>

</html>

<?php } ?> 