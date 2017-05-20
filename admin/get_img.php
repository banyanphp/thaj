<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');
$id=$_POST['doctor_id'];
$fetch=mysql_query("select * from tbl_patientlist where fld_id='$id'");
$counts = mysql_num_rows($fetch);
$fetch_data=  mysql_fetch_array($fetch);
$img=$fetch_data['image'];


?> <div class="modal fade" id="img" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Prescription </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-lg-12">
                                                        <form class="form-horizontal" role="form" id="forgot_form" method="post" enctype="multipart/form-data">

                                                            <img src="../login/prescription/<?php  echo $img;?>">



                                                        
                                                            <div class="form-group">

                                                                
                                                            </div>
                                                        </form>
                                                    </div><!-- end col -->
                                                </div>

                                                <div class="modal-footer" style="border-top:none;border-bottom:1px solid #CACACA">
                                                  
                                                </div>
                                            </div>



                                        </div>
                                    </div>