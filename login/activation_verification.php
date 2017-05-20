<?php

 @include("../config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
session_start();


 $username=$_REQUEST['username'];
 $activationcode=$_REQUEST['activation'];
 $q=  mysql_query("select * from tbl_register where email='$username' and activation_code='$activationcode'");

 $count=  mysql_num_rows($q);
 if($count==1){
      mysql_query("update tbl_register set fld_status='1' where email='$username' and activation_code='$activationcode'");
      echo "Redirecting Page.....";
      echo "<script>window.location.href='index.php'</script>";
 }
 else{?>
       <div><input type='button' class='btn btn-primary' value='Sorry Your link is expired.Please login your account' style='font-weight:600;background-color:#FFFAFA;color:#FF0000;margin-left: 40%;margin-top: 2%;'>
        <div><input type='button' class='btn btn-primary' onclick='window.location.href="index.php"' value='Go Back' style='font-weight:600;background-color:#FFFAFA;color:#FF0000;margin-left: 40%;margin-top: 2%;'>
                           <?php
 }
?>