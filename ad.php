<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="ad.css">
<link href="themes/base/jquery.ui.all.css" rel="stylesheet" type="text/css"/>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
   <script src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<script src="js/jquery-ui-1.8.23.custom.min.js"></script>
	<script src="/ui/jquery.ui.core.js"></script>
	<script src="/ui/jquery.ui.widget.js"></script>
	<script src="/ui/jquery.ui.mouse.js"></script>
	<script src="/ui/jquery.ui.draggable.js"></script>

<script src="ad.js"></script>
<title>Free ADs</title>
</head>
<body>
<div id="mainwrap">
<div id="header" draggable="true">
<div id="accountdiv">
<div id="searchdiv" style="width:180px;">
<form method="post" id="searchform">
  <input type="text" name="searchword" id="searchword"  placeholder="Search Word..">
  <input type="submit" value="" class="ui-icon ui-icon-search ui-state-default ui-corner-all " style="float:right; cursor:pointer; ">
</form>
</div>
<?php
if($_SESSION['userid'])

{
	$phpuserid=$_SESSION['userid'];
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql="SELECT * FROM ads where userid='$phpuserid'";
$results=mysql_query($sql)
or die (mysql_error());



echo("Welcome: ".$_SESSION['username']);	
echo("<br/>"."<ul><li class=\"accountli\" id=\"LI_editad\">Edit my ads</li><li class=\"accountli\" id=\"LI_addad\">Add new ad</li><li id=\"LI_logout\">Log out</li>");
}
?>
</div>
</div>
<div id="contentarea" class="clearfix">
<div id="contentarea2" class="clearfix">

<div id="column2">
<div id="containerad">

</div>
</div>
<div id="column1">
<div id="nav">

<ul id="mainmenu">
<li class="firstli">&nbsp;</li>
<li id="LI_home"><span class="ui-icon ui-icon-home"  style="float: left; margin-right: .3em;"></span>Home</li>

<?php 
if(!$_SESSION['userid'])
{
	echo("<li id=\"LI_signin\"><span class=\"ui-icon ui-icon-person\"  style=\"float: left; margin-right: .3em;\"></span>Sign In</li>");	
	
}
 ?>
 
<li id="LI_signup"><span class="ui-icon ui-icon-contact"  style="float: left; margin-right: .3em;"></span>Sign up</li>


<li id="LI_genre"><span id="S_genre" class="ui-icon ui-icon-plus"  style="float: left; margin-right: .3em;"></span>Genre</li>

<ul id="genreul">
<li style="margin-top:10px;" id="LI_estate"><span class="ui-icon ui-icon-carat-1-e"  style="float: left; margin-right: .3em;"></span>Estate</li>
<li id="LI_vehicle"><span class="ui-icon ui-icon-carat-1-e"  style="float: left; margin-right: .3em;"></span>Vehicle</li>
<li id="LI_elec" style="margin-bottom:10px;"><span class="ui-icon ui-icon-carat-1-e"  style="float: left; margin-right: .3em;"></span>Electronic</li>
</ul>

<li id="LI_contactus"><span class="ui-icon ui-icon-mail-open"  style="float: left; margin-right: .3em;"></span>Contact Us</li>

</ul>
</div>
</div>

</div>
</div>
<div id="footer">
</div>
</div>
<div class="dialogdiv" id="D_signin" title="Sign In">
<form id="signinform" method="post" name="signinform"  >
<label>Your E-mail</label>
<input type="text" name="email"  id="email">
<label>Your PassWord</label>
<input type="password" name="password" id="password" >
<input type="submit">
</form>
</div>
<div class="dialogdiv" id="D_signup" title="Sign Up">
<form method="post" name="signup" id="signupform" class="cmxform">
<label>User Name</label>
<input type="text" name="username"  class="required">

<label  >E-mail</label>
<input type="email" name="email" class="required email">

<label>PassWord</label>
<input type="password"  name="password" class="required">

<input type="submit" value="Go!!">

</form>
</div>

<div class="dialogdiv" id="D_contactus" title="Contact Us">
<form action="" method="post" id="contactform">
<label>Name</label>
<input type="text" size="50" name="contactname"  >
<label>E-mail</label>
<input type="email" size="50" name="contactemail"  >
<label>Your message</label>
<textarea cols="50" rows="20" name="contactmessage"  ></textarea>
<input type="submit" value="Go!">
</form>
</div>
<div class="dialogdiv" id="D_addad" title="Add new ad">
<form method="post" name="addad" id="addadform" >
<label>Genre</label>
<select name="genre">
<option>Estate</option>
<option>Vehicle</option>
<option>Electronic</option>
</select>
<label>Short Description</label>
<textarea name="shortdes" cols="50" rows="5"></textarea>
<label>Long description</label>
<textarea name="longdes" cols="50" rows="10" ></textarea>
<input type="submit">
 
</form>
</div>
<div class="dialogdiv" id="D_editad" title="Edit my ads">
<?php

 while($row=mysql_fetch_array($results))
{
echo("<form id=\"deleteform\" method=\"post\"><table id=\"edittable\">
  <tr>
    <td>Genre:".$row[genre]."</td>
	<td>Date and Time:".$row['date']."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Short description:".$row[shortdes]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Long description:".$row[longdes]."</td>
  </tr>
  <tr>
  <td><input type=\"submit\" value=\"Delete\"></td>
  <td><input type=\"hidden\" name=\"hidid\" value=\"".$row[adid]."\"></td>
  </tr>
</table></form>");

}

?>

</div>
</body>
</html>