<head lang="en">
	
	<link rel="icon" type="image/png" sizes="72x72" href="static/pic/android-icon-72x72.png">
	
	<title>BCV Admin Page</title>
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

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#">BCV inc. (ADMINISTRATOR)</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item ">
			<a class="nav-link" href="http://localhost/node_js/admin_loggedin.php">Election Info</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="http://localhost/node_js/admin_create_election.php">Start an election</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="#">User logs</a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<h5 style="color:white;padding-right:10px;">Welcome <?php echo $_SESSION['email'];?></h5>
		</li>
	</ul>
	<ul class="navbar-nav">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Options</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalLong">About</a>
				<a class="dropdown-item" href="http://localhost/node_js/admin_home.php?logout=1" >Sign out</a>
			</div>
		</li>
	</ul>
</nav>
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
