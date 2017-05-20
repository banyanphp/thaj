<?php @include("../config.php");
$doctor_id=$_POST['doctor_id'];
$specalist_id=$_POST['specalist_id'];
session_start();
$time=$_POST['time'];date_default_timezone_set('Asia/Kolkata');
if($time==1)
{
ECHO $_SESSION['time_fee']=1;
	$date= date("Y-m-d");
	//echo $date;
	  ?>
	<?php  $lasttiime= date('H:i');?>
<div class="modal fade" id="myModal"  role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Consult Now </h4> 
       
      </div>
	  
      <div class="modal-body" style="height:450px">

     	<div class="grey-cont col-sm-8 col-sm-offset-2"> 
       	<form  role="form" class="loginform" id="singleprodform" name="singleprodform" method="post">
         <h5 align="center">Doctor Availability</h5>
			  
             <div id="SlotContainer" >
           
			<?php	
				if($doctor_id!="xxx"){
					?>
	
	
				  <ul id="timeSlot" class="time-slot" style="margin-top: 3%;width: 120%;">
			<?php		 
			 $gettimeslot = mysql_query("select * from tbl_timeslot where  doctor_id='$doctor_id' and fld_from >'$lasttiime' ");
			 if(mysql_num_rows($gettimeslot)>0){
			 while($row = mysql_fetch_array($gettimeslot))
			 {
				$gettime = $row['fld_from']." - ".$row['fld_to'];
				
				  $start=$row['fld_from'];
				
				 ?>
                                      <input type="button" id="consult" value="<?php echo $gettime; ?>IST"
                                        <?php     $q=mysql_query("select  * from tbl_patientlist where consultant_date='$date' and fld_datetime='$start' and fld_dcname='$doctor_id'  ");

$num=mysql_num_rows($q);
if($num==0){
?>
                                             onclick='f2(this,<?php echo $doctor_id;?>,<?php echo $time;?>,<?php echo $date;?>)'style="width:100px;padding: 4px 9px;border: none;border-radius: 16px;-webkit-border-radius: 16px;background: #5cb85c;display: block;color: #fff;font-size: 11px;float:left;margin-left:10px;margin-bottom:5px;"/>
                                      


				 <?php
				
}else{
    ?>
                 style="width:100px;padding: 4px 9px;border: none;border-radius: 16px;-webkit-border-radius: 16px;background: #ff0000;display: block;color: #fff;font-size: 11px;float:left;margin-left:10px;margin-bottom:5px;cursor:none" />                 

	<?php }			
				
				
				
			 }
			 }
			 else{
				 echo "<div class='btn btn-danger'style='margin-left: -105px;'>Sorry Today appointment time is over</div>";
				
			 }
			 ?>			 
			 </ul>
       	<?php 
	}			
		
		else 
		{
			 echo "<div class='btn btn-danger'style='margin-left: -105px;'>Please select doctor</div> "; 
		}			
			 ?>	
                 <br/>
		<?php
             $doctor=mysql_fetch_array(mysql_query("select * from  tbl_doctors where `fld_id`='$doctor_id'"));?>
                <br/>
             
             <h6 align="center" style="margin-left: 55px;margin-top: 100px;margin-bottom: 28px;">Premium Slots  Rs.<?php echo $doctor['fld_doctor_fees']; ?>/-</h6>
             </div>
     <span id="login_button1"></span>
       <?php /*?><input type="button" name="btnsave_supplier" id="btnsave_supplier(<?php echo $supplierid; ?>)" class="btn btn-primary loginbtn" value="Send Enquiry"><?php */?>
    </form><span id="dataresponses"> </span>
   
	    </div>
          
           <div style="font-size:12px;">
    <a style="color:#ff0000;cursor:none;font-size: 14px"> **</a>The Amount charged for the online consultation of <b>10 minutes</b> only.<br/>
    <a style="color:#ff0000;cursor:none;font-size: 14px"> **</a>To continue after the 10 minutes additional charges are applicable 
    </div>
      </div>
     
    </div>
  </div>
</div>
<?php } 



/*make an appointment*/

else if($time==2)

{
$_SESSION['time_fee']=2;
	?><div class="modal fade" id="myModal1"  role="dialog" >
  <div class="modal-dialog">
 <link rel="stylesheet" href="css/pikaday.css">
    <link rel="stylesheet" href="css/site.css">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h5 align="center">Doctor Availability</h5>
       
      </div>
	
      <div class="modal-body" style="height:550px;"><div class="hero-unit">
               	<form  role="form" class="loginform" id="singleprodform" name="singleprodform" method="post">
                 	<div class="grey-cont col-sm-4 col-sm-offset-2" > 
      
        
		<script src="pikaday.js"></script>
      <script>
	var date= new Date();
    var picker = new Pikaday(
    {
          disableDayFn: function(date){
        // Disable Monday and Tuesday
        return (date.getDay() === 0);
    },
   
	
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(),
        maxDate: new Date(date.getFullYear(), date.getMonth() + 2, 0),
    
    });


    </script>	
             <div id="SlotContainer" style=" ">
           
			<?php	
				if($doctor_id!="xxx"){
					?>                <span class="dateerror" style=" font-size: large; color: #ff0000;"></span>
                                        <input type="text" id="datepicker" onchange="getdate(<?php echo $doctor_id;?>)" placeholder="Choose a date">   
				
             

                                        <ul id="timeSlot"  class="time-slot" style="margin-top: 3%;width: 120%;">
                                         
                                            
                                        </ul>
<span id="login_button2"></span>
	
	<?php 
}			
			
	
		else 
		{
			?>
			<?php  echo "<div class='btn btn-danger'style='margin-left: -105px;'>Please select doctor</div> ";  ?>
	<?php	}			
			 ?>				 
		
             
             
             </div>
     
       <?php /*?><input type="button" name="btnsave_supplier" id="btnsave_supplier(<?php echo $supplierid; ?>)" class="btn btn-primary loginbtn" value="Send Enquiry"><?php */?>
<input type="hidden" value="<?php echo $doctor_id; ?>" id="doctor_id"><input type="hidden" value="<?php echo $time; ?>" id="time">

    <?php   $doctor=mysql_fetch_array(mysql_query("select * from  tbl_doctors where `fld_id`='$doctor_id'"));?>
<br>
              <h6 align="center" style="margin-left: 55px;margin-top: 100px;margin-bottom: 28px;width: 287px;">Premium Slots (within 45 mins) Rs <?php echo $doctor['fld_doctor_fees1']?>/-</h6>
	<span id="dataresponses"> </span>
	    </div>
                        <div style="font-size:12px;">
    <a style="color:#ff0000;cursor:none;font-size: 14px"> **</a>The Amount charged for the online consultation of <b>10 minutes</b> only.<br/>
    <a style="color:#ff0000;cursor:none;font-size: 14px"> **</a>To continue after the 10 minutes additional charges are applicable 
    </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
   
<script language="JavaScript" type="text/javascript">
 function f1(objButton,id,type){  

			
	var date= datepicker.value;
	if(date==''){
		 $('.dateerror').html('Please choose date');
                  $("#datepicker").focus();

return false;
		
	}
	else {
    var type=type;
	var doctor_id= id;	
	var slottime=objButton.value;
       
	$.ajax({
		type: "POST",
		url: "check_slot.php",
	    data: {
                        doctor_id: doctor_id,
			type:type,
			slottime:slottime,
            date:date,
        },
		beforeSend: function(){

$("#login_button2").html('<img src="ajaxloading.svg" style="width:30px" /> ');
},
		success: function(data)
		{

	$("#login_button2").html('');		
// $('#myModal1').modal('hide'); 
		$('#dataresponses').html(data);
			 
			  
		}
		});
	}
		  
}

</script>
 
 
 
 
 <script language="JavaScript" type="text/javascript">
     
 function f2(objButton,id,type,date){  

	//	alert(date);	
	
    var type=type;
	var doctor_id= id;	
	var slottime=objButton.value;
	var date= date;

	
   
	$.ajax({
		type: "POST",
		url: "check_slot.php",
	    data: {
            doctor_id: doctor_id,
			type:type,
			slottime:slottime,
            date:date,
        },
		beforeSend: function(){

$("#login_button1").html('<img src="ajaxloading.svg" style="width:30px" />  ');
},
		
		success: function(data)
		{
			$("#login_button1").html('');
			// $('#myModal1').modal('hide'); 
		$('#dataresponses').html(data);
			 
			  
		}
		});
	
		  
}
 function getdate(doctorid){  

		var date= datepicker.value;
                var doctorid=doctorid;
                
	$.ajax({
            type: "POST",
            url: "get_times.php",
      data: {
            doctor_id: doctorid,
			
            date:date,
        },
beforeSend: function(){

$("#login_button2").html('<img src="ajaxloading.svg" style="width:30px" /> ');
},
        	success: function(data)
		{
			$("#login_button2").html('');	
			// $('#myModal1').modal('hide'); 
		$('#timeSlot').html(data);
			 
			  
		}
        });
		
	
		  
}

</script>
