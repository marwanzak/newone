<?php
session_start();
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql="SELECT * FROM users where email='$_POST[email]' and password='$_POST[password]'";

$results=mysql_query($sql)
or die (mysql_error());
$row=mysql_fetch_array($results);
if(!$row[0])
{
	echo("invalid");
	exit();
}
else
{
$username=$row[0];
$email=$row[1];
$userid=$row[3];
echo($username." ".$userid);
$_SESSION['userid']=$userid;
$_SESSION['email']=$email;
$_SESSION['username']=$username;

}



?>