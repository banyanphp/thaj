<?php
@include("config.php");




if (!empty($_POST['id'])) {

    $id = $_POST['id'];

    

    $delete = mysql_query("DELETE FROM `tbl_languages` where `fld_id`='$id'");

    if ($delete) {

        echo "languages is deleted successfully";

    } else {

        echo "languages   is Not deleted ";

    }

}

?>