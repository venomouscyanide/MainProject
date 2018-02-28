<?php
if($_GET['logout'])
	$logout=$_GET['logout'];

session_start();
session_destroy();
include_once("admin_navbar.html");
?>
<script>
	sessionStorage.setItem('flag5','0');
</script>
<body class="p-3 mb-2 bg-light text-white">

<div class="jumbotron" style="text-align:center;color:black;background-image:url('static/pic/blockchain.png');">
	<div class="row">		
		<div class="col-sm-12" style="text-align:fill;">			
		<h1 style="background-color:rgb(240,240,240);">Welcome To BCV System</h1>
		</div>		
	</div>
</div>

<div class="row" >
	<div class="col-md-1 mx-auto">
		<span style="color:black;font-size: 150%;">LOGIN</span>
	</div>
</div>

<div clas="row" >
	<div class="col-md-3 mx-auto">
		<form>
			<div class="form-group">
				<label for="Input Registered Email" style="color:black;text-align:center;" >Email address</label>
    			<input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Enter email">
    			<small id="emailHelp" class="form-text text-muted">Secure Email login</small>	
			</div>
				
			<div class="form-group">
   				<label for="exampleInputPassword1" style="color:black;">Password</label>
    			<input type="password" class="form-control" id="password" placeholder="Password">
			</div>	
		</form>				
	</div>
</div>


<div class="row">
	<div class="col-md-2 mx-auto">
	<form id="form" method="post" action="form.php">
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Le1nT4UAAAAANE5UAvDYy9jSfuj-yMI_BZh8hH0" data-callback="recaptchaCallback" id="captcha"></div>
				</div>
	</form>	
	</div>
</div>
<div class="row">
	<div class="col-md-1 mx-auto">
		<button type="button" class="btn btn-outline-success" id="login">Log in!</button>
	</div>
</div>
<div class="row">
	<div class="col-md-2 mx-auto" id="invalid" style="font-weight:bold;color:tomato;">
		
	</div>
</div>


<script>
$("#login").click(function(){
var response=grecaptcha.getResponse();
var username=$("#email_id").val();
var password=$("#password").val();
if(response.length==0)
	alert("reCatpcha verification not done.");
else
	{
	//console.log(username+password);
		var details=register.getUserByEmail($("#email_id").val());
		var email=details[2];	
 		var pass=details[3];
		var check1=email.localeCompare($("#email_id").val());
		var check2=pass.localeCompare($("#password").val());
		//console.log(check1);
		//console.log(check1);
		if(check1==0 && check2==0)
		{
			if(details[7].c[0]==0)
				{document.getElementById('invalid').innerHTML="This user is not an admin";}
			else
				{
				sessionStorage.setItem('flag5','1');				
				window.location.href="http://localhost/node_js/admin_loggedin.php?email="+details[2];
				}
		}
		
		
		else
		{
			document.getElementById('invalid').innerHTML="Invalid email-id/password";
		}
	}
});
</script>
</body>
</html>
