
<?php 
include_once('navbar_voting.php');

?>
<style>
#qrcode {
  width:80px;
  height:80px;
  margin-top:15px;
}
</style>
<script src="static/js/connect.js"></script>
<script src="static/js/qr.js"></script>
<body class="p-3 mb-2 bg-light ">


<nav class="navvv">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link navv active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="font-weight: bold;font-size:x-large;">Voting Page</a>
    <a class="nav-item nav-link navv" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="font-weight: bold;font-size:x-large;">Profile</a>
	<a class="nav-item nav-link navv" id="nav-logs-tab" data-toggle="tab" href="#nav-logs" role="tab" aria-controls="nav-logs" aria-selected="false" style="font-weight: bold;font-size:x-large;">Log-	in logs</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">	
	<div class="container hey1 ">
		
		<div class="row">
			<div class="row-md-12 mx-auto"><h4>
			Elections you have yet to vote for.			
			</h4></div>
			<div class="col-md-12" id="notvoted">
			
			</div>
		</div>

		<div class="row">
			<div class="row-md-12 mx-auto"><h4>
			Elections you have voted for.			
			</h4></div>
			<div class="col-md-12" id="voted">
			
			</div>
		</div>
	</div>
	</div>

	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		<div class="jumbotron hey">
			<div class="row mx-auto">
	
				<div class="row md-12 mx-auto">
					<div class="col">
					<img id="image" class="rounded-circle" height="250px" width="250px"></img>
					</div>		
				</div>
			
			</div>
	
			<br>
			<div class="row ">
					<div class="col ">
					Name 
					</div>		
					<div class="col" id="name">
					
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Email 
					</div>		
					<div class="col" id="email">
				
					</div>	
			</div>
			<br>	
			<div class="row ">
					<div class="col ">
					Age
					</div>		
					<div class="col" id="age">
					
					</div>	
			</div>
			<br>	
			<div class="row ">
					<div class="col ">
					Address
					</div>		
					<div class="col" id="address">
					
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Mobile Number
					</div>		
					<div class="col" id="mobile">
					
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Admin 
					</div>		
					<div class="col" id="admin">
					
					</div>	
			</div>
			<br>
			<div class="row md-12">
				<div class="row md-12 mx-auto">
				<div class="col md-12 mx-auto">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qrcodemodal">Get QR code </button>
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit">Edit Details</button>
				</div>
				</div>
			</div>
			
		</div>	
	</div>

	<div class="tab-pane fade" id="nav-logs" role="tabpanel" aria-labelledby="nav-logs-tab">	
	<div class="jumbotron hey1">
		<div class="row">
			<div class="col-md-8 offset-md-4">
				Logs for user<span style="font-weight:bold;"> <?php echo $_SESSION['email']; ?></span>		
			</div>
			<div class="col-md-12" id="log">
					
			</div>
		</div>
	</div>
	</div>
	
</div>
<!-- modal for QR code (must be above its js)-->
<div class="modal fade" id="qrcodemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">QR code hash for your profile information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please use a QR code reader to scan the below code.
			<div class="row  mx-auto">	
				<div class="col offset-md-4" id="qrcode">
				</div>				
			</div>
		<br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of modal-->

<!-- modal for casting vote-->
<div class="modal fade" id="vote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voting Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="row  mx-auto">	
				<div class="row-md-12" id="electionID" >
				</div>		
				<div class="row-md-12" id="notvotedmodal">
				</div>
				<div class="row-md-12" id="previous">
				</div>					
			</div>
		<br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of modal-->

<script>
//below is the code for the profile page and inserting the QR code of block hash for profile information
var details=register.getUserByEmail('<?php echo $_SESSION["email"]; ?>');
var image = document.getElementById("image");
image.src = details[8];
document.getElementById('name').innerHTML=": "+details[1];
document.getElementById('email').innerHTML=": "+details[2];
document.getElementById('age').innerHTML=": "+details[4].c[0];
document.getElementById('address').innerHTML=": "+details[5];
document.getElementById('mobile').innerHTML=": "+details[6].c[0];
if(details[7].c[0]==0)
	{
	document.getElementById('admin').innerHTML=": No";
	}
else
	{
	document.getElementById('admin').innerHTML=": Yes";
	}
var blocknumber=register.returnBlockNumber(details[2]);
//console.log(blocknumber.c[0]);
var blockHash=web3.eth.getBlock(blocknumber.c[0]);

var qrcode = new QRCode("qrcode", {
    text: blockHash["hash"],
    width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

console.log(blockHash["hash"]);
console.log(details);
//below is the script for getting the logs
var logData= new Array(100); 

console.log(logData[i]);
var count=register.getLogCount('<?php echo $_SESSION["email"]; ?>');
for(var i=0;i<count;i++)
	{
	logData[i]=register.getLogDataByCount('<?php echo $_SESSION["email"]; ?>',i);	
	
	$('#log').append("<br>"+logData[i]);
			
	}
console.log(logData);
//below is the script for voting related info. Keep election id 1 digit till 1000.
var electionID= new Array(1000);var flag;var j=0;
var candidates=new Array(1000);var participants= new Array(1000);
for(var i=0;i<50;i++)
	{	
		flag=register.returnElectionID(i);
		if(!jQuery.isEmptyObject(flag[1]))
		{	
			electionID[j++]=register.returnElectionID(i);
		}
	}
//console.log(electionID[1][0].c[0]);
console.log("j value is "+j);		
for(i=0;i<j;i++)
{
console.log(electionID[i][0].c[0]);
//trying to return the candidate/ participant list

var c=1;var d=1;
	if(!jQuery.isEmptyObject(electionID[i]))
		{
			for(var k=1;k<=50;k++)
			{
			flag=register.returnCandidateList(electionID[i][0].c[0],k);
				if(!jQuery.isEmptyObject(flag[1]));
				{
				candidates[c++]=flag;
				//console.log(candidates[c]);c++;
				}
			}		
		}	
//}
	if(!jQuery.isEmptyObject(electionID[i]))
		{
			for(var k=1;k<=50;k++)
			{
			flag=register.returnParticipantList(electionID[i][0].c[0],k);
				if(!jQuery.isEmptyObject(flag[1]));
				{
				participants[d++]=flag;
				
				//console.log(participants[d]);d++
				}
			}		
		}
//if(!jQuery.isEmptyObject(participants[10][1]))
//{console.log(candidates[10][0]);
//}
//so far we have gotten both the participant list and candidate list for the particular election.
	for(var h=1;h<d;h++)
	{
		if(participants[h]==details[2])
			{var check;
			console.log("success");//so the present user takes part in election id[0]. Display these details	
			check=register.checkIfVoted(electionID[i][0].c[0],details[0]);
			if(check==false)
				{
					$("#notvoted").append("<hr>Election ID: <strong>"+electionID[i][0].c[0]+"</strong><br>"+"Candidates Standing	:");
					for(var n=1;n<c;n++)
						{
						if(!jQuery.isEmptyObject(candidates[n][0]))
							{
							$("#notvoted").append(" <strong>  "+candidates[n]+" | </strong>");
							
							}
						}
					$("#notvoted").append("<br><button type='button' class='open-vote btn btn-primary' data-id="+electionID[i][0].c[0]+" data-cast=0 data-target='#vote' data-toggle='modal'>Cast your vote</button>");	
					$("#notvoted").append("<hr>");
				}
			else
				{
					$("#voted").append("<hr>Election ID: <strong>"+electionID[i][0].c[0]+"</strong><br>"+"Candidates Standing	:");
					for(var n=1;n<c;n++)
						{
						if(!jQuery.isEmptyObject(candidates[n][0]))
							{
							$("#voted").append(" <strong>  "+candidates[n]+" | </strong>");
							
							}
						}
					var votedFor=register.testing(electionID[i][0].c[0],h);
					//for(var test=1;test<c;test++)
						//{
						 
					var candidateVotedFor=candidates[votedFor];console.log("return ="+candidateVotedFor);
							 
						//}
					$("#voted").append("<br>You voted for : <strong> "+candidateVotedFor+" </strong>");
					$("#voted").append("<br><button type='button' class='open-vote btn btn-primary' data-id="+electionID[i][0].c[0]+" data-cast=1 data-prev="+candidates[votedFor]+" data-target='#vote' data-toggle='modal'>ReCast your vote</button>");	
				}
			}
	}
candidates=[];participants=[];
}	
//code for vote casting modal here

$(document).on("click", ".open-vote", function () {
	var electionID = $(this).data('id');
	var dataCast=$(this).data('cast');
	var prev=$(this).data('prev');
	document.getElementById("electionID").innerHTML="Election ID: <strong> "+electionID+"</strong> <br> Candidate List : ";c=0;d=0;
	for(k=1;k<=50;k++)
			{
			flag=register.returnCandidateList(electionID,k);
			candidates[c]=flag;
			console.log(candidates[c]);c++;
			}
	for(k=1;k<=50;k++)
			{
			flag=register.returnParticipantList(electionID,k);
			participants[d]=flag;
			console.log(participants[d]);d++;
			}
	$("#notvotedmodal").append("<br>");
	for(var n=0;n<c;n++)
			{
				if(!jQuery.isEmptyObject(candidates[n][0]))
				{
				$("#notvotedmodal").append(" <strong>  "+candidates[n]+" | </strong>");
			
				}
			}
	$("#notvotedmodal").append("<br><br><br><input type='text' placeholder='Type candidate name here' id='candidate'></input>");
	$("#notvotedmodal").append("<button type='button' class='btn btn-primary' id='castvote'>Vote!</button>");
	if(dataCast==1)
		{
		$("#previous").append("<br>Please note: Your previous vote was for <strong>"+prev+"</strong>");
		}
	c=0;d=0;
	$(castvote).click(function () {console.log("in this thing");
		for(k=1;k<=50;k++)
				{
				if(candidates[c++]==$("#candidate").val())
				var cid=k;
				}
		for(k=1;k<=50;k++)
				{
				if(participants[d++]==details[2])
				var pid=k;
				}
	

	var voteHash=register.votingInfo(electionID,cid,pid,{gas:400000});
	window.location.reload();	
	});
    $('#vote').modal('show');
});
//trying to reset the voting section modal
$('#vote').on('hidden.bs.modal', function () {
	console.log("closed");
    $(this).find("#electionID").html("");
	$(this).find("#notvotedmodal").html("");
	$(this).find("#previous").html("");


});
//code for vote recasting model goes here

</script>


<!-- modal code to edit the contents of profile -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color:black;font-weight:bold;">Edit your previous details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		
      <div class="modal-body" style="color:black;">
      <form>

			<div class="form-group">
				<label for="exampleName1" >Name</label>
				<input class="form-control"  id="name_edit" type="text" >
			</div>			
				
			<div class="form-group">
   				<label for="exampleInputPassword1"  style="color:black;">Password</label>
    			<input type="password" id="password_edit" class="form-control" placeholder="Password">			
			</div>
			<div class="form-group">
				<label for="exampleTextarea" >Enter your age  </label>
				<input type="number" id="age_edit" name="quantity" min="1" max="150">

			</div>	
			<div class="form-group">
				<label for="exampleTextarea" >Address</label>
				<textarea class="form-control" id="address_edit" rows="3"></textarea>		
			</div>

			<div class="form-group">
				<label for="exampletel">Mobile Number</label>
				<input class="form-control" type="tel" placeholder="+918891133456" id="mobile_edit">
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
		 
			<form id="form" method="post" action="form.php">
				<div class="form-group">
					<div class="g-recaptcha" data-sitekey="6Le1nT4UAAAAANE5UAvDYy9jSfuj-yMI_BZh8hH0" data-callback="recaptchaCallback" id="captcha"></div>
				</div>
			</form>
			

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

<script>
//below is the code for writing the updating profile information
document.getElementById('name_edit').placeholder=details[1];
document.getElementById('age_edit').placeholder=details[4].c[0];

document.getElementById('address_edit').placeholder=details[5];
document.getElementById('mobile_edit').placeholder=details[6].c[0];
function recaptchaCallback()
	{
	 
	
	console.log($('#email').val());
 	
		if($("#name_edit").val() && $("#password_edit").val() && $("#address_edit").val() && $("#mobile_edit").val() && $("#age_edit").val())
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

$("#register").click(function(){
$.ajax({ 	
       url: 'http://localhost/only_req_files/examples/profileChangeEmail.php',
       dataType: 'text',
       success: function(data){
	
		}
       
    });
var index=details[0];
//console.log(index);
//index=index+1;
var email=details[2];
var status=details[7].c[0];
var msg=details[8];
var show=register.registerUser(index,$("#name_edit").val(),email,$("#password_edit").val(),$("#age_edit").val(),$("#address_edit").val(),$("#mobile_edit").val(),status,msg,url,{gas:400000});
$('#edit').modal('toggle');
window.location.reload(true);
});

</script>

</body>
</html>

