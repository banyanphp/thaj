<?php @include("../config.php");

 session_start();
$doctor_id=$_POST['doctor_id'];date_default_timezone_set('Asia/Kolkata');

$type=$_POST['type'];
$pid=$_POST['pid'];
if($type==1){



	$date= date("Y-m-d");

}

else{

$date=$_POST['date'];

}$slottime=$_POST['slottime'];

$slottime=trim($slottime);

//print_r($_POST);

 $getfirsttime = explode("-", $slottime);

 $getstarttime=trim($getfirsttime[0]);

 $getendtime=trim($getfirsttime[1]);

$q=mysql_query("select  * from tbl_patientlist where consultant_date='$date' and fld_datetime='$getstarttime' and fld_dcname='$doctor_id'  ");

$num=mysql_num_rows($q);

if($num=='0')

{

	$q2=mysql_query("select  * from tbl_cancelappointment where date='$date' and time='$getstarttime'and  doctor_id='$doctor_id' and delstatus='0'");
        //echo "select  * from tbl_cancelappointment where date='$date' and time='$getstarttime'and   doctor_id='$doctor_id' and delstatus='0'";
    
	$cancelnum=mysql_num_rows($q2);


	if($cancelnum ==0){
            
$_SESSION['times']=$date;
$_SESSION['timeslot']=$slottime;
$_SESSION['doctor_id']=$doctor_id;
$_SESSION['pid']=$pid;
           	echo '<button type="button" onclick="window.location.href='."'cancellation.php'".'" class="btn btn-success" value="Click to proceed">Click to proceed</button>';

	}

	else{

echo "<div class='btn btn-danger'>Doctor Not Available</div>";

}

}

else{

	echo "<div class='btn btn-danger'>Time is allocated to another Patient. Please choose another time</div>";

}

?>