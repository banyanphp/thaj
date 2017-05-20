			<title><?php echo $uname; ?> - Dr.Thaj</title>    
            <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
            <!-- jQuery UI theme-->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
            <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
            <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
            <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
            <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
            <!-- upload -->
            <link rel="stylesheet" href="lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
            <!-- tag handler -->
            <link rel="stylesheet" href="lib/tag_handler/css/jquery.taghandler.css" />
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
            <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
            <link type="text/css" href="css/uploader.css" rel="stylesheet" />
			<script>
            //* hide all elements & show preloader
            document.documentElement.className += 'js';
			</script>   
			<script type="text/javascript" src="jquery/jquery.js"></script>
            <script type="text/javascript" src="jquery/jquery.form.js"></script>
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
            <!-- scroll -->
            <script src="lib/antiscroll/antiscroll.js"></script>
            <script src="lib/antiscroll/jquery-mousewheel.js"></script>
            <!-- mobile nav -->
            <script src="js/selectNav.js"></script>
            <!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
            <!-- common functions -->
            <script src="js/gebo_common.js"></script>
            
            <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- colorbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- datatable (inbox,outbox) -->
            <script src="lib/datatables/jquery.dataTables.min.js"></script>
            <!-- additional sorting for datatables -->
            <script src="lib/datatables/jquery.dataTables.sorting.js"></script>
            <!-- datatables bootstrap integration -->
            <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
            <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
            <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
            <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
            <!-- autosize textareas (new message) -->
            <script src="js/forms/jquery.autosize.min.js"></script>
            <!-- tag handler (recipients) -->
            <script src="lib/tag_handler/jquery.taghandler.min.js"></script>
            <!-- mailbox functions -->
            <script src="js/gebo_mailbox.js"></script>
			
			 <script src="js/gebo_notifications.js"></script>
            
            <script>
            $(document).ready(function() {
            //* show all elements & remove preloader
            setTimeout('$("html").removeClass("js")',1000);
            });
            </script>
        

   <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="patients.php" style="width:500px"><i class="icon-home icon-white"></i> <?php echo 'Admin'; ?></a>
                            <ul class="nav user_menu pull-right">
                              <!--<li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
									 <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">
										 <?php if($count==0)
										 {
											  echo $count;
											  ?> 
											
										 <i class="splashy-mail_light"></i></a>
										   <?php
										 }
										 else
										 {
											   echo $count;
										 ?>
										<i class="splashy-mail_light_new_2"></i></a>
										 <?php
										 }
										 ?>									 
                                                             
									</div>
								</li>-->
                            
                               <?php
							   if($uname!="")							   
							   {
								   ?>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($_SESSION['userid']==1) { echo $fld_names;} else { echo $fld_name; }  ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
								 
                                    <li><a href="change_password.php">Change Password</a></li>                                
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Log Out</a></li>
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
                        <button class="close" data-dismiss="modal">X</button>
                        <h3>New Mail(s)</h3>
                    </div>
                    <div class="modal-body">
                    
                    <?php
					if($count!=0)
					{
					?>
                    
                        <div class="alert alert-info">You Have <?php echo $count; ?> Mail(s)</div>
                        <?php
					}
					else
					{
						?>
                        <div class="alert alert-info">You Have No New Mail(s)</div>
                        <?php
					}
					?>
                        <?php 
						if($count>0)
						{
						?>
                        
                        <table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Sender</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                             <?php
		                                                // $sql="SELECT * FROM tbl_postrequirement order by fld_createddate ASC";	
													
$sql = mysql_query("SELECT distinct suppplier.fld_fname,post.fld_postid,
post.fld_category,post.fld_createddate FROM `tbl_postrequirement` post
join `tbl_supplierregister` suppplier on post.fld_city = suppplier.fld_city
and suppplier.fld_level1name = post.fld_category
where post.fld_quotstatus=1 and suppplier.fld_fname like '%$uname%' Group by post.fld_postid");					

                                                        while($rows=mysql_fetch_array($sql))
                                                        {
														$postname = $rows['fld_name'];
														$suppliername =$rows['fld_fname'];
														$postemaail = $rows['fld_email'];
                                                        $postid=$rows['fld_postid'];
														$postcat = $rows['fld_category'];														
                                                        $postdate=$rows['fld_createddate'];
														
														$newDateTime = date('jS \of F Y h:i:s A', strtotime($postdate));													
														
														
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];								
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd'>Click here</a>";                                                        ?>                                                    

                            
                                <tr class="unread">
                                    <td>Quotation</td>
                                    <td><a href="javascript:void(0)"><?php  echo $postemaail;?></a></td>
                                    <td><?php echo $link; ?></td>
                                    <td><?php echo $newDateTime; ?></td>
                                </tr>
                                
                                <?php 
								
								}
								
								?>  
                                
                            </tbody>
                        </table>
                        
                        <?php
						}
						?>
                        
                        
                        
                    </div>
                    
                </div>
                                
            </header>