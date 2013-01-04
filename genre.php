<?php
$adgenre=$_POST['genre'];
	$dbhand=mysql_connect("mysql.1freehosting.com","u453422300_admin","01123581321");
mysql_select_db("u453422300_freeads");
$sql1="SELECT * FROM ads where genre='$adgenre'";
$results1=mysql_query($sql1)
or die (mysql_error());
 while($row1=mysql_fetch_array($results1))
{
echo("<table id=\"genretable\">
  <tr>
    <td>Genre:".$row1[genre]."</td>
	<td>Date and Time:".$row1['date']."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Short description:<br/>".$row1[shortdes]."</td>
  </tr>
  <tr>
    <td colspan=\"2\">Long description:<br/>".$row1[longdes]."</td>
  </tr>
</table>");

}
?>