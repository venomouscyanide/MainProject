<!doctype html>
<head lang="en">
	
	<link rel="icon" type="image/png" sizes="72x72" href="static/pic/android-icon-72x72.png">
	
	<title>Welcome to BCV </title>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="static/css/mycss.css">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js">					</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<script src="./node_modules/web3/dist/web3.min.js"></script>
	<script src="static/js/connect.js"></script>
	<script src="https://wzrd.in/standalone/buffer"></script>
    <script src="https://unpkg.com/ipfs-api@9.0.0/dist/index.js"
    integrity="sha384-5bXRcW9kyxxnSMbOoHzraqa7Z0PQWIao+cgeg327zit1hz5LZCEbIMx/LWKPReuB"
    crossorigin="anonymous"></script>
   <link href="../image/dist/css/bootstrap-imageupload.css" rel="stylesheet">
	
	
	
</head>
<?php
if($_GET['logout'])
	$logout=$_GET['logout'];

session_start();
session_destroy();

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">BCV inc.</a>
	<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			<a class="nav-link" href="#">Home</a>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Options</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">About</a>
			</div>
		</li>
	</ul>
</nav>

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
	<div class="col-md-2 mx-auto">
		<form>
			<div class="form-group">
				<label for="Input Registered Email" style="color:black;text-align:center;" >Email address</label>
    			<input type="email" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Enter email">
    			<small id="emailHelp" class="form-text text-muted">Secure Email login</small>	
			</div>
				
			<div class="form-group">
   				<label for="exampleInputPassword1" style="color:black;">Password</label>
    			<input type="password" class="form-control" id="password1" placeholder="Password">
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
	<div class="col-md-2 mx-auto" ">
		<button type="button" class="btn btn-link" data-toggle="modal" data-target="#registration">New User? Click Here to Register</button>	
		<p style="color:tomato;text-align:center;" id="login_fail"></p>
		<p style="color:black;text-align:center;" id="please"> </p>
	</div>
</div>


<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;font-weight:bold;">Register Now!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		
      <div class="modal-body" style="color:black;">
      <form>

			<div class="form-group">
				<label for="exampleName1" >Name</label>
				<input class="form-control"  id="name" type="text" placeholder="John Doe" >
			</div>			

			<div class="form-group">
				<label for="Input Registered Email"  style="color:black;text-align:center;">Email address</label>
    			<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter a valid email-id">
    			<small id="error" class="form-text text-muted">Use an existing email-id to register.</small>	
			</div>
				
			<div class="form-group">
   				<label for="exampleInputPassword1"  style="color:black;">Password</label>
    			<input type="password" id="password" class="form-control" placeholder="Password">			
			</div>
			<div class="form-group">
				<label for="exampleTextarea" >Enter your age  </label>
				<input type="number" id="age" name="quantity" min="1" max="150">

			</div>	
			<div class="form-group">
				<label for="exampleTextarea" >Address</label>
				<textarea class="form-control" id="address" rows="3" placeholder="Enter your current address"></textarea>		
			</div>

			<div class="form-group">
				<label for="exampletel">Mobile Number</label>
				<input class="form-control" type="tel" placeholder="+918891133456" id="mobile">
			</div>
			
			<!-- code for graphical password upload -->
			<script>
		var url;
 		function upload() {
		const reader = new FileReader();
		reader.onloadend = function() {
		 
        const ipfs = window.IpfsApi('localhost', 5001) // Connect to IPFS
        const buf = buffer.Buffer(reader.result) // Convert data into buffer
		console.log(reader.result);
        ipfs.files.add(buf, (err, result) => { // Upload buffer to IPFS
          if(err) {
            console.error(err)
            return
          }
         url = `https://ipfs.io/ipfs/${result[0].hash}`
         console.log(`Url --> ${url}`)
         
         //document.getElementById("output").src = url
        })
      }
      const photo = document.getElementById("photo");
      reader.readAsArrayBuffer(photo.files[0]); // Read Provided File
    }
			</script>
		<div class="form-group">
    		<fieldset>		
    	    <h6>Upload Graphical Password</h6>
    	    <input type="file" name="photo" id="photo" class="btn btn-info" >
    	    <button type="button" class ="btn btn-secondary" onclick="upload()">Upload</button>
    	  	</fieldset>
			
		</div>
			<!-- graphical pass code ends here -->
			<div class="form-group">
				<label class="form-check-label" style="color:Tomato;">
	      		<input class="form-check-input" type="checkbox" id="adminAccess"> Request Admin Access?
	    		</label> 
			</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea disabled class="form-control disabled" id="optionalMessage" rows="3" placeholder="Optional message to the admin"></textarea>		
				</div>
		 
			<form id="form" method="post" action="form.php">
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Le1nT4UAAAAANE5UAvDYy9jSfuj-yMI_BZh8hH0" data-callback="recaptchaCallback" id="captcha"></div>
				</div>
			</form>
			 
			<script>
			var flag=0;
			document.getElementById('adminAccess').addEventListener( 'click', function(){
    		var textArea = document.getElementById('optionalMessage')
    		textArea.disabled = !textArea.disabled
			if(!textArea.disabled)
			{
				flag=1;
			}
			else
			{
				flag=0;
			}			
			});
			</script>

		</form>	
      </div>
      <div class="modal-footer" >
		<button type="button" id="register" class="btn btn-outline-primary mx-auto" disabled>Register </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	<p style="color:black;text-align:center;" id="registerMessage"></p>
    </div>

  </div>
</div>
<!--modal code for about the project-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;">About this Project and Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="color:black;">
       Team sucks. So does this project :^)
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal code ends here-->
<script>  
	
	

</script>
		
		<script>

		
	var important;	
	
	 
	// this is when the captcha is checked. then it will check if the value is validated in the forms and then aim is to clear all the values 
	function recaptchaCallback()
	{
	 
	
	console.log($('#email').val());
 	
	if($("#name").val() && $("#email").val() && $("#address").val() && $("#mobile").val() && $("#age").val() && $("#password").val())
	{
	//console.log("correct");
	important =1 ;
	}
	else
	{
	
	important=0;
	}
	

	if(important==1)	// this means that all input fields are correct and new user can register
		{
		$('#register').removeAttr('disabled');
		}
	else
		{
		grecaptcha.reset();	
		alert("Some fields arent filled . Please check the fields.");		
		}
		
	}

	$("#register").click(function()
	{
	var exists=register.getUserByEmailForRegistration($("#email").val());
	console.log(exists);
	if(!exists[1]) //if does not exist then we need to clear all values and make him log in again after closing modal
		{	
		
		var a=register.getCount();   //incrementing the id for each regitered user
		console.log("look at me ");
		var index=a.c[0];
		index=index+1;	
		console.log($('#email').val());
		if(flag==0)	//disabled message then
		{
		console.log(url);	
		var show=register.registerUser(index,$("#name").val(),$("#email").val(),$("#password").val(),$("#age").val(),$("#address").val(),$("#mobile").val(),0,"NULL",url,{gas:400000});
		
		}
		else	//not disabled
		{
		var show=register.registerUser(index,$("#name").val(),$("#email").val(),$("#password").val(),$("#age").val(),$("#address").val(),$("#mobile").val(),1,$("#optionalMessage").val(),url,{gas:400000});			
		}
		document.getElementById('email').value ="";document.getElementById('name').value ="";document.getElementById('address').value ="";document.getElementById('mobile').value ="";
		document.getElementById('age').value ="";document.getElementById('password').value ="";document.getElementById('optionalMessage').value ="";
		document.getElementById("adminAccess").checked = false;
	
		$('#registration').modal('hide');
		grecaptcha.reset();	
		document.getElementById('please').innerHTML = "Successfully Registered ! Please log in to continue :D";
		console.log(show);		
		}
	else
	{
	
	var change=document.getElementById('error');
	change.innerHTML="Email ID is taken. Use another one.";
	change.style.color="tomato";
	}	
	
	
	});

	$("#login").click(function()
	{
	var details=register.getUserByEmail($("#email_id").val());
	var email=details[2];	
	var pass=details[3];
	var check1=email.localeCompare($("#email_id").val());
	var check2=pass.localeCompare($("#password1").val());
	
	
	if(check1==0 && check2==0) //checking if both email and the passwords match
	{
		console.log("This is a match ! ");
		//post not working .	
		//$.post("http://localhost/node_js/security1.php",{param:1}, function() { window.location.href = "http://localhost/node_js/security1.php "});
		//$.post("http://localhost/node_js/security1.php",{email:"paul"});		
		window.location.href = 'http://localhost/node_js/security1.php?email='+email; 
	}	
	else
	{	
		document.getElementById('login_fail').innerHTML="Invalid Username/Password";
		console.log("What a  bummer >.<");
	}
	});

	</script>


</body>


