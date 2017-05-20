<?php

session_start();
@include("config.php");
@include('common.php');

@include("user_sessioncheck.php");
if(!empty($_REQUEST['id'])){
	$field_values_array = $_REQUEST['field_name'];
    $count=count($field_values_array);
        $id=$_REQUEST['id'];
        for($i=0;$i<$count;$i++){
       $prescription=$field_values_array[$i]; 
  $query="INSERT INTO `tbl_prescription`(`booking_id`, `prescription`, `status`) VALUES ('$id','$prescription','1')";
     $result=  mysql_query($query);
    
        }       
 if($result) {
     echo "<script>

        alert('Medicines are added Successfully');
        window.location.href='patients.php';
        </script>";
        
        } 
        else
    {
     echo "<script>

        alert('Something error occured Please try again later');
        window.location.href='patients.php';
        </script>";
        
        } 
}
else
    {
     echo "<script>

        alert('Something error occured Please try again later');
        window.location.href='patients.php';
        </script>";
        
        } 
        ?>