<?php
@include("config.php");
error_reporting(E_ALL ^ E_NOTICE);
session_start();

$permission = $_SESSION['permission'];
?>     
            <div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
							<div class="sidebar_inner">
                                
                                <div id="side_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-th"></i> Dashboard
                                            </a>
                                        </div>                                        
										<div class="accordion-inner">
											<ul class="nav nav-list">
											<?php if($_SESSION['userid']==1)
											{ ?>
												<li><a href="add_doctors.php">Add Doctors</a></li>
												<li><a href="doctors.php">View Doctors</a></li>
                                                                                                <li><a href="timeslot.php">Manage Time Slot</a></li>
                                                                                                <li><a href="speciality.php">List  Speciality</a></li>
                                                                                                  <li><a href="langauges.php">Languages</a></li>
                                                                                                
											<?php }  ?>
												<li><a href="patients.php">Today Patient List</a></li>
												<li><a href="upcomingappointments.php">Upcoming Appointments</a></li>
											    <li><a href="pastappointments.php">Past Appointments</a></li>
											   
                                                                                        <?php if($_SESSION['userid']==1)
											{ ?>
                                                                                            <!--<li><a href="doctortimeslot.php">Time slot </a></li>--> 
																							 <li><a href="payment_transaction.php">Payment Transactions</a></li>
                                                                                                <?php  } ?>
                                                                                              <?php if($_SESSION['userid']!=1){ ?>
                                                                                          <li><a href="cancelappointments.php">Cancel </a></li>
<?php  } ?>
												  <li><a href="cancel.php">List Canceled Appointments</a></li>
												<?php /*<li><a href="ready-patients.php">Ready Patients</a></li> */?>
											
											</ul>
										</div>
                                        
                                    </div>
                                 </div>
                                
                                <div class="push"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
      
           