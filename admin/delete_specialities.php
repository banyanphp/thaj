<?php
@include("config.php");




if (!empty($_POST['id'])) {

    $id = $_POST['id'];

    

    $delete = mysql_query("DELETE FROM `tbl_specialities` where `fld_id`='$id'");

    if ($delete) {

        echo "Specialities is deleted successfully";

    } else {

        echo "Specialities   is Not deleted ";

    }

}

?>