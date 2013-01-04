<?php
$adid1=$_POST['hidid'];
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql2="DELETE FROM ads where adid='$adid1'";
mysql_query($sql2)
or die (mysql_error());

?>