<?php
$doctor_id=$_REQUEST['doctorname'];
session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include ("configg.php");
@include ("functions.php");


  $fetch_doctor = mysql_query("SELECT * FROM `tbl_timeslot` WHERE `doctor_id` ='".$doctor_id."'");
  ?>       <div class="form-group">
                      <label for="txtProductName" class="col-sm-3 control-label">Delete Current Time Slot </label><?php
 while($fetch_timeslot=  mysql_fetch_array($fetch_doctor)){
?>
<input type="checkbox" name="timeslot[]" value="<?php echo $gettime = $fetch_timeslot['fld_from']." - ".$fetch_timeslot['fld_to']; ?>">
<?php echo $gettime = $fetch_timeslot['fld_from']." - ".$fetch_timeslot['fld_to']; ?>   <br/> <br/>

    <?php
 
 }
?>
  </div></
