<?php
session_start();
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql="INSERT INTO ads SET shortdes='$_POST[shortdes]', longdes='$_POST[longdes]',genre='$_POST[genre]',userid='$_SESSION[userid]'";
mysql_query($sql);

?>