$(document).ready(function(){
	    $("#signupform").validate({
			
 submitHandler: function(form) {
	 
	 $("#signupform").submit(function(){

$.post("signup.php",
$("#signupform").serialize(),
function(data){
if(data=='The email you typed is used')
{
	alert(data);
}
else{
$('#D_signup').dialog('close');
document.location.replace("index.php");
}});
return false;
})

 }
			
			
			  });

	//ads on the home page.
	loadhomead('Estate');
	loadhomead('Vehicle');
	loadhomead('Electronic');
	//hide genre ul
	$('#genreul').hide();
	//toggle the genre ul.
	$('#LI_genre').click(function(){
		$('#genreul').toggle('slow');
	if ($('#S_genre').hasClass('ui-icon-plus')) 
	{
	 $('#S_genre').addClass('ui-icon-minus').removeClass('ui-icon-plus');
	}
	else{
		$('#S_genre').addClass('ui-icon-plus').removeClass('ui-icon-minus');
	}})
	//
	loadadgenre('#LI_estate','estate');
	loadadgenre('#LI_vehicle','vehicle');
	loadadgenre('#LI_elec','electronic');
//
Dialogload('#D_addad','#LI_addad',700)
Dialogload('#D_editad','#LI_editad',700)
Dialogload('#D_signup','#LI_signup',250);
Dialogload('#D_signin','#LI_signin',250);
Dialogload('#D_contactus','#LI_contactus',700,800);
//


$('#LI_home').click(function()
{
	document.location.replace("index.php");
})
//
$('#deleteform').submit(function(){
$.post("deletead.php",
$("#deleteform").serialize(),
function(data){
document.location.replace("index.php");
});
return false;
})
//
$('#contactform').submit(function(){
$.post("contactus.php",
$("#contactform").serialize(),
function(data){
alert(data);
});
return false;
})
//
$('#searchform').submit(function(e){
$.post("search.php",
$("#searchform").serialize(),
function(data){
$('#column2').html(data);
});
return false;
})
//
$('img.ui-icon').hover(
					function() { $(this).addClass('ui-state-hover'); },
					function() { $(this).removeClass('ui-state-hover'); }
				);

//
$('#LI_logout').click(function(){document.location.replace("logout.php");})
//

//
$("#addadform").submit(function(){
$.post("addad.php",
$("#addadform").serialize(),
function(data){

document.location.replace("index.php");
});
return false;
})
//
$("#signinform").submit(function(){
$.post("signin.php",
$("#signinform").serialize(),
function(data){
if(data!="invalid")
{
	document.location.replace("index.php");
	//var spacein=data.indexOf(" ");
	//var newname=data.slice(0,spacein);
	//var Juserid=data.slice(spacein,data.length);
//$('#LI_signin').hide();
//$('#D_signin').dialog('close');
//$('#column3').html('Welcome: '+newname+'.<br/>'+'<a id=\"LI_editad\" onClick=\"Dialogload(\'#D_editad\',\'#LI_editad\',700);\">//Edit my ads</a><br/><a id=\"LI_addad\" style=\"cursor:pointer;\" onClick=\"Dialogload(\'#D_addad\',\'#LI_addad\',550);\">Add new //ad</a><br/><a id=\"LI_logout\" href=\"logout.php\">Log out</a>');
//echo("Welcome: ".$_SESSION['username']);	
//echo("<br/>"."<span id=\"LI_editad\">Edit my ads</span><br/><span id=\"LI_addad\">Add new ad</span><br/><a id=\"LI_logout\" href=\"logout.php\">Log out</a>");
}
else{alert("Invalid Email or password");}
});
return false;
})
//
$("#draggable").draggable();
});
//
function ajaxload(destdiv)
{
	$('#column2').load(destdiv);
}
//
function Dialogload(dest,butt,Dwidth,Dheight)
{
	$( dest ).dialog({autoOpen:false,draggable:false,modal: true,resizable: false, show: { effect: 'drop', direction: "up" },width:Dwidth,height:Dheight});

	 $(butt).click(function(){
		
	 $(dest).dialog('open');
	  return false;
  });

}
//
$("#logout").click(function(){
$.post("logout.php",
Null,
function(data){
});
return false;
})
//
function loadadgenre(li,ligenre)
{
$(li).click(function(){
$.post("genre.php",
{genre:ligenre},
function(data){
$('#column2').html(data);
});
return false;
})
}
//
function loadhomead(adgenre)
{
$.post("homead.php",
{genre:adgenre},
function(data){
$('#containerad').append(data);
});
return false;
}
//
var Validate={
	isEmpty : function(s) { if(s=="") return true;},
	isEmail : function(s) {
		if(s.test('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$')==true) return true;
	}
	
};
//