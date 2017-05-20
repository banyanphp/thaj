<script src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("contextmenu", function(e) {
            return false;
        });
        $("#id").on("contextmenu", function(e) {
            return false;
        });
        document.onkeydown = function(e) {
            if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 17 || e.keyCode === 73 || e.keyCode === 117)) {
                return false;
            } else {
                return true;
            }
        };
    });
</script>     
<?php
@include("../config.php");
error_reporting('0');
date_default_timezone_set('Asia/Calcutta');
$selectedTime = date("H:i:s");
//echo $selectedTime;
$endTime = strtotime("-15 minutes", strtotime($selectedTime));
$delete= date('Y-m-d H:i:s', $endTime);
mysql_query("DELETE FROM `tbl_patientlist` WHERE  `fld_createdon` < '$delete' and  `payment_status`='0'");
//echo "DELETE FROM `tbl_patientlist` WHERE  `fld_createdon` < '$delete' and  `payment_status`='0'";
?>
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
                                                <a href="doctorslist.php"><img src="logo.png" alt="logo"> </a>
                                            </li>
                                        </ul>
                                        <!-- menu links -->
                                      
                                    </div>		  

                                </div>
                            </div>
                        </section>
                    </nav>  
                </div>
            </header>
