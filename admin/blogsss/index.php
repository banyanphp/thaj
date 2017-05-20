<?php
@include("config.php");
@include("user_sessioncheck.php");
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--<base href="http://www.build99.com/">-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Construction and building material suppliers and manufacturers in India - Build99</title>
<meta name="description" content="Build99 is India's largest building and construction materials procurement website. Find B2B directory and  listing of suppliers, dealers and manufacturers. Post your requirement to get best deals and lowest price for construction materials and services.">
<meta name="Keywords" content="India B2B directory, India B2C, E commerce in India, Construction materials online, building materials online, India building material supplier, Building materials manufacturers, construction material suppliers, Indian suppliers, India manufacturers, free supplier listing India, free manufacturer listing India, lowest price for construction material, Lowest price for building products.">
<meta name="author" content="BUILD99.COM | K Ventures">
<meta name="google-site-verification" content="_nftxJxGUG48s5sigUwnylFDXbVVZ0UkhIDneEsLFI8" />
 <meta name="alexaVerifyID" content="9r_zMsFs2c3gob5yrsIMYD8B-7Y"/>
<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!-- service menu -->
<script src="js/jquery-1.11.1.min.js.js"></script>
<script src="js/menu-animation.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52457804-1', 'auto');
  ga('send', 'pageview');
</script>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"SSaXj1a0CM00qz", domain:"build99.com",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=SSaXj1a0CM00qz" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('.success').delay(12000).hide();
      });
    </script>

<meta name="google-site-verification" content="_nftxJxGUG48s5sigUwnylFDXbVVZ0UkhIDneEsLFI8" />
</head>

<?php
$uname_active = $_REQUEST['username']; 
$code_active = $_REQUEST['activation']; 	

	$code=mysql_query("SELECT fld_userid FROM tbl_users WHERE fld_activationcode='$code_active' and fld_userstatus =0");
	
	if(mysql_num_rows($code) > 0)
	{
	
	$count=mysql_query("SELECT fld_userid FROM tbl_users WHERE fld_activationcode='$code_active' and fld_userstatus='0'");
	
		if(mysql_num_rows($count) == 1)
		{
		mysql_query("UPDATE tbl_users SET fld_userstatus='1' WHERE fld_activationcode='$code_active'");
          
		echo '<div class="success" style="text-align:center; background-color:#a2d246">Your account is Activated</div>';
		
		//echo "Your account is activated";	
		}	
	
	}
?>


<body>
<div class="pagesite">
<!----- Header ------>
<?php
@include("header.php");
?>
<!----- End of Header ------>

<!----- Nav ------>

<?php
@include("menu.php");
?>

<!----- End of Nav ------>

<!----- Banner ------>

<?php
@include("banner.php");
 ?>
<div class="clearfix"></div>

<!----- End of Banner ------>

<!----- Video Section ------>



<!----- Buttons ------>
<!-----  <div class="joinsection">
    <div class="container">
   		 <div class="row">
         <div class="col-md-6">
         <a href=""><img src="images/post_btn.png" ></a>
         </div>

          <div class="col-md-6">
         <a href=""> <img src="images/join_btn.png"></a>
         </div>

         </div>
    </div>
</div> ------>
<!----- End of Buttons ------>

<!----- Services ------>
<div class="servicesection">
    <div class="container">
       <div class="servicessection">
    
<div class="tab-content">
<div class="tab-pane active" id="civil">
<div class="serviceinnernav">

        <!--<div class="col-xs-9 tabcontainerlist1">
            
                <div class="tab-content">
                    <div id="civil1" class="tab-pane active">
                    
                        <a href="Leading-Civil-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-5">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/CIVIL.jpg" title="Civil"></div>
                        <div class="productcontact1">CIVIL</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Electricals-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-12">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/electricals.jpg" title="Electricals"></div>
                        <div class="productcontact1">ELECTRICALS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Flooring-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-1">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/flooring.jpg" title="Flooring"></div>
                        <div class="productcontact1">FLOORING</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Paints-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-4">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/PAINTS.jpg" title="Paints"></div>
                        <div class="productcontact1">PAINTS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Doors-Windows-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-9">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/DOORS_WINDOWS.jpg" title="Doors &amp; Windows"></div>
                        <div class="productcontact1">DOORS &amp; WINDOWS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Pipes-Fittings-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-11">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/PIPES-FITTINGS.jpg" title="PIPE FITTINGS"></div>
                        <div class="productcontact1">PIPES &amp; FITTINGS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Lights-Fans-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-3">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/lights-fans.jpg" title="Lights & Fans"></div>
                        <div class="productcontact1">LIGHTS &amp; FANS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Sanitaryware-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-6">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/SANITARY_WARE.jpg" title="Sanitaryware"></div>
                        <div class="productcontact1">SANITARY WARE</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Glass-Plywood-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-2">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/PLYWOOD.jpg" title="PLYWOOD"></div>
                        <div class="productcontact1">GLASS &amp; PLYWOOD</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Power-Backup-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-8">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/BATTERY.jpg" title="Power Backup"></div>
                        <div class="productcontact1">POWER BACKUP</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Hardware-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-7">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/HARDWARE.jpg" title="HARDWARE"></div>
                        <div class="productcontact1">HARDWARE</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Security-Automation-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-10">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/FIRE.jpg" title="SECURITY"></div>
                        <div class="productcontact1">SECURITY</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Pumps-Motors-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-13">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/motors-build99.jpg" title="MOTORS"></div>
                        <div class="productcontact1">PUMPS &amp; MOTORS</div>
                    	</div>
                        </a>
                        
                        <a href="buidingservices.php">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/BUILDING EQUIPMENTS.jpg" title="BUILDING EQUIPMENTS"></div>
                        <div class="productcontact1">BUILDING SERVICES</div>
                    	</div>
                        </a>
                        
                        <a href="maintanence-services.php">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/BUILDING MAINTENCE.jpg" title="MAINTENCE"></div>
                        <div class="productcontact1">MAINTENANCE</div>                        
                    	</div>
                        </a>
                        
                	</div>
            	</div>
            </div>

            
      </div>-->
	  
	  <div class="col-xs-9 tabcontainerlist1">
            
                <div class="tab-content">
                    <div id="civil1" class="tab-pane active">
                    
                        <a href="Leading-Civil-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-5">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/civil-build99.jpg" title="Civil"></div>
                        <div class="productcontact1">CIVIL</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Electricals-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-12">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/electrricals-build99.jpg" title="Electricals"></div>
                        <div class="productcontact1">ELECTRICALS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Flooring-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-1">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/flooring-build99.jpg" title="Flooring"></div>
                        <div class="productcontact1">FLOORING</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Paints-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-4">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/paints-build99.jpg" title="Paints"></div>
                        <div class="productcontact1">PAINTS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Doors-Windows-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-9">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/doors-windows-build99.jpg" title="Doors &amp; Windows"></div>
                        <div class="productcontact1">DOORS &amp; WINDOWS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Pipes-Fittings-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-11">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/pipes-fittings-build99.jpg" title="PIPE FITTINGS"></div>
                        <div class="productcontact1">PIPES &amp; FITTINGS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Lights-Fans-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-3">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/lights-fans-build99.jpg" title="Lights & Fans"></div>
                        <div class="productcontact1">LIGHTS &amp; FANS</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Sanitaryware-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-6">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/sanitaryware-build99.jpg" title="Sanitaryware"></div>
                        <div class="productcontact1">SANITARY WARE</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Glass-Plywood-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-2">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/plywood-build99.jpg" title="PLYWOOD"></div>
                        <div class="productcontact1">GLASS &amp; PLYWOOD</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Power-Backup-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-8">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/power-backup-build99.jpg" title="Power Backup"></div>
                        <div class="productcontact1">POWER BACKUP</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Hardware-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-7">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/hardware-build99.jpg" title="HARDWARE"></div>
                        <div class="productcontact1">HARDWARE</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Security-Automation-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-10">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/security-automation-build99.jpg" title="SECURITY"></div>
                        <div class="productcontact1">SECURITY</div>
                    	</div>
                        </a>
                        
                        <a href="Leading-Pumps-Motors-Suppliers-For-all-major-brands-in-<?php echo $selectedcity;?>-13">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/pumps-motors-build99.jpg" title="MOTORS"></div>
                        <div class="productcontact1">PUMPS &amp; MOTORS</div>
                    	</div>
                        </a>
                        
                        <a href="buidingservices.php">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/building-services-build99.jpg" title="BUILDING EQUIPMENTS"></div>
                        <div class="productcontact1">BUILDING SERVICES</div>
                    	</div>
                        </a>
                        
                        <a href="maintanence-services.php">
                        <div class="productslist1">
                        <div class="prductimg1"><img src="vectoricons/maintenance-build99.jpg" title="MAINTENCE"></div>
                        <div class="productcontact1">MAINTENANCE</div>                        
                    	</div>
                        </a>
                        
                	</div>
            	</div>
            </div>

            
      </div>
	  
	  
	  </div>

</div>

   
        </div>
            <a href="Finolex-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-13" title="Finolex">

      <div class="advert3"> <img id="imgcss" src="sidebanner-images/FINOLEX_SUPER_ELECTRICALS.jpg" /></div>
      </a>
          <a href="#">

     <div class="advert3"><img id="imgcss" src="sidebanner-images/MARBLESS_MANDEEP.jpg" /></div>
     </a>
         <a href="#">

      <div class="advert82"><img id="imgcss" src="sidebanner-images/ASHIRWAD_PIPES_SRI_PAUL.jpg" /></div>
      </a>
    </div>
</div>
<!----- End of Services ------>


<!----- Slide service Section ------>
<div class="slideservice">

<div class="container">
<div class="productslide">
     <div class="row">
     <div class="productheadingslide">
         <span class="ourservice">MAINTENANCE SERVICES</span>
     </div>
     </div>
		<div class="">
                <div id="Carousel" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">

                <div class="item active">
                	<div class="">
                    
                        <a href="Carpenters_in_<?php echo $selectedcity;?>_16_4">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/carpenter.jpg" title="Carpenters"></div>
                            <div class="productcontact2" align="center">Carpenters</div>							
                        </div>
                        </a>
                        
                        <a href="Electricians_in_<?php echo $selectedcity;?>_16_2">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/electrician.jpg" title="Electricians"></div>
                            <div class="productcontact2" align="center">Electricians</div>
                        </div>
                        </a>
                       <!-- <div class="productslist2">
                            <div class="prductimg2"><a href="#"><img src="building_services/Build99-meason.jpg" title="Mason"></a></div>
                            <div class="productcontact2" align="center">Mason</div>
                        </div>
                        -->
                        <a href="Painters_in_<?php echo $selectedcity;?>_16_3">
                         <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/painter.jpg" title="Painters"></div>
                            <div class="productcontact2" align="center">Painters</div>
                        </div>
                        </a>
                        
                        <a href="Plumbers_in_<?php echo $selectedcity;?>_16_1">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/plumber.jpg" title="Plumbers"></div>
                            <div class="productcontact2" align="center">Plumbers</div>
                        </div>
                        </a>
                	 <!-- <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/carpenter-build99.jpg" alt="Carpenter-build99" style="max-width:100%;"></a>
                      </div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/electrician-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/meason-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/painter-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                      <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/plumber-build99.jpg" alt="Image" style="max-width:100%;"></a></div>-->
                	</div><!--.row-->
                </div><!--.item-->
                              

                </div><!--.carousel-inner-->
                  <!--<a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>-->
                </div><!--.Carousel-->

		</div>

</div>

 <div class="advert3"><img src="sidebanner-images/ANUJ_TILES.jpg" id="imgcss"/></div>
   <a href="Kundan Cab-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-5" title="Kundan Cab">
 <div class="advert3"><img src="sidebanner-images/KUNDAN_CABS_MANOJ_ELECTRICALS.jpg" id="imgcss"/></div>
 </a>
  
</div>
</div>
<!----- End of slide service Section ------>

<div class="container">
<div class="container660">
<div class="wrap3 height300"> <img id="imgcss" src="home-images/gold_medal.jpg" />
</div>
<div class="wrap6 height300">

   <div id="myCarousel23" class="carousel slide innercarsoulmiddle carousel-fade">
  <!-- Carousel items -->
  <div class="carousel-inner">
  
    <div class="active item">
        <img id="imgcss" src="home-images/apploo_paints.jpg" />
    </div>
     <div class="item">
        <img id="imgcss" src="home-images/godrej_locks.jpg" />
    </div>
     <div class="item">
        <img id="imgcss" src="home-images/Dr-fix-it.jpg" />
    </div>
   
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel23" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel23" data-slide="next">&rsaquo;</a>
</div>
</div>
<a href="V Guard-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-70" title="V-Guard">
<div class="wrap3 height300">
<img id="imgcss" src="home-images/v-guard-build99.jpg" />
</div>
</a>
</div>
<a href="Nippon Paints-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-49" title="Nippon Paints">
   <div class="advert3 height100">
   <img src="home-images/nippon paints.jpg" />
   </div>
   </a>
  
</div>
<div class="slideservice">

<div class="container">
  <div class="container660" style="margin-bottom: 0px;">
     <div class="widgetHeader" id="frequently-bought-div">
 <div class="combo-viewed-arrow"><h3>BUILDING SERVICES</h3></div>

     </div>
<div class="productslide borderall0">
		<div class="">
                <div id="Carouselll" class="carousel slide prdslidelist">
                <!-- Carousel items -->
                <div class="carousel-inner">
                <div class="item active">
                	<div class="">
                    
                        <a href="Architects-in-<?php echo $selectedcity;?>-15-1">
                        
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-architect.jpg" title="Architects"></div>
                            <div class="productcontact2" align="center">Architects</div>
                        </div>
                        </a>
                        
                        <a href="Contractors-in-<?php echo $selectedcity;?>-15-2">
                         <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-building contractor.jpg" title="Contractors"></div>
                            <div class="productcontact2" align="center">Contractors</div>
                        </div>
                        </a>
                        
                        <a href="Engineers-in-<?php echo $selectedcity;?>-15-3">                        
                         <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-engineer.jpg" title="Engineers"></div>
                            <div class="productcontact2" align="center">Engineers</div>
                        </div>
                        </a>
                        
                        <a href="Interior Designer-in-<?php echo $selectedcity;?>-15-4">
                         <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-interior-designer.jpg" title="Interior Designer"></div>
                            <div class="productcontact2" align="center">Interior Designers</div>
                        </div>
                        </a>
                        
                        <a href="Vastu-in-<?php echo $selectedcity;?>-15-5">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-vatu.jpg" title="Vastu"></div>
                            <div class="productcontact2" align="center">Vastu</div>
                        </div>
                        </a>
                        
                                                                       
                	<!--  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/architect-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/builder-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/electrical contractor-build99.jpg" alt="Image" style="max-width:100%;"></a></div>
                	  <div class="col-md-2"><a href="#" class="thumbnail"><img src="building_services/engineer-build99.jpg" alt="Image" style="max-width:100%;"></a></div>-->
                	</div><!--.row-->
                </div><!--.item-->
                     <div class="item">
                	<div class="">
                    <a href="3D Designers-in-<?php echo $selectedcity;?>-15-6">
                       <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-3D-Designers.jpg" title="3D Designers"></div>
                            <div class="productcontact2" align="center">3D Designers</div>
                        </div>
                        </a>

                        <a href="Building Cost Estimation-in-<?php echo $selectedcity;?>-15-7">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-buildingcostestination.jpg" title="Building Cost Estimation"></div>
                            <div class="productcontact2" align="center">Building Cost Estimation</div>
                        </div>
                        </a>
                        
                        <a href="Security Services-in-<?php echo $selectedcity;?>-15-8">
                         <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-security.jpg" title="Security Services"></div>
                            <div class="productcontact2" align="center">Security Services</div>
                        </div>
                        </a>
                        
                        <a href="Landscape Designers-in-<?php echo $selectedcity;?>-15-9">
                        <div class="productslist2">
                            <div class="prductimg2"><img id="mbservices" src="building_services/build99-landscape.jpg" title="Landscape Designers"></div>
                            <div class="productcontact2" align="center">Landscape Designers</div>
                        </div>
                        </a>
                    
                    </div>
                    </div>
              
                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carouselll" class="left carousel-control">‹</a>
                  <a data-slide="next" href="#Carouselll" class="right carousel-control">›</a>
                </div><!--.Carousel-->

		</div>

</div><!--.container-->
  </div>
  <div class="advert3"><img src="sidebanner-images/TILE ADHEIVE_RENUKA.jpg" id="imgcss"/></div>
   <div class="advert3" style="height:52px"><img src="home-images/listproducts.jpg" id="imgcss"/></div>
</div>






</div>
<div class="container">
<div class="container660">
<div class="wrap8 height200">
          <div id="myCarousel2" class="carousel slide innercarsoullower carousel-fade">
  <!-- Carousel items -->
  <div class="carousel-inner">
  <div class="active item">
        <img src="home-images/shenlac.jpg" />
    </div>
 
    <div class="item">
         <a href="Hager-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-3" title="hager">
        <img src="home-images/hager.jpg" />
		    </a>        
    </div>


    <div class="item">
          <a href="Schender-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-7" title="Schender">
        <img src="home-images/schender.jpg" />
            </a>
    </div>

     <div class="item">
        <img src="home-images/DOOR_KINGS.jpg" />
    </div>
    <div class="item">
        <img src="home-images/shalimar.jpg" />
    </div>
     <div class="item">
        <img src="home-images/tiles-build99.jpg" />
    </div>
    
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel2" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel2" data-slide="next">&rsaquo;</a>
</div>
</div>
<div class="wrap4 height200"><img src="home-images/DOORS_PLYWOODS.jpg" id="imgcss"/></div>
</div>

		    <a href="Anchor-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-2" title="Anchor">
      <div class="advert2  height200"><img src="home-images/anchor.jpg" id="imgcss"/></div>
      </a>
       <a href="GM Switches-Dealers-and-Suppliers-in-<?php echo $selectedcity;?>-20" title="GM Switches">
       <div class="advert2  height200"><img src="home-images/Gm Modular switches.jpg" id="imgcss"/></div>
       </a>
      <!-- <div class="advert6"><img src="sidebanner-images/DOORS_PLYWOODS.jpg" id="imgcss"/></div>-->

</div>
</div>
<!----- end of pagesite  ------>

<!----- footer ------>
<?php @include("footer.php"); ?>
<!----- End of footer ------>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>$('#myModal').modal(options)</script>
<script>
var num = 560; //number of pixels before modifying styles

$(window).bind('scroll', function () {
    if ($(window).scrollTop() > num) {
        $('.searchnav').addClass('showit');
    } else {
        $('.searchnav').removeClass('showit');
    }
});


var $content= $('div.menuDescription');
var $links=$('.menu-link').hover(function(){
   /* "this" is element being hovered*/
   var index= $links.index(this);
   $content.stop().hide().eq(index).fadeIn();
},function(){
   /* not sure if you want to leave current content visible if user leaves menu, if so do nothing here*/
})


          $(document).ready(function() {
    $('#Carousel').carousel({
        interval: 3000
    })
    
     $('#Carousell').carousel({
        interval: 3000
    })

});
 $(document).ready(function() {
    $('#myCarousel23').carousel({
        interval: 3000
    })
});
 $(document).ready(function() {
    $('#myCarousel2').carousel({
        interval: 3000
    })
});
</script>
<script language="Javascript" type="text/javascript">
        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        } 

</script>
<script type="text/javascript">
function fn_requirements()
{
		var f = document.postrequirementform;	
		if(f.txtname.value == "")
		{
			f.txtname.style.borderColor = "red";			
			f.txtname.focus();				
			return false;				
		}
		else
		{
       		f.txtname.style.borderColor ="green";
		}
		
		if(isNaN(f.txtmobile.value)||f.txtmobile.value.indexOf(" ")!=-1)
		{
			f.txtmobile.style.borderColor = "red";						
			f.txtmobile.focus();
			return false; 
		}
		else
		{
       		f.txtmobile.style.borderColor ="green";
		}
		
		if (f.txtmobile.value == "")
		{
			f.txtmobile.style.borderColor = "red";
			f.txtmobile.focus();
			return false;
		}
		
		else
		{
       		f.txtmobile.style.borderColor ="green";
		}
		
		if (f.txtmobile.value.length<10)
		{
			f.txtmobile.style.borderColor = "red";
			f.txtmobile.focus();
			return false;
		}
		
		else
		{
       		f.txtmobile.style.borderColor ="green";
		}
		
		if (f.txtemail.value == "")
		{
			f.txtemail.style.borderColor = "red";
			f.txtemail.focus();
			return false;	
		}
		
		else
		{
       		f.txtemail.style.borderColor ="green";
		}
		
		if (isValidEmail(f.txtemail.value) == false)
		{
			f.txtemail.style.borderColor = "red";
			f.txtemail.focus();
			return false;			
		}
		else
		{
       		f.txtemail.style.borderColor ="green";
		}
		
		function isValidEmail(val)
		{
		var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
			if (!val.match(re))
			{
				return false;
			} 
		}
		if(f.selcity.value=="")
		{
			f.selcity.style.borderColor = "red";
			f.selcity.focus();
			return false;
		}
		else
		{       	
			f.selcity.style.borderColor ="green";
		}
		if(f.selcategory.value=="")
		{
			f.selcategory.style.borderColor = "red";
			f.selcategory.focus();
			return false;
		}
		else
		{
			f.selcategory.style.borderColor ="green";
		}
		var fileName = document.getElementById('postreq_file').value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		if(ext == "doc" || ext == "docx" || ext == "pdf" || ext == "odt" || ext == "ods" || ext == "odp")
		{
			f.postreq_file.style.borderColor ="green";
		} 
		else
		{
			f.postreq_file.style.borderColor = "red";
			alert("You should upload only doc and ios format");
			f.postreq_file.focus();
			return false;
		}
		if(f.txtcomments.value=="")
		{
			f.txtcomments.style.borderColor = "red";
			f.txtcomments.focus();
			return false;
		}
		else
		{
       		f.txtcomments.style.borderColor ="none";
		}		
		f.action = "postrequirement.php";
		f.method = "post";
		f.submit();	
}
</script>
<script type="text/javascript">
    jQuery(function ($) {
        $('#carousel1').carousel({
            interval: 2000
        });

        var clickEvent = false;

        $('#carousel1').on('click', '.nav a', function () {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');
        }).on('slid.bs.carousel', function (e) {
            if (!clickEvent) {
                var count = $('.nav').children().length - 1;
                var current = $('.nav li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    $('.nav li').first().addClass('active');
                }
            }
            clickEvent = false;
        });
    });
</script>
</div>


<!-- Login -->
   
<!-- End of Login-->

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
<style>
.productcontact1
{
    color: black;
}
.productcontact2
{
    color: black;
}
</style>
<?php @include("postrequirement.php"); ?>
<script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
</body>
</html>