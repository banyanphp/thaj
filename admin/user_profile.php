<?php
@include("config.php");
include('common.php');
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
error_reporting(E_ALL ^ E_NOTICE);
$oper =$_REQUEST['hidoper'];
if($oper=='1')
	{
	$name=$_REQUEST["u_fname"];
	$uemail=$_REQUEST["u_email"];
	$pswd = $_REQUEST["u_password"];	
	$phone = $_REQUEST["u_phone"];	
	$mobile = $_REQUEST["u_mobile"];
	$city = $_REQUEST["u_city"];
	//$description = $_REQUEST["u_desc"];
	$description = $_REQUEST["u_desc"];
	$estyear = $_REQUEST["u_estyr"];
	$address = $_REQUEST["u_addr"];
	$pincode = $_REQUEST["u_pincode"];
	$website = $_REQUEST["u_website"];
	$about = $_REQUEST["u_signatur"];
	
	$activation=md5($email.time());
	
	$chkuser = selectsinglevalue("SELECT count(*) as retv FROM tbl_supplierregister where fld_email='$email'");
	if($chkuser >=1)
		{
		$updatesupplier = "Update tbl_supplierregister SET fld_fname='$name',fld_email='$uemail',fld_pswd='$password',fld_phone='$phone',fld_mobile='$mobile',fld_city='$city',fld_description='$description',fld_address='$address',fld_estyear='$estyear',fld_pincode='$pincode',fld_swebsite='$website' where fld_email='$email'";
		
				$result=mysql_query($updatesupplier);		
		}	
			
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Build99 Admin Panel</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
        <!-- enhanced select -->
            <link rel="stylesheet" href="lib/chosen/chosen.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
            
        <!-- gebo color theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
            <script src="js/ie/respond.min.js"></script>
        <![endif]-->
        
        <script>
            //* hide all elements & show preloader
            document.documentElement.className += 'js';
        </script>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>
        
        
        <div id="maincontainer" class="clearfix">
            <!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.php"><i class="icon-home icon-white"></i> Build99 <?php echo $uname; ?></a>
                            <ul class="nav user_menu pull-right">
                                
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                 <?php if($uname!="")								
								{									
								?>                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $uname;?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="user_profile.php">My Profile</a></li>                                  
                                    <li class="divider"></li>
                                    <li><a href="index.php">Log Out</a></li>
                                    </ul>
                                </li>
                                <?php
								}
								?>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New messages</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                        <table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Size</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Declan Pamphlett</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>23/05/2012</td>
                                    <td>25KB</td>
                                </tr>
                                <tr>
                                    <td>Erin Church</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>24/05/2012</td>
                                    <td>15KB</td>
                                </tr>
                                <tr>
                                    <td>Koby Auld</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>28KB</td>
                                </tr>
                                <tr>
                                    <td>Anthony Pound</td>
                                    <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                                    <td>25/05/2012</td>
                                    <td>33KB</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to mailbox</a>
                    </div>
                </div>
                <div class="modal hide fade" id="myTasks">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>New Tasks</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>

                        <table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Summary</th>
                                    <th>Updated</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P-23</td>
                                    <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
                                    <td>23/05/2012</td>
                                    <td class="tac"><span class="label label-important">High</span></td>
                                    <td>Open</td>
                                </tr>
                                <tr>
                                    <td>P-18</td>
                                    <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Reopen</td>
                                </tr>
                                <tr>
                                    <td>P-25</td>
                                    <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
                                    <td>22/05/2012</td>
                                    <td class="tac"><span class="label label-success">Low</span></td>
                                    <td>Updated</td>
                                </tr>
                                <tr>
                                    <td>P-10</td>
                                    <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
                                    <td>17/05/2012</td>
                                    <td class="tac"><span class="label label-warning">Medium</span></td>
                                    <td>Open</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0)" class="btn">Go to task manager</a>
                    </div>
                </div>
            </header>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">                  
                    
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="heading">User Profile</h3>
                            
                            
                            <?php 
							if($email!="")
							{
								
							$sql = mysql_query("Select distinct fld_fname,fld_email,fld_pswd,fld_phone,fld_mobile,fld_city,fld_bstype,fld_description,fld_estyear,fld_address,fld_pincode,fld_slogo,fld_swebsite from tbl_supplierregister supplier where supplier.fld_email='$email'");									
							
							while($row=mysql_fetch_array($sql))
							{	
							 $fname=$row['fld_fname']; 
							$email = $row['fld_email'];
							$password = $row['fld_pswd'];							
							$phone = $row['fld_phone'];
							$mobile= $row['fld_mobile'];							
							$city= $row['fld_city'];
							$bstype = $row['fld_bstype'];
							$description= $row['fld_description'];
							$estyear= $row['fld_estyear'];
							$address = $row['fld_address'];
							$pincode= $row['fld_pincode'];
							$logo= $row['fld_slogo'];
							$website= $row['fld_swebsite'];
							//$about= $row['fld_about'];

							}
							?>                            
                            
                            <div class="row-fluid">
                                <div class="span8">
                                    <form class="form-horizontal" id="form1" name="form1">
                                        <fieldset>
                                            <div class="control-group formSep">
                                                <label class="control-label">Username</label>
                                                <div class="controls text_line">
                                                    <strong><?php echo $fname;?></strong>
                                                </div>
                                            </div>
                                            <div class="control-group formSep">
                                                <label for="fileinput" class="control-label">User profile</label>
                                                <div class="controls">
                                                    <div data-provides="fileupload" class="fileupload fileupload-new">
                                                        <input type="hidden" />
                                                        <div style="width: 80px; height: 80px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" /></div>
                                                        <div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                                                        <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="fileinput" name="fileinput" /></span>
                                                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="control-group formSep">
                                                <label for="u_fname" class="control-label">Full name</label>
                                                <div class="controls">
                                                    <input type="text" id="u_fname" class="input-xlarge" value="<?php echo $fname;?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_email" class="control-label">Email</label>
                                                <div class="controls">
                                                    <input type="text" id="u_email" class="input-xlarge" value="<?php echo $email;?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_password" class="control-label">Password</label>
                                                <div class="controls">
                                                    <div class="sepH_b">
                                                        <input type="password" id="u_password" class="input-xlarge" <?php echo $password;?>/>
                                                        <span class="help-block">Enter your password</span>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="control-group formSep">
                                                <label for="u_phone" class="control-label">Phone</label>
                                                <div class="controls">
                                                    <input type="text" id="u_phone" class="input-xlarge" value="<?php echo $phone;?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_mobile" class="control-label">Mobile</label>
                                                <div class="controls">
                                                    <input type="text" id="u_mobile" class="input-xlarge" value="<?php echo $mobile;?>"/>
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_city" class="control-label">City</label>
                                                <div class="controls">
                                                    <input type="text" id="u_city" class="input-xlarge" value="<?php echo $city;?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_desc" class="control-label">Description</label>
                                                <div class="controls">
                                                   <textarea rows="4" id="u_desc" class="input-xlarge"><?php echo $description;?></textarea>                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_estyr" class="control-label">Establishment Year</label>
                                                <div class="controls">
                                                    <input type="text" id="u_estyr" class="input-xlarge" value="<?php echo $estyear;?>" />
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_addr" class="control-label">Address</label>
                                                <div class="controls">
                                                   <textarea rows="4" id="u_addr" class="input-xlarge"><?php echo $address;?></textarea>                                                  
                                                </div>
                                            </div>
                                            
                                            <div class="control-group formSep">
                                                <label for="u_pincode" class="control-label">Pincode</label>
                                                <div class="controls">
                                                    <input type="text" id="u_pincode" class="input-xlarge" value="<?php echo $pincode;?>" />
                                                </div>
                                            </div>
                                            
                                              <div class="control-group formSep">
                                                <label for="u_website" class="control-label">Website</label>
                                                <div class="controls">
                                                    <input type="text" id="u_website" class="input-xlarge" value="<?php echo $website;?>"/>
                                                </div>
                                            </div>
                                            
                                            <!--<div class="control-group formSep">
                                                <label class="control-label">I want to receive:</label>
                                                <div class="controls">
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" value="newsletter" id="email_newsletter" name="email_receive" />
                                                        Newsletters
                                                    </label>
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" value="sys_messages" id="email_sysmessages" name="email_receive" checked="checked" />
                                                        System messages
                                                    </label>
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" value="other_messages" id="email_othermessages" name="email_receive" />
                                                        Other messages
                                                    </label>
                                                </div>
                                            </div>-->
                                            
                                            
                                            
                                           <!-- <div class="control-group formSep">
                                                <label for="u_signature" class="control-label">About</label>
                                                <div class="controls">
                                                    <textarea rows="4" id="u_signature" class="input-xlarge" <?php echo $about;?>></textarea>                                                </div>
                                            </div>-->
                                            <input type="hidden" name="hidoper" id="hidoper" value="0" />				
                                            <div class="control-group">
                                                <div class="controls">
												<a href="#" class="btn btn_red" id="register" onClick="fn_register()">Save Changes</a>
<!--                                                <button class="btn">Cancel</button>-->
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            
                            <?php
							}
							?>
                        </div>
                    </div>
                        
                </div>
            </div>
            
            <!-- sidebar -->
           
           
        <script>

		function fn_register()
		{
	    var f = document.form1;	
		if(f.u_fname.value == "")
			{
				alert ("Enter the Name");								
				f.u_fname.focus();				
				return false;				
			}
			
		if (f.u_email.value == "")
			{
				alert ("Enter the Email");			
				f.u_email.focus();
				return false;	
			}
			
		 if (isValidEmail(f.u_email.value) == false)
			{
			alert("Enter Valid Email ID");
			f.u_email.focus();
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
		
		if(f.u_password.value=="")
			{
				alert("Enter the Password");			
				f.u_password.focus();
				return false;
			}	
			
		if (f.u_phone.value="")
		   {
				alert("Enter the Phone No.");			
				f.txtmob.focus();
				return false;
		   }	
		
	   if (f.u_mobile.value == "")
		   {
				alert("Enter the Mobile Number");			
				f.u_mobile.focus();
				return false;
		   }
		   
	  if (f.u_city.value == "")
		   {
				alert("Enter the City");			
				f.u_city.focus();
				return false;
		   }
	
		 if (f.u_desc.value == "")
		   {
				alert("Enter the Description");			
				f.u_desc.focus();
				return false;
		   }
		   
		    if (f.u_estyr.value == "")
		   {
				alert("Enter the Year of Establishment");			
				f.u_estyr.focus();
				return false;
		   }
		   
		    if (f.u_city.value == "")
		   {
				alert("Enter the City");			
				f.u_city.focus();
				return false;
		   }
		   
		    if (f.u_addr.value == "")
		   {
				alert("Enter the Address");			
				f.u_addr.focus();
				return false;
		   }
		   
		    if (f.u_pincode.value == "")
		   {
				alert("Enter the Pincode");			
				f.u_pincode.focus();
				return false;
		   }
		   
		    if (f.u_website.value == "")
		   {
				alert("Enter the Website");			
				f.u_website.focus();
				return false;
		   }
		   
		   
		    /*if (f.u_signature.value == "")
		   {
				alert("Enter the About Yours");			
				f.u_signature.focus();
				return false;
		   }*/
		   
	 
	  
				f.hidoper.value=1;
				f.action = "user_profile.php";
				f.method = "post";
				f.submit();			
				return false;
			}
</script>
           
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
                        
          				 <div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
                    
                            <div class="sidebar_inner">
                                
                                <div id="side_accordion" class="accordion">
                                 
                                 <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-cog"></i> Mailbox
                                            </a>
                                        </div>
                                        
                                            
                                                <ul class="nav nav-list" style="padding-left:30px;">
                                                   <!-- <li><a href="#mbox_new" id="mbox_new1" data-toggle="tab">Compose Mail</a></li>
                                                    <li><a href="#mbox_inbox"id="mbox_inbox1" data-toggle="tab">Inbox</a></li>
                                                    <li><a href="#mbox_outbox" id="mbox_outbox1" data-toggle="tab">Outbox</a></li>
                                                    <li><a href="#mbox_trash" id="mbox_trash1" data-toggle="tab">Trash</a></li><br>-->
													
                                                    <li><a id="tab1" href="mailbox.php?id=1">Compose Mail</a></li>
													<li><a id="tab2" href="mailbox.php?id=2">Inbox</a></li>
                                                    <li><a id="tab3" href="mailbox.php?id=3">Outbox</a></li>
                                                    <!--<li><a id="tab4" href="mailbox.php?id=4">Trash</a></li>-->

                                                </ul>
                                           
                                    </div>
                                    
                                 
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-th"></i> Dashboard
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="collapseTwo">
                                            <div class="accordion-inner">
                                                <ul class="nav nav-list">
                                                    <li><a href="dashboard.php">Dashboard</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 <!--   <div class="accordion-group">
                                       <div class="accordion-heading">
                                          <i class="icon-th"></i> Mailbox
                                    <div class="accordion-group">
                                    
                                      <ul class="nav nav-list">
                                                    <li><a href="#mbox_new" data-toggle="tab">Compose Mail</a></li>
                                                    <li><a href="#mbox_inbox" data-toggle="tab">Inbox</a></li>
                                                    <li><a href="#mbox_outbox" data-toggle="tab">Outbox</a></li>
                                                    <li><a href="#mbox_trash" data-toggle="tab">Trash</a></li>
                                                </ul>
                                    </div>
                                    
                                    </div>
                                    </div>-->
                                    
                                </div>
                                
                                <div class="push"></div>
                            </div>
                               
                             
                        
                        </div>
                    </div>
                </div>
            
            </div>
                        
                        </div>
                    </div>
                </div>
            
            </div>
            
			<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
            <script src="js/jquery-ui.min.js"></script> 
            <script src="js/bootstrap.js"></script> 
            <script src="js/jquery.easing.js"></script> 
            <script src="js/jquery.flexslider.js"></script> 
            <script src="js/jquery.elastislide.js"></script> 
            <script src="js/jquery.selectbox-0.2.js"></script> 
            <script src="js/jquery.nouislider.js"></script> 
            <script src="js/jquery.isotope.min.js"></script> 
            <script src="js/cloudzoom.js"></script> 
            <script src="js/jquery.inview.js"></script> 
            <script src="js/jquery.jcarousel.min.js"></script> 
            <script src="js/scripts.js"></script> 
            <script src="js/navigation.js"></script> 
            <script type="text/javascript" src="jquery/jquery-1.2.3.min.js"></script>
            <script type="text/javascript" src="jquery/jquery.js"></script>
            <script type="text/javascript" src="jquery/jquery.form.js"></script>
            <script type="text/javascript" src="jquery/jquery.min.js"></script>
            
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-migrate.min.js"></script>
            <!-- smart resize event -->
            <script src="js/jquery.debouncedresize.min.js"></script>
            <!-- hidden elements width/height -->
            <script src="js/jquery.actual.min.js"></script>
            <!-- js cookie plugin -->
            <script src="js/jquery_cookie.min.js"></script>
            <!-- main bootstrap js -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
             <!-- bootstrap plugins -->
            <script src="js/bootstrap.plugins.min.js"></script>
            <!-- tooltips -->
            <script src="lib/qtip2/jquery.qtip.min.js"></script>
            <!-- jBreadcrumbs -->
            <script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
            <!-- fix for ios orientation change -->
            <script src="js/ios-orientationchange-fix.js"></script>
            <!-- scrollbar -->
            <script src="lib/antiscroll/antiscroll.js"></script>
            <script src="lib/antiscroll/jquery-mousewheel.js"></script>
            <!-- lightbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- mobile nav -->
            <script src="js/selectNav.js"></script>
            <!-- common functions -->
            <script src="js/gebo_common.js"></script>
            
            <!-- bootstrap plugins -->
            <script src="js/bootstrap.plugins.min.js"></script>
            <!-- autosize textareas -->
            <script src="js/forms/jquery.autosize.min.js"></script>
            <!-- enhanced select -->
            <script src="lib/chosen/chosen.jquery.min.js"></script>
            <!-- user profile functions -->
            <script src="js/gebo_user_profile.js"></script> 
            
            <script>
                $(document).ready(function() {
                    //* show all elements & remove preloader
                    setTimeout('$("html").removeClass("js")',1000);
                });
            </script>
            
            
            


            
        
        </div>
    </body>
</html>


