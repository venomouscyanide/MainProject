<!doctype html>
<head lang="en">
	
	<link rel="icon" type="image/png" sizes="72x72" href="static/pic/android-icon-72x72.png">
	<link rel="stylesheet" type="text/css" href="/static/css/mycss.css">.
	<title>Welcome to BCV </title>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	
</head>
<body class="p-3 mb-2 bg-light text-white">

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

<div class="jumbotron" style="text-align:center;color:black;background-image:url('static/pic/blockchain.png');">
	<div class="row">		
		<div class="col-sm-12" style="text-align:fill;">			
		<h1 style="background-color:rgb(240,240,240,0.8);">Welcome To BCV System</h1>
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
				<label for="Input Registered Email" style="color:black;text-align:center;">Email address</label>
    			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    			<small id="emailHelp" class="form-text text-muted">Secure Email login</small>	
			</div>
				
			<div class="form-group">
   				<label for="exampleInputPassword1" style="color:black;">Password</label>
    			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>	
		</form>				
	</div>
</div>

<div class="row">
	<div class="col-md-1 mx-auto">
		<button type="button" class="btn btn-outline-success">Go!</button>
	</div>
</div>

<div class="row">
	<div class="col-md-2 mx-auto" ">
		<button type="button" class="btn btn-link">New User? Click Here to Register</button>	
	</div>
</div>

<!-- Modal for about goes here. All ids are as per reference -->

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

</body>


