  

<?php
@include("../config.php");
$doctor_id=$_POST['doctor_id'];
//echo "select * from tbl_timeslot where  doctor_id='$doctor_id'";
$date=$_POST['date'];
date_default_timezone_set('Asia/Kolkata');
$time=2;

?>
			<?php		 
			 $gettimeslot = mysql_query("select * from tbl_timeslot where  doctor_id='$doctor_id'  ");
			 while($row = mysql_fetch_array($gettimeslot))
			 {
				$gettime = $row['fld_from']." - ".$row['fld_to'];
                               $timer="f1(this,$doctor_id,$time)";
                               $start=$row['fld_from'];
                                 $q=mysql_query("select  * from tbl_patientlist where consultant_date='$date' and fld_datetime='$start' and fld_dcname='$doctor_id'  ");

$num=mysql_num_rows($q);

if($num==0){				
echo '<input type="button" id="schedules" value=" '. $gettime.'IST"   onclick='.$timer.'   style="width:100px;padding: 4px 9px; border: none; border-radius: 16px;-webkit-border-radius: 16px;background: #5cb85c;display: block;color: #fff;font-size: 11px;float:left;margin-left:10px;margin-top:10px;"/>';				


}
else{
    echo '<input type="button" id="schedules" value=" '. $gettime.'IST"    style="width:100px;padding: 4px 9px; border: none; border-radius: 16px;-webkit-border-radius: 16px;background: #ff0000;display: block;color: #fff;font-size: 11px;float:left;margin-left:10px;margin-top:10px;cursor:none"/>';				

}
}
			 ?>			 
			