<?php

include_once "security1.html";
session_start(); 
$email=$_SESSION['email'];


?>
<script src="static/js/connect.js"></script>
<div class="jumbotron" style="text-align:center;color:white;background-image:url('static/pic/secc.png'); background-repeat: y;">
	<div class="row">		
		<div class="col-sm-12" style="text-align:fill;">			
		<h1 >Security Phase 2</h1>
		</div>		
	</div>
</div>

<div class="jumbotron">
	<div class="col-md-2 mx-auto">
	<button type="button" class="btn btn-info" id="submit" >Send OTP to your Mobile Number</button>
		
	<h6 style="color:tomato;padding-top:10px;" id="heading"> </h3> 	
	</div>
</div>

<div class="modal fade" id="OTP">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color:black;">Email Verification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<label for="inputPassword5" style="color:black;">OTP</label>
		<input type="password" id="input" class="form-control" aria-describedby="passwordHelpBlock">
		<p id="passwordHelpBlock" class="form-text text-muted">
  		Enter the 6 figure OTP recieved through SMS.
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="submitted">Submit OTP</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>

	console.log(register);
	
	var exists=register.getUserByEmail("<?php echo $email ?>");
	var mobile=parseInt(exists[6].c);var onetimepassword; 
	var url=exists[8];
	console.log(url);
	//setting up of cookie for security phase 3

	$("#submit").on('click', function(data ){
	//document.getElementById('heading').innerHTML="Please wait upto 5 seconds";
	$.ajax( 
	{	
	url:"http://localhost/node_js/set_url.php",
	type:"POST",
	dataType:"text",	
	data:{
	url:url,
	},
	success: function (data) {
					  
				console.log(data);              
			
            }

	});

    $.ajax({ 	
       url: 'http://localhost/sms/test.php?mobile='+mobile,
       dataType: 'text',
       success: function(data){
		console.log(data);
	   //onetimepassword=data;
		var string="success"
		var check =data.includes(string);	  
		var pos=data.search(string);
		
		onetimepassword=data[pos+9]+data[pos+10]+data[pos+11]+data[pos+12]+data[pos+13]+data[pos+14];
		console.log(onetimepassword);

		if(check)
			{
     		$('#OTP	').modal('show');
     		}
		else
		{
		alert("Your mobile number is wrong. You will now be redirected to logout.");
		window.location.href='http://localhost/node_js/home1.php?logout=1';
		}
         
       }
    });
});
//loading gif starts
$(document).ajaxStart(function()
{
$("#modal").modal("show");

});

//loading gif ends
$(document).ajaxStop(function()
{
$("#modal").modal("toggle");

});
$('#submitted').click(function()
{	
console.log(onetimepassword);
var check=$("#input").val().localeCompare(onetimepassword);
if(check==0)
	{
	//$.post( "http://localhost/node_js/security3.php", { name: "John", time: "2pm" } );
	window.location.href = 'http://localhost/node_js/security3.php'; 

	}
else
	{
	alert("Wrong OTP");	
	}
});
	console.log(mobile);
	</script>

<!--this is the modal used to show loading gif -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header mx-auto">
			<p style="color:black;">Sending OTP please wait..</p>		
		</div>
      		<div class="modal-body" style="background: url('static/pic/loader2.gif') 50% 50% no-repeat rgb(249,249,249);">
			<br><br><br><br><br><br><br><br>
     	 </div>
    </div>
  </div>
</div>

</body>
</html>


