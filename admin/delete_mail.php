<?php
@include("config.php");
?>
<?php

$rowCount = count($_POST["msg_sel"]);
for($i=0;$i<$rowCount;$i++) {
//mysql_query("DELETE FROM tbl_postrequirement WHERE fld_postid='" . $_POST["msg_sel"][$i] . "'");
mysql_query("Update tbl_postrequirement SET fld_delstatus = 2 WHERE fld_postid='" . $_POST["msg_sel"][$i] . "'");

}
header("Location:mailbox.php");
?>



<?php
$rowCount = count($_POST["msg_selout"]);
for($i=0;$i<$rowCount;$i++) {
//mysql_query("DELETE FROM tbl_postrequirement WHERE fld_postid='" . $_POST["msg_sel"][$i] . "'");
mysql_query("Update tbl_sendmail SET fld_delstatus = 2 WHERE fld_smailid='" . $_POST["msg_selout"][$i] . "'");
}
header("Location:mailbox.php");
?>	


<?php

$rowCount = count($_POST["msg_seltrash"]);
for($i=0;$i<$rowCount;$i++) {
//mysql_query("DELETE FROM tbl_postrequirement WHERE fld_postid='" . $_POST["msg_sel"][$i] . "'");
mysql_query("Update tbl_postrequirement SET fld_delstatus = 3 WHERE fld_postid='" . $_POST["msg_seltrash"][$i] . "'");
}
header("Location:mailbox.php");
?>	


