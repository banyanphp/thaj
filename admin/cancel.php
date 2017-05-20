<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
date_default_timezone_set('Asia/Kolkata');
$todaydate = date("Y-m-d");
$uname = $_SESSION['uname'];
$userid = $_SESSION['userid'];
$doctor_id = $_SESSION['doctor_id'];
$email = $_SESSION['email'];
$viewemail = $_SESSION['pstemail'];
if ($userid != 1) {
    $fetch_doctor = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='" . $doctor_id . "'"));

    $fld_name = $fetch_doctor['fld_name'];
    $fld_gender = $fetch_doctor['fld_gender'];
    $fld_speciality = $fetch_doctor['fld_speciality'];
    $fld_languages = $fetch_doctor['fld_languages'];
    $fld_image = $fetch_doctor['fld_image'];
    $fld_experience = $fetch_doctor['fld_experience'];
    $fld_createdon = $fetch_doctor['fld_createdon'];
    $fld_delstatus = $fetch_doctor['fld_delstatus'];
    $permission = $_SESSION['permission']; //if permission 1 super admin  // if permission 0 doctor )

    $imagepath = 'doctors_images/';
} else {
    $fetch_admin = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_admin` WHERE `fld_id` ='" . $userid . "'"));
    $fld_names = $fetch_admin['fld_username'];
    $fld_names = ucfirst($fld_names);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cancel Appointments | Dashboard</title>

        <style>
            .table tbody tr.rowlink:hover td {background-color: #efefef}

        </style>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       

        <div id="maincontainer" class="clearfix">

            <!-- header -->
<?php
include("header.php");
?>
            <!-- header -->

            <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
                            <div id="response"style="margin-left:60%"></div>
                            <h3 class="heading">Cancel Appointments List</h3>
                            <form id="form1" name="form1" method="post">	
                                <div id="prods" style="float:left" class="span6">
                                    <div class="row-fluid">
                                        <div class="span12" style="width:206%;">	
                                            <span id="dataresponses"></span>									
                                            <table style="border:1px solid;" class="table table-striped table-bordered table-hover">
                                                <thead >
                                                    <tr style="pading:10px;">
<?php if ($_SESSION['userid'] == 1) { ?>
                                                            <th>Doctor Name</th>
                                                        <?php } ?>
                                                        <th>Cancel appointment date</th> 

                                                        <th> Cancel appointment time</th>														
                                                        <th>action</th>	
                                                        <!--<th>View</th>-->

                                                    </tr>
                                                </thead>
                                                <tbody>
<?php
if ($_SESSION[userid] == 1) {
    $seldc = "SELECT * from `tbl_cancelappointment` where  delstatus=0  ORDER BY `tbl_cancelappointment`.`date` DESC";
} else {
    $seldc = "SELECT * from `tbl_cancelappointment` where doctor_id ='$doctor_id' and delstatus=0  ORDER BY `tbl_cancelappointment`.`date` DESC";
}

//	echo $seldc;
$no = 1;
$seldc1 = mysql_query($seldc);
while ($row = mysql_fetch_array($seldc1, MYSQL_ASSOC)) {

    //$rprodsubminicatid= $row['fld_level3id'];
    $date = $row['date'];
    $time = $row['time'];
    $time.='-';
    $time.=$row['end'];
   
    $id = $row['id'];
    $doctor_ids = $row['doctor_id'];
    $fld_doctors = mysql_fetch_array(mysql_query("SELECT * FROM `tbl_doctors` WHERE `fld_id` ='" . $doctor_ids . "'"));
    $fld_doctor_name = $fld_doctors['fld_name'];
    ?>
                                                        <tr>
                                                        <?php if ($_SESSION['userid'] == 1) { ?>
                                                                <td>
                                                            <?php echo $fld_doctor_name; ?>
                                                                </td>
                                                        <?php } ?>
                                                            <td><?php echo $date; ?></td>
                                                            <td><?php echo $time; ?></td>

                                                                <?php if ($date > $todaydate) { ?>
                                                                <td align="center">
                                                                    <input class="btn btn-success" type="button" id="btnedit" onclick="fn_update('<?php echo $time; ?>', '<?php echo $date; ?>', '<?php echo $id; ?>', '<?php echo $doctor_id; ?>')" value="Rescheduled"/>
                                                                </td>

    <?php } else { ?>

                                                                <td align="center">
                                                                    <input class="btn btn-danger" type="button" id="btnedit"  value="Cancelled"/>
                                                                </td>	
    <?php } ?>
                                                        </tr>
                                                            <?php
                                                        }
                                                        ?>	
                                                </tbody>
                                            </table>											
                                        </div>
                                    </div>
                                </div>
                        </div>                   
                    </div>
                </div>            
<?php
@include("leftpanel.php");
?>

                <script language="JavaScript" type="text/javascript">
                    function fn_update(time, date, id, doctor_id) {


                        var result = confirm("Are you sure for reschedule appoinment ?");
                        if (result) {
             $.ajax({
                                type: "POST",
                                url: "approveappointment.php",
                                data: {
                                    time: time,
                                    date: date,
                                    id: id,
                                    doctor_id: doctor_id,
                                },
                                //datatype:string,

                                success: function (data)
                                {
                                    
                                    //	alert(data);
                                    // $('#myModal1').modal('hide'); 
                                    $('#dataresponses').html(data);
                                    $(document).ready(function ()
                                    {
                                        setInterval(function () {
                                            cache_clear()
                                        }, 1000);
                                    });
                                    function cache_clear()
                                    {
                                        window.location.reload(true);
                                    }

                                }
                            });
                        }


                    }

                </script>





            </div>

    </body>
</html>