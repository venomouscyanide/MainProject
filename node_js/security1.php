<?php
session_start();
include_once "security1.html"; 
if($_GET['email'])
	$_SESSION['email']=$_GET['email'];
?>
<script>
var data = sessionStorage.getItem('flag1');
if(data==0)
	{
	document.write("<strong style='color:black;font-size:20px;'>Permission Denied!</strong>");
	window.stop();	
	}
</script>
<div class="jumbotron" style="text-align:center;color:white;background-image:url('static/pic/secc.png'); background-repeat: y;">
	<div class="row">		
		<div class="col-sm-12" style="text-align:fill;">			
		<h1 >Security Phase 1</h1>
		</div>		
	</div>
</div>

<div class="jumbotron">
	<div class="col-md-2 mx-auto">
	<button type="button" class="btn btn-info" id="send_Email" >Send OTP to your Email</button>
		
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
  		Enter the 6 figure OTP recieved through email.
		</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="submit">Submit OTP</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
var onetimepassword;
$("#send_Email").on('click', function(data ){
	//please wait message currently being commented
	//document.getElementById('heading').innerHTML="Please wait upto 5 seconds";
	console.log("clicked");
    $.ajax({ 	
       url: 'http://localhost/only_req_files/examples/smtp.php',
       dataType: 'text',
       success: function(data){
		  var string="Success";var error="Mailer Error: ";
		  var pos;pos=data.search(string);
		  var otp=["","","","","",""];
		  otp[0]=data[pos+7];otp[1]=data[pos+8];otp[2]=data[pos+9];otp[3]=data[pos+10];otp[4]=data[pos+11];otp[5]=data[pos+12];	
		 
		  onetimepassword=otp[0]+otp[1]+otp[2]+otp[3]+otp[4]+otp[5];
          if(data.search(string)!=-1)
			{var flag=1;
			console.log(onetimepassword);
			console.log("Success");	
			}
		  else 
			{
			flag=0;
			alert("Email-id is incorrect. You will now be redirected to logout.");
			window.location.href='http://localhost/node_js/home1.php?logout=1';
			}
		  if(flag==1)
			{
			$('#OTP	').modal('show');
			
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
$('#submit').click(function()
{	
var check=$("#input").val().localeCompare(onetimepassword);
if(check==0)
	{
	sessionStorage.setItem('flag1','0');
	sessionStorage.setItem('flag2','1');
	window.location.href = 'http://localhost/node_js/security2.php'; 
	}
else
	{
	alert("Wrong OTP");	
	}
});

</script>

<!-- this is the modal used to show loading gif -->
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
