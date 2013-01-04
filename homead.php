<?php
$adgenre=$_POST['genre'];
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql1="SELECT * FROM ads where genre='$adgenre' order by date desc;";
$results1=mysql_query($sql1)
or die (mysql_error());
$row1=mysql_fetch_array($results1);
if($row1)
{
echo("<div  class=\"rowdiv\"><table id=\"genretable\">
  <tr>
    <td>Genre:".$row1[genre]."</td>

  </tr>
  <tr>
    <td style=\"padding:10px; text-align:justify;\" >".$row1[shortdes]."</td>
  </tr>

</table></div>");
}

?>