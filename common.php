<?php
function selectsinglevalue($qry)
{
	$retval = '';
	$res = mysql_query($qry);
	$row = mysql_fetch_array($res,MYSQL_ASSOC);
	$retval = $row['retv'];
	return $retval;

}
?>
