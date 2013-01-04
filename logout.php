<?php
session_start();
$_SESSION['userid']=Null;
$_SESSION['email']=Null;
$_SESSION['username']=Null;
header("Location:ad.php");
echo("You have been loged out and redirected to the home page.<br/>");
echo("If your browser doesn't support this,<a href=\"ad.php\">CLICK HERE</a>");
?>