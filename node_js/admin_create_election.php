<?php
session_start();
include_once("admin_create_election_navbar.php");
?>
	<link rel="stylesheet" href="../jquery-ui/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body class="p-3 mb-2 bg-light text-black">

<div class="jumbotron hey2">
			<div class="row mx-auto">
	
				<div class="row md-12 mx-auto">
					<div class="col"><strong><h3>
					Start an election
					</h3></strong></div>		
				</div>
			
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Election ID
					</div>		
					<div class="col">
					<input type="number" id="electionID" placeholder="1"></input>
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Start Date 
					</div>		
					<div class="col">
					<input type="text" id="datepickerStart">
					</div>	
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					End date 
					</div>		
					<div class="col" >
					<input type="text" id="datepickerEnd">
					</div>
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Candidates Standing
					</div>		
					<div class="col" id="appendCandidate">
					
					</div>
			</div>
			<br>
			<div class="row ">
					<div class="col ">
					Participants Allowed to vote 
					</div>		
					<div class="col" id="appendParticipant">
					
					</div>
					
			</div>
			<br>
			<div class="row ">
					<div class="row mx-auto">
						<div class="col">
							<button type="button" class="btn btn-primary" id="startElection">Start election </button>
						</div>
					</div>
			</div>

</div>
 <script>
$( function() {
	$( "#datepickerStart" ).datepicker();
	$( "#datepickerEnd" ).datepicker();
});
var flag;
var userList=new Array(1000);var user;var w=0;
for(var i=0;i<100;i++)
	{flag=0;
	user=register.getUserByID(i);
	
	for(var j=0;j<100;j++)
		{
		if(userList[j]==user)
			{//console.log("flag");
			flag=1;
			}
		}
	if(flag==0)
		{
		userList[w++]=user;
		}	
	}

console.log(userList);
for(var i=0;i<w;i++)
	{
	if(!jQuery.isEmptyObject(userList[i][0]))
		{var temp=userList[i];
		var pos=temp.indexOf('@');
		var temp1=temp.slice(0,pos);
		$("#appendCandidate").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input' type='checkbox' id="+temp1+1+" ><label class='form-check-label' for="+temp1+1+">"+temp1+"@gmail.com</label></div>");
		$("#appendParticipant").append("<div class='form-check form-check-inline' style='padding-left:15px;'><input class='form-check-input' type='checkbox' id="+temp1+2+" ><label class='form-check-label' for="+temp1+2+">"+temp1+"@gmail.com</label></div>");}
	}

//console.log($('#datepickerStart').val());
$('#startElection').click(function(){
var id=$("#electionID").val();
register.addStartStop($("#electionID").val(),$("#datepickerStart").val(),$("#datepickerEnd").val(),{gas:400000});

//console.log(hash);
for(var k=0;k<w;k++)
{	var temp=userList[k];
	var pos=temp.indexOf('@');
	var temp1=temp.slice(0,pos);console.log(temp1);
	if($("#"+temp1+1+"").prop("checked"))
	{
		//console.log("hey");
		register.addElectionCandidate(id,userList[k],{gas:400000});
	}
}
for(var k=0;k<w;k++)
{	var temp=userList[k];
	var pos=temp.indexOf('@');
	var temp1=temp.slice(0,pos);
	if($("#"+temp1+2+"").prop("checked"))
	{	
		//console.log("bye");
		register.addElectionParticipant(id,userList[k],{gas:400000});
	}
}
alert("Successfully created");
window.location.reload();
});
</script>
</body>
</html>
