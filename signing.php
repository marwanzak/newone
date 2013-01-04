<?php
session_start();
?>


<style type="text/css">
label{display:block;}
fieldset{padding:20px; }
#container{padding:20px;}
#accountdiv{display:none; background-color:#096; width:200px; }
.newword{color:#300; display:block;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
 <script>
window.onload=init;
function init()
{
	
	if(<?php if(session_is_registered('userid')){echo(true);} ?>)
	{
		userin();
			}
	}
$("#signinform").submit(function(){
$.post("signin.php",
$("#signinform").serialize(),
function(data){
alert(data);
if(data!="invalid")
{
userin();
}
});
return false;
})
function userin()
{
document.getElementById("signinform").style.display='none';
	var spacein=data.indexOf(" ");
	var newname=data.slice(0,spacein);
	var accountdiv=document.getElementById("accountdiv");
accountdiv.style.display='block';

accountdiv.innerHTML="<a href='#'>"+newname+"</a>";	
}
</script>
<div id="container">
<form id="signinform" method="post" action="signin.php" >
<label>Your E-mail</label>
<input type="email" name="email" required>
<label>Your PassWord</label>
<input type="password" name="password" required>
<input type="submit">
</form>
</div>
<div id="accountdiv">
</div>